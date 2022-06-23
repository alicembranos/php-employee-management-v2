<?php

class EmployeesModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getEmployees()
    {
        try {
            $sql = "SELECT * FROM employees";
            return $this->query($sql);
        } catch (PDOException $e) {
            new ErrorController($e->getMessage());
        }
    }

    public function getEmployee($id)
    {
        try {
            $sql = "SELECT * FROM employees WHERE employee_id = ?";
            return $this->query($sql, [$id])[0];
        } catch (PDOException $e) {
            new ErrorController($e->getMessage());
        }
    }

    public function updateEmployee($employee)
    {
        try {
        } catch (PDOException $e) {
            new ErrorController($e->getMessage());
        }
    }

    public function deleteEmployee($id)
    {
        try {
            $sql = "DELETE FROM employees WHERE employee_id = ?";
            $this->query($sql, [$id], false);
        } catch (PDOException $e) {
            new ErrorController($e->getMessage());
        }
    }

    public function addEmployee($employee)
    {
        try {
            $sql = "INSERT INTO employees (" . implode(', ', array_keys($employee)) . ") VALUES (" . implode(', ', array_map(function ($key) {
                return ":$key";
            }, array_keys($employee))) . ")";
            $this->query($sql, $employee, false);
            $sql = "SELECT * FROM employees WHERE email = ?";
            return $this->query($sql, [$employee['email']])[0];
        } catch (PDOException $e) {
            new ErrorController($e->getMessage());
        }
    }

    public function findUserByEmail($email)
    {
        try {
            $sql = "SELECT * FROM employees WHERE email = ?";
            return $this->query($sql, [$email])[0];
        } catch (PDOException $e) {
            new ErrorController($e->getMessage());
        }
    }
}
