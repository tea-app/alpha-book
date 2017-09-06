<?php
/*
    Add User
    ユーザ登録
    POST
*/

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Users.php');

$pdo = connect();

$user = new Users($pdo, 'users');

$user_id = $_POST['user_id'];
$name = $_POST['name'];

$user->addUser($user_id, $name);
header('Location: /../new-user.php');