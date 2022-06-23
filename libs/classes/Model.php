<?php

class Model 
{
    protected $database;
    protected $conn;

    public function __construct()
    {
        $this->database = new Database();
        $this->conn = $this->database->connect();
    }

    public function query($query, $params, $fetch = true)
    {
        $statement = $this->conn->prepare($query);
        $statement->execute($params);
        if ($fetch) {
            return $statement->fetchAll();
        }
        return $statement;
    }
}