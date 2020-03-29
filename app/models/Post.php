<?php
    
    class Post{
        private $database;

        public function __construct(){
            $this->database = new Database;
        }

        public function getPosts(){
            $this->database->query("SELECT *,
                                    posts.id as postId,
                                    users.id as userId,
                                    posts.created as postCreated,
                                    users.created as userCreated
                                    FROM posts
                                    INNER JOIN users
                                    ON posts.user_id = users.id
                                    ORDER BY posts.created DESC
                                    ");

            return $this->database->resultSet();
        }


        public function addPost($data){
            $this->database->query("INSERT INTO posts (title, user_id, body) VALUE(:title,:user_id, :body) ");
            $this->database->bind(':title', $data['title']);
            $this->database->bind(':user_id', $data['user_id']);
            $this->database->bind(':body', $data['body']);
            //Execute
            if($this->database->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getPostById($id){
            $this->database->query('SELECT*FROM posts WHERE id = :id');
            $this->database->bind(':id', $id);

            $row = $this->database->single();

            return $row;
        }

        public function editPost($data){
            $this->database->query('UPDATE posts SET title = :title, body = :body, approved = :approved WHERE id = :id');
            // Bind values
            $this->database->bind(':id', $data['id']);
            $this->database->bind(':title', $data['title']);
            $this->database->bind(':body', $data['body']);
            $this->database->bind(':approved', $data['approved']);
            //Execute
            if($this->database->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deletePost($id){
            $this->database->query('DELETE FROM posts WHERE id = :id');
            // Bind values
            $this->database->bind(':id', $id);
      
            // Execute
            if($this->database->execute()){
              return true;
            } else {
              return false;
            }
          }

    }