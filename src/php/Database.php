<?php

namespace Php;

class Database
{

    public static function getConnection(string $name)
    {
        $config = require_once '../config/databases.php';
        $config = $config[$name];

        $connect = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);

        if ($connect) {
            return $connect;
        }

        die('ERROR CONNECT TO MY SQL');
    }
}