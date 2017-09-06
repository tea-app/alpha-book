<?php

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');

$pdo = connect();

$book = new Books($pdo, 'books');

$books = $book->getALlBook();

//echo '<pre>';
//var_dump($books);
//echo '</pre>';