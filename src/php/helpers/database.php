<?php

function getConnection(string $name)
{
    $config = require_once PUBLIC_PATH . '/../config/databases.php';

    if (!isset($config[$name])) {
        echo 'INVALID DATABASE NAME';
        die;
    }
    $config = $config[$name];
    return mysqli_connect($config['host'], $config['user'], $config['password'], $config['database'])
        or die('ERROR CONNECT TO MYSQL SERVER');
}
