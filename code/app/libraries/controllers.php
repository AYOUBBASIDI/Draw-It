<?php

class controller
{

    public function model($model)
    {
        require_once '../app/model/' . $model . '.model.php';
        return new $model;
    }

    public function view($view, $data = []){
        
        if(file_exists('../app/view/' . $view . '.view.php')){
            require_once '../app/view/' . $view . '.view.php';
        } else {
        
            die("View n'existe pas");
        }
    }
}
