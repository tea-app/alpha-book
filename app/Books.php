<?php

class Books
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
    
    /**
    * Add New Book Data
    *
    * @param int $book_id
    * @param int $isbn
    * @param String $title
    * @param String $author
    * @param String $image
    * @param int $status
    * @param int $cate
    *
    * @return bool
    */
    public function addBookData($book_id, $isbn, $title, $author, $image, $status, $cate)
    {
        $stmt = $this->connect->prepare('INSERT INTO books (book_id, isbn, title, author, image, status, cate) VALUES (:book_id, :isbn, :title, :author, :image, :status, :cate)');
        $stmt->bindValue(':book_id', $book_id, PDO::PARAM_INT);
        $stmt->bindValue(':isbn', $isbn, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':author', $author, PDO::PARAM_STR);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $stmt->bindValue(':status', $status, PDO::PARAM_INT);
        $stmt->bindValue(':cate', $cate, PDO::PARAM_INT);
        var_dump($stmt->execute());
    }
    
    public function show($test)
    {
        echo $test;
    }
    
}