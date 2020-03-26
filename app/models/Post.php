<?php
    
    class Post{
        private $database;

        public function __construct(){
            $this->database = new Database;
        }

        public function getPosts(){
            $this->database->query("SELECT * FROM posts");

            return $this->database->resultSet();
        }
    }