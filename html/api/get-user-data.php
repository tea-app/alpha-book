<?php

// requireして使う

/*
    ユーザページ
    GETでアクセス
*/


require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');
require_once(__DIR__.'/../../app/Users.php');

$pdo = connect();

$book = new Books($pdo,'lend');
$user = new Users($pdo, 'users');

$user_id = $_GET['user_id'];


$user_name = $user->getUserInfo($user_id);
$histories = $book->getHistoryUser($user_id);


function getBookName($book, $book_id){
    $book_data = $book->searchBookData($book_id);
    return $book_data['title'];
}