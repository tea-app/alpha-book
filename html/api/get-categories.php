<?php

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Categories.php');

$pdo = connect();
$cate = new Categories($pdo, 'categories');
$category  = $cate->getCate();