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

    // public function getjobs()
    // {
    //     if($this->userModel->getjobs()){
    //         redirect("pages/client_dashboard");
    //     }
    // }

}


?>