<?php

namespace Models;

use Php\Database;

class Registration
{
    const DBNAME = 'main';

    public function UserVerificationUnique(array $arrayUser): void
    {
        $login = trim($arrayUser['login']);
        $email = trim($arrayUser['email']);
        $connection = Database::getConnection(self::DBNAME);

        $sqlLogin = "SELECT count(*) as count_rows FROM users WHERE login = '$login'";
        $queryLogin = mysqli_query($connection, $sqlLogin);
        $resultLogin = mysqli_fetch_assoc($queryLogin);

        $sqlEmail = "SELECT count(*) as count_rows FROM users WHERE login = '$email'";
        $queryEmail = mysqli_query($connection, $sqlEmail);
        $resultEmail = mysqli_fetch_assoc($queryEmail);

        if ($resultLogin['count_rows'] === '0' && $resultEmail['count_rows'] === '0') {
            $this->UserSave($arrayUser, $connection);
        } else {
            header('Location: /views/exist-user');
        }
    }

    final private function UserSave(array $arrayUser, $connection): void
    {
        $sql = "INSERT INTO users (login, email, password)
                    VALUES ('$arrayUser[login]', '$arrayUser[email]', '$arrayUser[password]')";

        $query = mysqli_query($connection, $sql);

        if ($query) {
            header('Location: /views/registered');
        } die("ERROR TO CREATE NEW ACCOUNT");
    }
}