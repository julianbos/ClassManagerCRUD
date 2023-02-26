<?php

class AuthMiddleware
{
    public function handle()
    {
        if (!AuthController::isLoggedIn()) {
            header('Location: index.php?controller=auth&action=login');
            exit();
        }
    }
}
