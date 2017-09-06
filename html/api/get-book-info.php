<?php

// このコードはrequireして使用すること
/*
    書籍情報
    GETで使用$book_id
*/


require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');
require_once(__DIR__.'/../../app/Categories.php');
require_once(__DIR__.'/../../app/Users.php');

$pdo = connect();

$book = new Books($pdo,'books');
$cate = new Categories($pdo, 'categories');
$user = new Users($pdo, 'users');

$book_id = $_GET['book_id'];

$data = $book->searchBookData($book_id);
$histories = $book->getHistoryBook($book_id);

// 追加で
// カテゴリIDからカテゴリ名

$cate_name = $cate->getCateName($data['cate']);


function getUserName($user, $user_id){
    $user_info = $user->getUserInfo($user_id);
    return $user_info['name'];
}