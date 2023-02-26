<?php

class AuthController
{
    public function login()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = User::findByUsername($username);

            if ($user && password_verify($password, $user->getPassword())) {
                session_start();
                $_SESSION['user_id'] = $user->getId();
                header('Location: index.php');
                exit();
            } else {
                $error = 'Invalid username or password';
            }
        }

        include 'views/auth/login.php';
    }

    public function register()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check if the user already exists
            if (User::findByUsername($username)) {
                $error = 'Username already exists.';
            } else {
                // Create the user
                $user = new User(null, $username, password_hash($password, PASSWORD_DEFAULT));
                $user->save();

                // Log in the user
                session_start();
                $_SESSION['user_id'] = $user->getId();
                header('Location: index.php?');
                exit();
            }
        }

        include 'views/auth/register.php';
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }

    public static function isLoggedIn()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user_id'])) {
            return true;
        }

        return false;
    }
}
