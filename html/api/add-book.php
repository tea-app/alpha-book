<?php
/*
    Add Book
    書籍追加
    POST
*/

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');

$pdo = connect();

$book = new Books($pdo,'books');

$book_id = $_POST['book_id'];
$isbn    = $_POST['isbn'];
$title   = $_POST['title'];
$author  = $_POST['author'];
$image   = $_POST['image'];
$status  = 0;
$cate    = $_POST['cate'];
if($cate == null){
    //
}else{
    $book->addBookData($book_id, $isbn, $title, $author, $image, $status, $cate);
}


header('Location: /../newbook.php');
?>