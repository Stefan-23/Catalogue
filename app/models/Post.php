<?php
    
    class Post{
        private $database;

        public function __construct(){
            $this->database = new Database;
        }
    }