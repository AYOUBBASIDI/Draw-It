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
                            redirect("pages/client_dashboard", $data);
                        }
        }
    }

    public function new_request($id){
        $data = [
            "id" => $id,
        ];
        if($this->jobModel->addrequest($data)){
            redirect("pages/designer_dashboard");
        }
    }

    public function acceptJob($user,$job,$request){
        // echo $request;
        // die();
        $data = [
                            "job_accepted" => $job,
                            "user_accepted" => $user,
                            "request" => $request,
                        ];

                        if($this->jobModel->acceptJob($data)){                          
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
                            redirect("pages/designer_dashboard");
                        }
            }
        }
    }

}


?>