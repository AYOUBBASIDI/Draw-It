<?php

class users extends controller
{
    public function __construct()
    {
        $this->userModel = $this->model('user');
    }
    // public function index()
    // {
        
    // }

    // public function add(){
        
    //     if(isset($_POST["send"] )){
            
    //         $data = [
    //             "name" => $_POST["name"]
    //         ];
    //         if($this->userModel->addUser($data)){
    //             redirect("pages/home", $data);
    //        }
    //     }
    // }

    public function newclient(){
        if(isset($_POST["addclient"] )){
            $data = [
                            "fname" => $_POST["fname"],
                            "lname" => $_POST["lname"],
                            "email" => $_POST["email"],
                            "pwd" => PASSWORD_HASH($_POST["pwd"], PASSWORD_DEFAULT),
                            "role" => $_POST["role"],
                        ];
                        if($this->userModel->adduser($data)){
                        redirect("pages/client_dashboard");
                    }
        }
    }

        public function newdesigner(){
            if(isset($_POST["adddesigner"] )){
                $data = [
                                "fname" => $_POST["fname"],
                                "lname" => $_POST["lname"],
                                "email" => $_POST["email"],
                                "pwd" => $_POST["pwd"],
                                "role" => $_POST["role"],
                            ];
                            if($this->userModel->adduser($data)){
                            redirect("pages/home", $data);
                        }
            }
    }

        public function login(){
            if(isset($_POST["login"] )){
                $data = [
                    "email" => $_POST["email"],
                    "pwd" => $_POST["pwd"],
                ];
                if($user = $this->userModel->checklogin($data['email'], $data['pwd'])){
                        if ($user) 
                        {
                            session_start();
                            $_SESSION['id'] = $user->id;
                            $_SESSION['lname'] = $user->lname;
                            $_SESSION['role'] = $user->role;

                            if($_SESSION['role']  === "client"){
                                redirect("pages/hello_Client" ,$_SESSION['lname']);
                            }else if($_SESSION['role']  === "designer"){
                                redirect("pages/asFreelancer");
                            }
                        }
                    }else{
                                redirect("pages/login");
                            }
                }
            }

            public function logout(){

                $_SESSION['id'] = null;
                $_SESSION['lname'] = null;
                $_SESSION['role'] = null;
                redirect('user/home');
            }

        

}
