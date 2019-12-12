<?php

namespace Models;

use Php\Database;

class Login
{
    const DBNAME = 'main';

    final public function usernameVerification(array $usernamePost): bool
    {
        $connection = Database::getConnection(self::DBNAME);

        $username = trim($usernamePost['username']);
        $password = trim($usernamePost['password']);

        $sql = "SELECT count(*) as ctn_rows FROM users WHERE 
                                               login = '$username' or email = '$username' && password = '$password'";

        $query = mysqli_query($connection, $sql);

        $result = mysqli_fetch_assoc($query);

        if ($result['ctn_rows'] === '1') {
            return true;
        }

        return false;
    }
}