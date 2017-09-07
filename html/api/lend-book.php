<?php
// 本の貸し出し用

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');
require_once(__DIR__.'/../../app/Users.php');
$pdo = connect();

$book = new Books($pdo, 'books');
$user = new Users($pdo, 'users');

$book_id = $_POST['book_id'];
$user_id = $_POST['user_id'];


$status = 1;
$ip_address = $_SERVER["REMOTE_ADDR"];
$device = 1;

$bool = $user->getUserInfo($user_id);
if(empty($bool)){
    // 空の時
//    return "Error";
}else{
    $book->registLendBook($book_id, $user_id, $status, $device, $ip_address);

    $book->lendBook($book_id, $user_id);
}
header('Location: /../single.php?book_id='.$book_id);