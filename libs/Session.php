<?php

class Session
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    public function setAttribute($attribute, $value)
    {
        if (session_status() === PHP_SESSION_ACTIVE && is_string($attribute)) {
            $_SESSION[$attribute] = $value;
        }
    }

    public function getAttribute($attribute)
    {
        if (session_status() === PHP_SESSION_ACTIVE && is_string($attribute) && isset($_SESSION[$attribute])) {
            return $_SESSION[$attribute];
        }
        return null;
    }

    public function deleteAttribute($attribute)
    {
        if (session_status() === PHP_SESSION_ACTIVE && is_string($attribute) && isset($_SESSION[$attribute])) {
            unset($_SESSION[$attribute]);
        }
    }

    public function destroySession()
    {
        unset($_SESSION);
        $this->destroySessionCookies();
        session_destroy();
    }

    public function destroySessionCookies()
    {
        // destroy session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
    }
}
