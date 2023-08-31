<?php
session_start(); 
class Auth extends Database
{

    public function login($post)
    {
        $username   = htmlspecialchars($post['username']);
        $password   = htmlspecialchars($post['password']);
        $remember   = isset($post['remember']) ? true: false;
        $data       = $this->getOne('users', 'username', $username);
        $error      = null;
        
        if (isset($data)) {
            if (password_verify($password, $data['password'])) {
                $_SESSION['login']      = true;
                $_SESSION['id_user']    = $data['id_user'];
                $_SESSION['level']      = $data['level'];
                $remember ? $this->setCookie($username, $data['id_user']) : false;
                header('location:../index.php');

            } else {
                return $error = 'Password salah!';
            }
        } else {
            return $error = 'Username tidak terdaftar!';
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        if (isset($_COOKIE['key'])) {
            $this->deleteCookie($_COOKIE['key']);
        }
        header('Location:apps/login.php');
    }

    public function setcookie($username, $id)
    {
        $token      = hash('sha256', $username);
        setcookie('id', $id, time() + 3600 * 24 * 24, '/');
        setcookie('key', $token, time() + 3600 * 24 * 24, '/');
        $this->queryIUD("UPDATE users SET remember_token = '$token' WHERE username = '$username'");
    }

    public function deleteCookie($token)
    {
        setcookie('id', '', time() - 3600 * 24 * 24, '/');
        setcookie('key', '', time() - 3600 * 24 * 24, '/');
        $this->queryIUD("UPDATE users SET remember_token = null WHERE remember_token = '$token'");
    }

    public function checkCookie()
    {
        if (isset($_COOKIE['id'])) {
            $data = $this->getOne('users', 'remember_token', $_COOKIE['key']);
            if (isset($data)) {
                $_SESSION['login']      = true;
                $_SESSION['id_user']    = $data['id_user'];
                $_SESSION['level']      = $data['level'];
            }
        }
    }
    
    public function checkIsLogin()
    {
        isset($_SESSION['login']) ? header('Location:../index.php') : false;
    }

    public function checkNotLogin() : Void
    {
        !isset($_SESSION['login']) ? header('Location:apps/login.php') : false;
    }
}
