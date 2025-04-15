<!-- Estrutura de Pastas
Controllers: Onde você gerencia a lógica de negócios e interage com o banco de dados.

Exemplo: UserController.php – Este arquivo pode conter a lógica para lidar com operações relacionadas aos usuários, como cadastro, edição, exclusão, etc.

Models: Para definir e organizar a interação com o banco de dados, geralmente são os arquivos que possuem métodos que acessam ou manipulam dados.

Exemplo: UserModel.php – Este arquivo pode conter métodos como saveUser(), getUserById(), e outros relacionados à tabela de usuários.

Views: Responsável pela interface com o usuário (renderização de telas HTML ou mensagens).

Exemplo: register_user.php ou success_message.php – Aqui você pode criar as páginas que mostram formulários ou respostas como "Usuário cadastrado com sucesso!".

Routes: Um arquivo ou pasta para definir as rotas de acesso. Se você estiver usando um framework (como Laravel ou Slim), as rotas serão configuradas aqui.

Exemplo: Um arquivo routes.php para associar URLs às funções do controller.

Helpers ou Utils (opcional): Se houver funções auxiliares (exemplo: sanitização de entrada, validação de dados), pode ser interessante colocá-las em uma pasta separada. -->

<?php

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }

    public function createUser($data) {
        $sql = "INSERT INTO users (nome, email, senha, data_registro) 
                VALUES (:nome, :email, :senha, :data_registro)";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':nome', $data['nome']);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':senha', password_hash($data['senha'], PASSWORD_BCRYPT));
        $stmt->bindValue(':data_registro', date('Y-m-d H:i:s'));
        return $stmt->execute();
    }

    public function emailExists($email) {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}
