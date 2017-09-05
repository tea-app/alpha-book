<?php

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');
$pdo = connect();

$book = new Books($pdo, 'books');

$cate_name = $_POST['cate_name'];

$book->addCate($cate_name);

header('Location: /../sample.html');
?>