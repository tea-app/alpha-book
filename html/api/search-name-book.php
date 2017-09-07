<?php

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');
require_once(__DIR__.'/../../app/Categories.php');

$pdo = connect();

$book = new Books($pdo, 'books');
$cate = new Categories($pdo, 'categories');
$book_name = $_GET['book_name'];

$books = $book->searchNameBook($book_name);
//echo $book_name;
//echo '<pre>';
//var_dump($books);
//echo '</pre>';



function getCateName($cate, $book_id){
    $cate_name = $cate->getCateName($book_id);
    return $cate_name;
}