<?php

    class Posts extends Controller{
        public function __construct(){
            //Checks if user is logged in
            if(!isLoggedIn()){
                redirect('users/login');
              }
            //calling models 
            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }

        //index function
        public function index(){

            $posts = $this->postModel->getPosts();

            $data=[
                'posts' => $posts,
            ];

            $this->view('posts/index', $data);
        }

        public function add(){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data=[

                    'title'=> trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'err_title' => '',
                    'err_body' => '',
                ];


                //Validate data
                if(empty($data['title'])){
                    $data['err_title'] = 'Please enter title';
                }
                if(empty($data['body'])){
                    $data['err_body'] = 'Please enter body text';
                }


                //No errors
                if(empty($data['err_title']) && empty($data['err_body'])){
                    if($this->postModel->addPost($data)){
                        flash('post_message' , 'Post is Pending');
                        redirect('posts');
                    }
                }else{
                    $this->view('posts/add', $data);
                }
            }

            
            $data=[

                'posts' => '',
                'title'=> '',
                'body' => '',
            ];

            $this->view('posts/add', $data);
        }
        //Takes id param to know which post
        public function edit($id){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data=[
                    'id' => $id,
                    'title'=> trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'approved'=> trim($_POST['approved']),
                    'err_title' => '',
                    'err_body' => '',
                    'err_approved' => ''
                ];


                //Validate data
                if(empty($data['title'])){
                    $data['err_title'] = 'Please enter title';
                }
                if(empty($data['body'])){
                    $data['err_body'] = 'Please enter body text';
                }


                //No errors
                if(empty($data['err_title']) && empty($data['err_body'])){
                    if($this->postModel->editPost($data)){
                        flash('post_message' , 'Post Edited');
                        redirect('posts');
                    }
                }else{
                    $this->view('posts/edit', $data);
                }
            }else{
            //Get model methtod
            $post = $this->postModel->getPostById($id);
            
            //Check for owner

           

            
           $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body,
                'approved' => $post->approved
            ];


            $this->view('posts/edit', $data);
        }
    }

        

        public function show($id){

            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);
            $data = [
                'post' => $post,
                'user' => $user,
            ];
            $this->view('posts/show', $data);
        }

        public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Get existing post from model
          $post = $this->postModel->getPostById($id);
          
          // Check for owner
          if($post->user_id != $_SESSION['user_id']){
            redirect('posts');
          }
  
          if($this->postModel->deletePost($id)){
            flash('post_message', 'Post Removed');
            redirect('posts');
          } else {
            die('Something went wrong');
          }
        } else {
          redirect('posts');
        }
      }

      public function admin(){
        $posts = $this->postModel->getPosts();
        //
        
        $data=[
            'posts' => $posts,
        ];

        $this->view('posts/admin', $data);
      }

      

    }