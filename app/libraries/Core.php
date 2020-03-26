<?php

    //App Core Class
    //Creates URL and loads core controller
    // format - /controller/method/params


    class Core {

        protected $currentController = 'Pages';         // <--- If no other controllers load this
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            //print_r($this->getUrl());
            $url = $this->getUrl();

            //controller first value
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                
                //set controller if exists
                $this->currentController = ucwords($url[0]);

                //unset 0 index
                unset($url[0]);

            }

            //require controller
            require_once '../app/controllers/'. $this->currentController . '.php';

            //Instantiate controller class
            $this->currentController = new $this->currentController;


            //second part of url (method)
            if(isset($url[1])){

                //check if method exists in controller
                if(method_exists($this->currentController, $url[1])){
                  $this->currentMethod = $url[1];
                  // Unset 1 index
                  unset($url[1]);
                }
              }
           
            //params
            $this->params = $url ? array_values($url) : [];
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);


        }

        //get Url
        public function getUrl(){
            if(isset($_GET['url'])){
              $url = rtrim($_GET['url'], '/');
              $url = filter_var($url, FILTER_SANITIZE_URL);
              $url = explode('/', $url);
              return $url;
            }
          }




    }