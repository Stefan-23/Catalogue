<?php

    class Users extends Controller{

        public function __construct(){

        }
        public function index(){


        }

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
                }

                //Validate password
                if(empty($data['password'])){
                    $data['err_password'] = 'Please type in your password';
                }elseif(strlen($data['password'] > 6)){
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

                if(empty($data['err_name']) && empty($data['err_email']) && empty($data['err_password']) && empty($data['err_confirm_password'])){
                    die('Success');
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

        public function login(){
            //Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process form
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

    }