<?php

    class Users extends Controller{

        public function __construct(){
            $this->userModel = $this->model('User');
        }
        public function index(){


        }

        //register function
        public function register(){
            //Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //Sanatize post 
                 $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['name']),                  
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'err_name' => '',
                    'err_email' => '',
                    'err_password' => '',
                    'err_confirm_password' => '',
                ];

                //Validate name
                if(empty($data['name'])){
                    $data['err_name'] = 'Please type in your name';
                }

                //Validate email
                if(empty($data['email'])){
                    $data['err_email'] = 'Please type in your email';
                }else{
                    //Check mail
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['err_email'] = 'Email already exists';
                    }
                }

                //Validate password
                if(empty($data['password'])){
                    $data['err_password'] = 'Please type in your password';
                }elseif(strlen($data['password'] < 6)){
                    $data['err_password'] = 'Password must be at least 6 characters long';
                }

                //Validate confirm password
                if(empty($data['confirm_password'])){
                    $data['err_confirm_password'] = 'Please confirm your password';
                }else{
                    if($data['password'] != $data['confirm_password']){
                        $data['err_confirm_password'] = 'Password must match!';
                    }
                }

                //This here is checking if there are no errors will process the form.
                if(empty($data['err_name']) && empty($data['err_email']) && empty($data['err_password']) && empty($data['err_confirm_password'])){
                   
                //Hash password
                //One way password hashing
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //User register
                if($this->userModel->register($data)){
                    flash('register_success', 'You are registered and ready to log in!');
                    redirect('posts/index');
                }else{
                    die('Something went wrong');
                }
                }else{
                    //Load with errors
                    $this->view('users/register', $data);
                }

                

                
            }else{
                $data = [
                    'name' => '',                  //leaving blank if some error happens this will stay so users don't have to type again.
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'err_name' => '',
                    'err_email' => '',
                    'err_password' => '',
                    'err_confirm_password' => '',
                ];
            }
            $this->view('users/register', $data);
        }


        //login function
        public function login(){
            //Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanatize post 
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                                      
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'err_email' => '',
                    'err_password' => '',

                ];

                //Validate email
                if(empty($data['email'])){
                    $data['err_email'] = 'Please type in your email';
                }

                //Validate password
                if(empty($data['password'])){
                    $data['err_password'] = 'Please type in your password';
                }

                //Validate user via emai
                if($this->userModel->findUserByEmail($data['email'])){

                }else{
                    $data['err_email'] = 'User not found';
                }

                //This here is checking if there are no errors it process the form.
                if(empty($data['err_email']) && empty($data['err_password'])){
                    //Validate
                    $login = $this->userModel->login($data['email'], $data['password']);
                
                    if($login){
                        $this->createSession($login);
                    }else{
                        $data['err_password'] = 'Incorrect password';

                        $this->view('users/login' , $data);
                    }

                }else{
                    //Load with errors
                    $this->view('users/login', $data);
                }
            }else{
                $data = [
                    'email' => '',
                    'password' => '',
                    'err_email' => '',
                    'err_password' => '',
                ];
            }
            $this->view('users/login', $data);
        }
        //crate session
        public function createSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            redirect('posts/index');
            
        }
        //destroy
        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('users/login');
        }
    }