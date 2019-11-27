<?php

function existLogin(string $login): bool
{
    $sql = "SELECT count(*) as cnt_rows FROM users WHERE login = '$login'";
    var_dump($GLOBALS['main_connection']);
    var_dump($GLOBALS);
    var_dump($sql);
    $quary = mysqli_query($GLOBALS['main_connection'], $sql);
    var_dump($quary);
    $result = mysqli_fetch_assoc($quary);
    var_dump($result);

    return (bool)$result['cnt_rows'];
}
