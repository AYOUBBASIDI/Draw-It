<?php

class users extends controller
{
    public function __construct()
    {
        $this->jobModel = $this->model('job');
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
                // echo "login1";
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
                                echo "login3";
                                if($user->situation === "fr"){
                                    echo "login4";
                                redirect("pages/asFreelancer");
                                }else if($user->situation === "att"){
                                    redirect("pages/test");
                                }else if($user->situation === "sub"){
                                    redirect("pages/review");
                                }else if($user->situation === "yes"){
                                    redirect("pages/accepted");
                                }else if($user->situation === "no"){
                                        redirect("pages/rejected");
                                }else if($user->situation === "1"){
                                    redirect("pages/designer_dashboard");
                                }
                            }
                    }
                }else{
                                redirect("pages/login");
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
        // public function log_out(){
        //     if ($this->userModel->FirstLogOut()){  
        //     $_SESSION['id'] = null;
        //         $_SESSION['lname'] = null;
        //         $_SESSION['role'] = null;
        //         // unset($_SESSION['id']);
        //         // unset($_SESSION['lname']);
        //         // unset($_SESSION['role']);
        //         redirect('pages/home');
        //     }
        // }

        public function test(){
            // echo "im here";
            // die();
            if ($this->userModel->fortest()){
                redirect('pages/test');
            }
        }
        public function log_out(){
            $_SESSION['id'] = null;
            $_SESSION['lname'] = null;
            $_SESSION['role'] = null;
            redirect('pages/home');
        }
        public function review(){
            if ($this->userModel->review()){
                redirect('pages/review');
            }
        }

        public function uploadfile($name)
        {
            if(!empty($name))
        {
            $filename = basename($name);
            $filepath = '../public/local_images/' . $filename;
            if (!empty($filename) && file_exists($filepath)){
                if (!empty($filename) && file_exists($filepath)){
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/pdf');
                    header("Cache-Control: no-cache, must-revalidate");
                    header("Expires: 0");
                    header('Content-Disposition: attachment; filename="'.basename($filename).'"');
                    header('Content-Length: ' . filesize($filename));
                    header('Pragma: public');
                    readfile($filepath);
                    exit;
                }
            }
            else{
                echo "this file does not exist";
            }
        }
        }

        public function goodjob($id_job,$id_user,$price)
        {
            $data = [
                "id_job" => $id_job,
                "id_user" => $id_user,
                "price" => $price,
            ];

            if($this->jobModel->goodjob($data)){
                redirect("pages/client_dashboard");
            }
        }

        

}
