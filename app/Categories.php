<?php

class Categories
{
    /**
    * @var PDO
    */
    private $connect;
    
    /**
    * @var String
    */
    private $dbtable;
    
    /**
    * インスタンスを生成する
    *
    * @param PDO $connect
    * @param String $dbtable
    */
    public function __construct($connect, $dbtable)
    {
        $this->connect = $connect;
        $this->dbtable = $dbtable;
    }
    
    public function addCate($cate_name)
    {
        $stmt = $this->connect->prepare('INSERT INTO categories (cate_name) VALUES (:cate_name)');
        $stmt->bindValue(':cate_name', $cate_name, PDO::PARAM_STR);
        var_dump($stmt->execute());
    }
    
    public function getCate()
    {
        $stmt = $this->connect->prepare('SELECT * FROM categories');
        $stmt -> execute();
        $cates = $stmt -> fetchAll();
        return $cates;
    }
    
    public function getCateName($id)
    {
        $stmt = $this->connect->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $cate_name = $stmt->fetch();
        return $cate_name['cate_name'];
    }
}