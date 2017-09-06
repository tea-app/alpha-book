<?php

class Users
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
    * Add New User
    *
    * @param int $user_id
    * @param String $name
    */
    public function addUser($user_id, $name)
    {
        $stmt = $this->connect->prepare('INSERT INTO users (user_id, name) VALUES (:user_id, :name)');
        var_dump($stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT));
        var_dump($stmt->bindValue(':name', $name, PDO::PARAM_STR));
        var_dump($stmt->execute());
        var_dump($stmt->errorInfo() );
    }
    
    /**
    * Get User Info
    *
    * @param int $user_id
    *
    * @return String $name
    */
    public function getUserInfo($user_id)
    {
        $stmt = $this->connect->prepare('SELECT * FROM users WHERE user_id = :user_id');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }
    
    /**
    * Get All User
    *
    * @return array
    */
    public function getAllUser()
    {
        $stmt = $this->connect->prepare('SELECT * FROM users');
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }
}