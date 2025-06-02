<?php

require_once __DIR__ . '/../connect.php';

class CadastroVendedorModel {
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function createVendedor(
        int $id,
        string $localEmpresa,
        string $cep,
        string $nome,
        string $cpfcnpj,
        string $rg,
        string $email
    ): array {
        // 1) valida formatação "UF - Cidade"
        if (substr_count($localEmpresa, '-') !== 1) {
            return [false, 'Formato de localização inválido'];
        }
        list($uf, $cidade) = array_map('trim', explode('-', $localEmpresa));

        $conn = $this->db->getConnection();
        $conn->beginTransaction();

        try {
            // 2) verifica se cliente existe
            $stmt = $conn->prepare("SELECT email_cliente FROM cliente WHERE id_cliente = :id");
            $stmt->execute([':id' => $id]);
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$cliente) {
                return [false, 'Usuário não encontrado'];
            }

            // 3) valida e-mail: ou é o próprio, ou não existe em outro cliente
            $stmt = $conn->prepare("
                SELECT 1 FROM cliente
                 WHERE email_cliente = :email
                   AND id_cliente != :id
                 LIMIT 1
            ");
            $stmt->execute([':email' => $email, ':id' => $id]);
            if ($stmt->fetchColumn()) {
                return [false, 'E-mail já está em uso por outro usuário'];
            }

            // 4) impede re-promoção
            $stmt = $conn->prepare("SELECT 1 FROM vendedor WHERE id_cliente = :id_cliente");
            $stmt->execute([':id_cliente' => $id]);
            if ($stmt->fetchColumn()) {
                return [false, 'Você já é um vendedor'];
            }

            // 5) verifica CNPJ único
            $stmt = $conn->prepare("SELECT 1 FROM vendedor WHERE cnpj_vendedor = :cpfcnpj LIMIT 1");
            $stmt->execute([':cpfcnpj' => $cpfcnpj]);
            if ($stmt->fetchColumn()) {
                return [false, 'CPF/CNPJ já registrado'];
            }

            // 6) atualiza cliente: rg, cep e tipo_conta_cliente = 1
            $stmt = $conn->prepare("
                UPDATE cliente
                   SET rg_cliente         = :rg,
                       cep_cliente        = :cep,
                       tipo_conta_cliente = 1
                 WHERE id_cliente = :id
            ");
            $stmt->execute([
                ':rg'  => $rg,
                ':cep' => $cep,
                ':id'  => $id
            ]);

            // 7) insere em vendedor (com requisitos padrão)
            $stmt = $conn->prepare("
                INSERT INTO vendedor
                    (id_cliente, nome_fantasia, cnpj_vendedor)
                VALUES
                    (:id_cliente, :nome, :cpfcnpj)
            ");
            $stmt->execute([
                ':id_cliente' => $id,
                ':nome'       => $nome,
                ':cpfcnpj'    => $cpfcnpj
            ]);

            // 8) insere ou atualiza endereço
            $stmt = $conn->prepare("
                INSERT INTO endereco (id_cliente, uf_endereco, cidade_endereco)
                VALUES (:id, :uf, :cidade)
                ON DUPLICATE KEY UPDATE
                    uf_endereco     = VALUES(uf_endereco),
                    cidade_endereco = VALUES(cidade_endereco)
            ");
            $stmt->execute([
                ':id'     => $id,
                ':uf'     => $uf,
                ':cidade' => $cidade
            ]);

            $conn->commit();
            return [true, 'Conta de vendedor criada com sucesso!'];

        } catch (PDOException $e) {
            $conn->rollBack();
            error_log("Erro interno createVendedor: " . $e->getMessage());
            return [false, 'Erro interno, tente novamente mais tarde'];
        }
    }
}
