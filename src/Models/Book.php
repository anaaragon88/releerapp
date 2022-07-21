<?php

namespace App\Models;

use App\Tools\Database;

class Book{
    private ?int $id;
    private string $bookname;
    private string $author;
    private string $gender;
    private string $isbn;
    private ?string $price;
    private ?string $bookstate;


    private $database;
    private $table ="libros";

    public function __construct(int $id = null, string $bookname = "", string $author = "", string $gender = "", string $isbn = "", string $price ="", string $bookstate=""){
        $this->id = $id;
        $this->bookname = $bookname;
        $this->author = $author;
        $this->gender = $gender;
        $this->isbn = $isbn;
        $this->price = $price;
        $this->bookstate = $bookstate;

        if (!$this->database){
            $this->database = new Database();
        }

    }

        
    public function allBook(){
        $query = $this->database->getConnection()->query("SELECT * FROM {$this->table}");
        $bookArray = $query->fetchAll();
        $bookList = [];
        foreach($bookArray as $book ){
            $bookItem = new Book(
                $book["id"],
                $book["bookname"],
                $book["author"],
                $book["gender"],
                $book["isbn"],
                $book["price"]);
                array_push($bookList, $bookItem);
        }
        return $bookList;

    }

    public function getId(){
        return $this->id;
    }
    public function getBookname(){
        return $this->bookname;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function getGender(){
        return $this->gender;
    }
    public function getIsbn(){
        return $this->isbn;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getBookstate(){
        return $this->bookstate;
    }

    public function findById($itemId){
        $query = $this->database->getConnection()->query("SELECT * FROM {$this->table} WHERE id={$itemId}"); 
        $result = $query->fetchAll();
        return new Book (
            $result[0]["id"],
            $result[0]["bookname"],
            $result[0]["author"],
            $result[0]["gender"],
            $result[0]["isbn"],
            $result[0]["date_time"]);

    }


    public function destroy(){
        $query = $this->database->getConnection()->query("DELETE FROM {$this->table} WHERE id= {$this->id}");
    }


    public function saveBook(){
        $query = $this->database->getConnection()->query("INSERT INTO {$this->table}('name', 'phone', 'email', 'user_query')values($this->name, $this->phone, $this->email, $this->user_query)");
    }
}
