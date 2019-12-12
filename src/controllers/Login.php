<?php

namespace Controllers;

class Login
{
    public $user;

    public function getPost(array $usernamePost): void
    {
        $usernamePost['password'] = md5($usernamePost['password'] . Registration::SALT);
        $this->sendPost($usernamePost);
    }

    final public function sendPost(array $usernamePost): void
    {
        $result = (new \Models\Login())->usernameVerification($usernamePost);

        if ($result === true) {
//            $this->user = $_SESSION['auth'];
            header('Location: /welcome');
            die;
        }
        header('Location: /repeat-login');
        die;
    }
}