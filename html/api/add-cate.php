<?php
/*
    Add Cate
    カテゴリ追加
    POST
*/

require_once(__DIR__.'/../../app/connect.php');
require_once(__DIR__.'/../../app/Categories.php');
$pdo = connect();
$cate = new Categories($pdo, 'categories');
$cate_name = $_POST['cate_name'];

if($cate_name == null){
    //
} else{
    $cate->addCate($cate_name);
}


header('Location: /../new-cate.php');
?>