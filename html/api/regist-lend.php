<?php
require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');

$pdo = connect();

$book = new Books($pdo, 'books');

$book_id = 12345;
$user_id = 123;
$status = 1;
$device = 1;
$ip_address = $_SERVER["REMOTE_ADDR"];

echo $ip_address;

$book->registLendBook($book_id, $user_id, $status, $device, $ip_address);