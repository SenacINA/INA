<?php 

require __DIR__ . '/../../config/database.php';


class Database {
    private $host;
    private $dbName;
    private $user;
    private $pass;
    private $charset;
    private $pdo;

    public function __construct() {
        $this->host = DB_HOST;
        $this->dbName = DB_NAME;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $this->charset = DB_CHARSET;
    }

    public function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset={$this->charset}";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexão estabelecida com sucesso!<br>";
        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function disconnect() {
        if ($this->pdo) {
            $this->pdo = null; 
            echo "Conexão encerrada com sucesso!<br>";
        } else {
            echo "Não há conexão ativa para encerrar.<br>";
        }
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function executeQuery($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql); 

            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }

            $stmt->execute();

            if (str_starts_with(strtoupper($sql), 'SELECT')) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            return $stmt->rowCount();
        } catch (PDOException $e) {
            die("Erro ao executar a query: " . $e->getMessage());
        }
    }
}

$db = new Database();
$db->connect();

$sql = "SELECT * FROM cliente WHERE email_cliente = :email";
$params = [':email' => 'carlos@email.com'];

$result = $db->executeQuery($sql, $params);

if ($result) {

    $storedHash = $result[0]['senha_cliente'];

    if (password_verify('minhasenha123', $storedHash)) {
        echo "Senha válida para o cliente: " . $result[0]['nome_cliente'] . "<br>";
    } else {
        echo "Senha inválida.<br>";
    }
} else {
    echo "Cliente não encontrado.<br>";
}


$db->disconnect();