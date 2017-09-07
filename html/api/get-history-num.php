<?php

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');
require_once(__DIR__.'/../../app/Users.php');

$pdo = connect();

$book = new Books($pdo, 'books');
$user = new Users($pdo, 'users');

$histories = $book->getHistory();

function getBookName($book, $book_id){
    $data = $book->searchBookData($book_id);
    return $data['title'];
}
function getUserName($user, $user_id){
    $data = $user->getUserInfo($user_id);
    return $data['name'];
}