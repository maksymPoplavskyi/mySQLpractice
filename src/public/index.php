<?php

const PUBLIC_PATH = __DIR__;

require_once PUBLIC_PATH . '/../php/helpers/database.php';
$mainConnection = getConnection('main');

$GLOBALS['main_connection'] = $mainConnection;

$uri = explode('?', $_SERVER['REQUEST_URI'])[0];

switch (mb_strtolower($uri)) {
    case '/':
    {
        require_once PUBLIC_PATH . '/../php/views/main.php';
        break;
    }
    case '/views/register':
    {
        require_once PUBLIC_PATH . '/../php/views/register.php';
    }
    case '/execute/register':
    {
        require_once PUBLIC_PATH . '/../php/execute/register.php';
        break;
    }
    default: {
        echo 'PAGE NOT FOUND'; die;
    }
}
