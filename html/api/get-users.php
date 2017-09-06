<?php
// 全ユーザ情報取得

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Users.php');

$pdo = connect();

$user = new Users($pdo, 'users');

$users = $user->getAllUser();

//var_dump($users);