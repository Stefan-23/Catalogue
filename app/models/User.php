<?php

    class User{

        private $database;

        public function __construct(){
            $this->database = new Database;
        }

        public function register($data){
            $this->database->query("INSERT INTO users (name, password, email) VALUE(:name,:password, :email) ");
            $this->database->bind(':name', $data['name']);
            $this->database->bind(':password', $data['password']);
            $this->database->bind(':email', $data['email']);
            //Execute
            if($this->database->execute()){
                return true;
            }else{
                return false;
            }
        }

        //Login user

        public function login($email,$password){
            $this->database->query("SELECT * FROM users WHERE email = :email");
            $this->database->bind(':email', $email);
            
            $row = $this->database->single();

            //check hashed password
            $hash_psw = $row->password;
            if(password_verify($password,$hash_psw)){
                return $row;
            } else{
                return false;
            }
        }
        
        //Find by email
        public function findUserByEmail($email){

            $this->database->query('SELECT * FROM users WHERE email = :email');
            $this->database->bind(':email', $email);

            $row = $this->database->single();

            if($this->database->rowCount() > 0){
                return true;
            }else {
                return false;
            }
        }

        //Get user by ID
        public function getUserById($id){

            $this->database->query('SELECT * FROM users WHERE id = :id');
            $this->database->bind(':id', $id);

            $row = $this->database->single();
            
            //check row
            return $row;
        }


    }