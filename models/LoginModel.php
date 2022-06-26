<?php

class LoginModel extends Model
{

    public function checkSessionStatus()
    {
        if (isset($_SESSION["userId"])) return true;
        return false;
    }

    public function validateLogin($data)
    {
        $email = $data['email'];
        $password = $data['pass'];
        $sql = "SELECT * FROM users WHERE email = ?";
        $result = $this->query($sql, [$email]);
        if (count($result) > 0) {
            $user = $result[0];
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return null;
    }
}
