<?php

require_once PUBLIC_PATH . '/../php/helpers/users.php';

$existLogin = existLogin($_POST['login']);

var_dump($existLogin);
