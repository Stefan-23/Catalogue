<?php

    //Load Config
    require_once 'config/config.php'; 


    //Autoload Core Libraries
    /* 
        Since __autoload function is removed as of php version 7.2.0. I wil use spl_autoload_register function.
        More info you can find here but i am sure you know this already. :)
        https://www.php.net/manual/en/function.autoload.php
    */

    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });
