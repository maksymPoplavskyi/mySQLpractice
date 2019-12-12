<?php

namespace Controllers;

class Registration
{
    CONST SALT = '22618c305f1428160beb042432b1e4d3';

    public function getPost(array $userArrayPostData): void
    {
        if (
            (mb_strlen($userArrayPostData['login']) < 8 || mb_strlen($userArrayPostData['login']) > 18) ||
            (mb_strlen($userArrayPostData['email']) < 8 || mb_strlen($userArrayPostData['email']) > 18) ||
            (mb_strlen($userArrayPostData['password']) < 8 || mb_strlen($userArrayPostData['password']) > 18)
        ) {
            header('Location: /views/repeat-registration');
            die;
        }

        $userArrayPostData['password'] = md5($userArrayPostData['password'] . self::SALT);
        $this->sendPost($userArrayPostData);
    }

    private function sendPost(array $userArrayPostData): void
    {
        (new \Models\Registration())->UserVerificationUnique($userArrayPostData);
    }
}