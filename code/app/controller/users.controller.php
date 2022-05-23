<?php

class users extends controller
{
    public function __construct()
    {
        $this->userModel = $this->model('user');
    }
    public function index()
    {
        
    }

    public function add(){
        
        if(isset($_POST["send"] )){
            
            $data = [
                "name" => $_POST["name"]
            ];
            if($this->userModel->addUser($data)){
                redirect("pages/home", $data);
           }
        }
    }

}
