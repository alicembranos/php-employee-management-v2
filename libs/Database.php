<?php
class Database
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct()
    {
        $this->host = HOST;
        $this->db = DB;
        $this->user = USER;
        $this->password = PSSWD;
        $this->charset = CHARSET;
    }

    public function connect()
    {
        $conn = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';charset=' . $this->charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        try {
            $pdo = new PDO($conn, $this->user,  $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            if ($e->getCode() == 1049) {
                $this->createDB();
                $pdo = new PDO($conn, $this->user,  $this->password, $options);
                return $pdo;
            }
        }
    }

    public function createDB()
    {
        $conn = 'mysql:host=' . $this->host;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        try {
            $pdo = new PDO($conn, $this->user,  $this->password, $options);
            $sqlCreate = file_get_contents(SCRIPTS . "createTables.sql");
            $pdo->exec($sqlCreate);
            $sqlInsert = file_get_contents(SCRIPTS . "insertData.sql");
            $pdo->exec($sqlInsert);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
