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
    
    //=======================================================
    
    /**
    * Add New Book Data
    * 蔵書登録
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
    
    //========================================================
    
    /**
    * Regist Lend Book
    * 貸し出し履歴保存
    *
    * @param int $book_id
    * @param int $user_id
    * @param int $status
    * @param int $device
    * @param String $ip_address
    */
    public function registLendBook($book_id, $user_id, $status, $device, $ip_address)
    {
        $stmt = $this->connect->prepare('INSERT INTO lend (book_id, user_id, status, device, ip_address) VALUES (:book_id, :user_id, :status, :device, :ip_address)');
        $stmt->bindValue(':book_id', $book_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':status', $status, PDO::PARAM_INT);
        $stmt->bindValue(':device', $device, PDO::PARAM_INT);
        $stmt->bindValue(':ip_address', $ip_address, PDO::PARAM_STR);
        var_dump($stmt->execute());
    }
    
    /**
    * Lend Book
    * 貸し出し時の蔵書一覧のアップデート(status -> user_id)
    *
    * @param int $book_id
    * @param int $status
    */
    public function lendBook($book_id, $status)
    {
        $stmt = $this->connect->prepare('UPDATE books SET status = :status WHERE book_id = :book_id');
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    /**
    * Return Book
    * 返却時の蔵書一覧のアップデート(status -> 0)
    *
    * @param int $book_id
    * @param int $user_id
    */
    public function returnBook($book_id, $status)
    {
        $stmt = $this->connect->prepare('UPDATE books SET status = :status WHERE book_id = :book_id');
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    //========================================================
    
    
    
    //
    // 時間があればgetHistoryBookとgetHistoryUserをひとつにしたい。。
    //
    
    /**
    * Get History Book
    * book_idから貸出履歴
    *
    * @param int $book_id
    */
    public function getHistoryBook($book_id)
    {
        $stmt = $this->connect->prepare('SELECT * FROM lend WHERE book_id = :book_id');
        $stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $stmt->execute();
        $histories = $stmt->fetchAll();
        return $histories;
    }
    
    /**
    * Get History User
    *
    * @param $user_id
    */
    public function getHistoryUser($user_id)
    {
        $stmt = $this->connect->prepare('SELECT * FROM lend WHERE user_id = :user_id');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }
    
    
    //========================================================
    
    /**
    * Search Book data
    *
    * @param int $book_id
    *
    * @return
    */
    public function searchBookData($book_id)
    {
        $stmt = $this->connect->prepare('SELECT * FROM books WHERE book_id = :book_id');
        $stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }
    
}