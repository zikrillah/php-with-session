<?php

class Session
{

    public function __construct(public string $username, public string $role)
    {
    }

}

class SessionManager
{
    public static function login(string $username, string $password): bool
    {
        if ($username == "zikri" && $password == "zikri") {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
            return true;
        } else {
            return false;
        }
    }
    public static function getCurrentSession(): Session
    {
        if ($_SESSION['username']) {
            return new Session(username: $_SESSION['username'], role: $_SESSION['role']);
        } else {
            throw new Exception("User is not login");
        }
    }
}