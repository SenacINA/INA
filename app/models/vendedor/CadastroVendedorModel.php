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
        int $id, string $localEmpresa, string $cep, string $logradouro, int $numero, 
        string $nome, string $cpfcnpj, string $rg, string $email, string $categoria, 
        string $telefone1, string $telefone2
    ): array {
        if (empty($localEmpresa) || substr_count($localEmpresa, '-') !== 1) {
            error_log("Formato de localização inválido: $localEmpresa");
            return [false, 'Erro ao inserir a localização'];
        }
        list($uf, $cidade) = array_map('trim', explode('-', $localEmpresa));
    
        $db = $this->db->getConnection();
        $db->beginTransaction();
    
        try {
            $sqlCheckCliente = "SELECT id_cliente FROM cliente WHERE id_cliente = :id";
            $stmtCheckCliente = $db->prepare($sqlCheckCliente);
            $stmtCheckCliente->execute([':id' => $id]);
            if ($stmtCheckCliente->rowCount() === 0) {
                return [false, 'Usuário não encontrado'];
            }
    
            $sqlUpdateCliente = "UPDATE cliente 
                                SET rg_cliente = :rg, cep_cliente = :cep, tipo_conta_cliente = 1 
                                WHERE id_cliente = :id";
            $stmtUpdateCliente = $db->prepare($sqlUpdateCliente);
            $stmtUpdateCliente->execute([
                ':rg' => $rg,
                ':cep' => $cep,
                ':id' => $id
            ]);
    
            $sqlCheckVendedor = "SELECT id_vendedor FROM vendedor WHERE id_cliente = :id_cliente";
            $stmtCheckVendedor = $db->prepare($sqlCheckVendedor);
            $stmtCheckVendedor->execute([':id_cliente' => $id]);
            if ($stmtCheckVendedor->rowCount() > 0) {
                return [false, 'Você já é um vendedor'];
            }
    
            $sqlCheckCNPJ = "SELECT cnpj_vendedor FROM vendedor WHERE cnpj_vendedor = :cpfcnpj";
            $stmtCheckCNPJ = $db->prepare($sqlCheckCNPJ);
            $stmtCheckCNPJ->execute([':cpfcnpj' => $cpfcnpj]);

            if ($stmtCheckCNPJ->rowCount() > 0) {
                return [false, 'CPF/CNPJ já registrado'];
            }
    
            // Insere o vendedor
            $sqlInsertVendedor = "INSERT INTO vendedor (id_cliente, nome_fantasia, cnpj_vendedor) 
                                 VALUES (:id_cliente, :nome, :cpfcnpj)";
            $stmtInsertVendedor = $db->prepare($sqlInsertVendedor);
            $stmtInsertVendedor->execute([
                ':id_cliente' => $id, 
                ':nome' => $nome,
                ':cpfcnpj' => $cpfcnpj
            ]);
    
            // Atualiza o endereço
            $sqlAtualizarEndereco = "
                INSERT INTO endereco (id_cliente, uf_endereco, cidade_endereco)
                VALUES (:id, :uf, :cidade)
                ON DUPLICATE KEY UPDATE
                    uf_endereco = VALUES(uf_endereco),
                    cidade_endereco = VALUES(cidade_endereco)
            ";
            $stmtAtualizarEndereco = $db->prepare($sqlAtualizarEndereco);
            $stmtAtualizarEndereco->execute([
                ':id' => $id,
                ':uf' => $uf,
                ':cidade' => $cidade
            ]);
    
            $db->commit();
            return [true, 'Conta de vendedor criada!'];
    
        } catch (PDOException | Exception $e) {
            $db->rollBack();
            return [false, 'Erro interno'];
        }
    }



}