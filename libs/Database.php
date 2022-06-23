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
        try {
            $conn = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';charset=' . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($conn, $this->user, $this->password);
            return $pdo;
        } catch (PDOException $e) {
            $errorCode = $e->getCode();
            if ($errorCode == 1049) {
                $this->createDb();
                $pdo = new PDO($conn, $this->user, $this->password);
                return $pdo;
            }else{
                throw new PDOException($e->getMessage());
            }
        }
    }

    public function createDb()
    {
        $conn = 'mysql:host=' . $this->host;
        $pdo = new PDO($conn, $this->user, $this->password);
        $sql = file_get_contents(SCRIPTS . 'createTables.sql');
        $pdo->exec($sql);
        $sql = file_get_contents(SCRIPTS . 'insertData.sql');
        $pdo->exec($sql);
    }
}
