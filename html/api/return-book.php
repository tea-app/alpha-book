<?php
// 本返却用

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');
$pdo = connect();

$book = new Books($pdo, 'books');

//$book_id = $_POST['book_id'];
//$user_jd = $_POST['user_id'];

$book_id = 1234;
$user_id = 123;

$status = 0;
$device = 1;
$ip_address = $_SERVER["REMOTE_ADDR"];

$book->registLendBook($book_id, $user_id, $status, $device, $ip_address);

$book->returnBook($book_id, $status);