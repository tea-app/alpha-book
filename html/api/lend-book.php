<?php
// 本の貸し出し用

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');
$pdo = connect();

$book = new Books($pdo, 'books');

$book_id = $_POST['book_id'];
$user_id = $_POST['user_id'];

//$book_id = 1234;
//$user_id = 123;

$status = 1;
$ip_address = $_SERVER["REMOTE_ADDR"];
$device = 1;

$book->registLendBook($book_id, $user_id, $status, $device, $ip_address);

$book->lendBook($book_id, $user_id);