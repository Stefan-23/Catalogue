<?php

    class Pages extends Controller {
        public function __construct(){
            $this->postModel = $this->model('Post');
        }
        
        //index function
        public function index(){
            
            $posts = $this->postModel->getPosts();

            $data = [
                'title' => 'Catalogue',
                'description' => 'Check out our best products! Do not forget to leave comment on out posts page.'
            ];
            $this->view('pages/index', $data);
        }
        //about page
        public function about(){
            $data = [
                'title' => 'About'
            ];
            $this->view('pages/about', $data);
        }

        //lemon page
        public function lemon(){
            $data = [
                'title' => 'Lemon',
            ];
            $this->view('pages/lemon', $data);
        }
        
        //orange page
        public function orange(){
            $data = [
                'title' => 'Orange',
            ];
            $this->view('pages/orange', $data);
        }

        //banana page
        public function banana(){
            $data = [
                'title' => 'Banana',
            ];
            $this->view('pages/Banana', $data);
        }

        //apple
        public function apple(){
            $data = [
                'title' => 'Apple',
            ];
            $this->view('pages/apple', $data);
        }

        //watermelon
        public function watermelon(){
            $data = [
                'title' => 'Watermelon',
            ];
            $this->view('pages/watermelon', $data);
        }

        //kiwi page
        public function kiwi(){
            $data = [
                'title' => 'Kiwi',
            ];
            $this->view('pages/kiwi', $data);
        }

        //grape page
        public function grape(){
            $data = [
                'title' => 'Grape',
            ];
            $this->view('pages/grape', $data);
        }

        //raspberry page
        public function raspberry(){
            $data = [
                'title' => 'Raspberry',
            ];
            $this->view('pages/raspberry', $data);
        }

        //blueberry page
        public function blueberry(){
            $data = [
                'title' => 'Blueberry',
            ];
            $this->view('pages/blueberry', $data);
        }
    }