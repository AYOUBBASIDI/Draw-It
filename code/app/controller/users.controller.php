<?php

class users extends controller
{
    public function __construct()
    {
        $this->jobModel = $this->model('job');
        $this->userModel = $this->model('user');
    }


    //add new client
    public function newclient()
    {
        if(isset($_POST["addclient"] )){
        $data = [
                        "fname" => $_POST["fname"],
                        "lname" => $_POST["lname"],
                        "email" => $_POST["email"],
                        "pwd" => PASSWORD_HASH($_POST["pwd"], PASSWORD_DEFAULT),
                        "role" => $_POST["role"],
                    ];
        $result = $this->userModel->addclient($data);
        if($result === "exist"){
            $_SESSION["alert"] = "true";
            redirect("pages/home");
        }elseif($result === "add")
        {
            $_SESSION["alert"] = "true";
            redirect("pages/login");
        }
        }
    }

    //add new designer
    public function newdesigner(){
        if(isset($_POST["adddesigner"] ))
        {
        $data = [
                        "fname" => $_POST["fname"],
                        "lname" => $_POST["lname"],
                        "email" => $_POST["email"],
                        "pwd" => PASSWORD_HASH($_POST["pwd"], PASSWORD_DEFAULT),
                        "role" => $_POST["role"],
                    ];
        $result = $this->userModel->addfreelancer($data);
        if($result === "exist"){
            $_SESSION["alert"] = "true";
            redirect("pages/home");
        }elseif($result === "add")
        {
            $_SESSION["alert"] = "true";
            redirect("pages/login");
        }
        }
}

    public function login(){
        if(isset($_POST["login"] )){
            $data = [
                "email" => $_POST["email"],
                "pwd" => $_POST["pwd"],
            ];
            //login admin
            if ($data['email'] === "admin@admin.com" && $data['pwd'] === "ayoub")
            {
                redirect("pages/adminHome");
            }
            //login user
            else if($user = $this->userModel->checklogin($data['email'], $data['pwd']))
            {
                if ($user)
                {
                    // session_start();
                    // echo "hello";
                    $_SESSION['id'] = $user->id_user;
                    $_SESSION['lname'] = $user->lname;
                    $_SESSION['role'] = $user->role;
                    $_SESSION['fname'] = $user->fname;

                    if($_SESSION['role']  === "client"){
                        //check situation of designer (0/1) 
                        if($user->situation === "0"){
                            redirect("pages/hello_Client");
                        }else{
                            redirect("pages/client_dashboard");
                        }
                    }else if($_SESSION['role']  === "designer"){
                            //check situation of designer (fr/att/sub/yes/no/1) 
                            echo "desi";
                            if($user->situation === "fr"){
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
            }else
            {
                //invalid info
                $_SESSION['error'] = "E-mail or Password is incorrect !";
                redirect("pages/login");
            }
        }
    }

    public function logout(){
        //logout from dashboard the situation will update to 1
        if ($this->userModel->notFirstTime()){  
        $_SESSION['id'] = null;
        $_SESSION['lname'] = null;
        $_SESSION['role'] = null;
        redirect('pages/home');
        }
    }

    //if user accepte to take test situation will update to att
    public function test(){
        if ($this->userModel->fortest()){
            redirect('pages/test');
        }
    }

    public function log_out(){
        //logout from another place !dashboard
        $_SESSION['id'] = null;
        $_SESSION['lname'] = null;
        $_SESSION['role'] = null;
        redirect('pages/home');
    }

    public function review(){
        //designer submit a rendered situation will update to sub
        if ($this->userModel->review()){
            redirect('pages/review');
        }
    }

    public function downloadfile($name)
    {
        //client can download rendered here
        if(!empty($name))
        {
            $filename = basename($name);
            $filepath = '../public/local_images/' . $filename;
            if (!empty($filename) && file_exists($filepath))
            {
                if (!empty($filename) && file_exists($filepath))
                {
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
        }
    }

        public function goodjob($id_job,$id_user,$price,$rendu)
        {
            //client satisfied
            $data = [
                "id_job" => $id_job,
                "id_user" => $id_user,
                "price" => $price,
                "rendu" => $rendu,
            ];

            if($this->jobModel->goodjob($data)){
                $_SESSION["status"] = "You are satisfied";
                redirect("pages/client_dashboard");
            }
        }

        

}
