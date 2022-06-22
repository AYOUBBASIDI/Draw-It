<?php

class jobs extends controller
{
    public function __construct()
    {
        $this->jobModel = $this->model('job');
    }

    public function newjob()
    {
        
        if(isset($_POST["addjob"] )){
            $data = [
                            "type" => $_POST["type"],
                            "favcolor" => $_POST["favcolor"],
                            "delay" => $_POST["delay"],
                            "price" => $_POST["price"],
                            "description" => $_POST["description"],
                            "creator" => $_POST["name"],
                        ];

                        if($this->jobModel->addjob($data)){
                            $_SESSION["status"] = "Job has been created";
                            redirect("pages/client_dashboard", $data);
                        }
        }
    }

    public function new_request($id){
        $data = [
            "id" => $id,
        ];
        if($this->jobModel->addrequest($data)){
            $_SESSION["status"] = "the request has been sent";
            redirect("pages/designer_dashboard");
        }
    }

    public function acceptJob($user,$name,$job,$request,$price){
        // echo $request;
        // die();
        $data = [
                            "job_accepted" => $job,
                            "user_accepted" => $user,
                            "request" => $request,
                            "price" => $price,
                        ];

                        if($this->jobModel->acceptJob($data)){  
                            $_SESSION["status"] = "You choose $name to complet your job";                        
                            redirect("pages/client_dashboard");
                        }
    }

    public function rejected($user,$job,$rendu){
        // echo $request;
        // die();
        $data = [
                            "job_accepted" => $job,
                            "user_accepted" => $user,
                            "rendu" => $rendu,
                        ];

                        if($this->jobModel->rejected($data)){   
                            $_SESSION["status"] = "You rejected the rendered";                         
                            redirect("pages/client_dashboard");
                        }
    }

    // public function getjobs()
    // {
    //     if($this->userModel->getjobs()){
    //         redirect("pages/client_dashboard");
    //     }
    // }
    public function new_rendu()
    {
        if(isset($_POST["rendu_client"] )){
            $name_file = $_FILES['rendu']['name'];
            $tmp_name = $_FILES['rendu']['tmp_name'];
            $local_image = '../public/local_images/';
            $upload = move_uploaded_file($tmp_name,$local_image.$name_file);
            if($upload){
            $data = [
                            "rendu" => $name_file,
                            "id_job" => $_POST["id_job"],
                            "message" => $_POST["message"],
                        ];

                        if($this->jobModel->new_rendu($data)){
                            $_SESSION["status"] = "Your rendered has been sent seccessfuly , Good Job !";
                            redirect("pages/designer_dashboard");
                        }
            }
        }
    }


    public function deletejob($id){
        $data = [
            "id" => $id,
        ];
        if($this->jobModel->deletejob($data)){
            $_SESSION["status"] = "Your job has been deleted";
            redirect("pages/client_dashboard");
        }
    }


    public function update(){
        if(isset($_POST["update"] )){

            if(empty($_POST["pwd"])){
                $pwd = $_POST["oldpwd"];
            }
            else{
                $pwd =$_POST["pwd"];
            }

            if(empty($_POST["phone"])){
                $phone = $_POST["oldphone"];
            }
            else{
                $phone =$_POST["phone"];
            }
            $data = [
                            "fname" => $_POST["fname"],
                            "lname" => $_POST["lname"],
                            "pwd" => PASSWORD_HASH($pwd, PASSWORD_DEFAULT),
                            "email" => $_POST["email"],
                            "phone" => $phone,
                        ];

                        var_dump($data);

                        if($this->jobModel->update($data)){
                            $_SESSION["status"] = "Your info has been updated";
                            redirect("pages/designer_profile");
                        }
        }
    }

}


?>