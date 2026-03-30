<?php

class BaseController
{
    public function __construct()
    {
    
    }
    public function render($model,$view,$data = []){
        extract($data);
        require __DIR__ . '/../views/'.$model. '/' . $view . '.php';
    }

    public function redirect($url){
        header("Location: $url");
        exit();
    }
}
?>