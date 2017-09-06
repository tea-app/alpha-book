<?php

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Books.php');

$pdo = connect();

$book = new Books($pdo, 'lend');

$book_id = 1234;

$histories = $book->getHistoryBook($book_id);
echo('<pre>');
var_dump($histories);
echo('</pre>');