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
                        if($this->userModel->addclient($data)){
                        redirect("pages/home");
                    }
        }
    }

        public function newdesigner(){
            if(isset($_POST["adddesigner"] )){
                $data = [
                                "fname" => $_POST["fname"],
                                "lname" => $_POST["lname"],
                                "email" => $_POST["email"],
                                "pwd" => PASSWORD_HASH($_POST["pwd"], PASSWORD_DEFAULT),
                                "role" => $_POST["role"],
                            ];
                            if($this->userModel->addfreelancer($data)){
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
                if ($data['email'] === "admin@admin.com" && $data['pwd'] === "ayoub"){
                    redirect("pages/adminHome");
                }else if($user = $this->userModel->checklogin($data['email'], $data['pwd'])){
                        if ($user)
                        {
                            // var_dump($user);
                            // die($user->id);
                            session_start();
                            $_SESSION['id'] = $user->id_user;
                            $_SESSION['lname'] = $user->lname;
                            $_SESSION['role'] = $user->role;
                            $_SESSION['fname'] = $user->fname;

                            if($_SESSION['role']  === "client"){
                                if($user->situation === "0"){
                                    redirect("pages/hello_Client");
                                }else{
                                    redirect("pages/client_dashboard");
                                }
                                
                            }else if($_SESSION['role']  === "designer"){
                                if($user->situation === "fr"){
                                redirect("pages/asFreelancer");
                                }else if($user->situation === "att"){
                                    redirect("pages/test");
                            }else if($user->situation === "sub"){
                                redirect("pages/review");
                        }else if($user->situation === "yes"){
                            // redirect("pages/hello_Designer");
                    }else if($user->situation === "no"){
                            // redirect("pages/hello_Designer");
                    }
                        }
                    }else{
                                redirect("pages/login");
                            }
                }
            }
        }

            public function logout(){
                if ($this->userModel->notFirstTime()){  
                $_SESSION['id'] = null;
                $_SESSION['lname'] = null;
                $_SESSION['role'] = null;
                // unset($_SESSION['id']);
                // unset($_SESSION['lname']);
                // unset($_SESSION['role']);
                redirect('pages/home');
            }
        }
        public function log_out(){
            $_SESSION['id'] = null;
                $_SESSION['lname'] = null;
                $_SESSION['role'] = null;
                // unset($_SESSION['id']);
                // unset($_SESSION['lname']);
                // unset($_SESSION['role']);
                redirect('pages/home');
        }

        

}
