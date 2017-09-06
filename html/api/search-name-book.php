<?php

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');

$pdo = connect();

$book = new Books($pdo, 'books');
$book_name = $_GET['book_name'];

$books = $book->searchNameBook($book_name);
//echo $book_name;
//echo '<pre>';
//var_dump($books);
//echo '</pre>';