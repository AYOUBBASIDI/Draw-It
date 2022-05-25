<?php

class jobs extends controller
{
    public function __construct()
    {
        $this->userModel = $this->model('job');
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
                            "creator" => $_POST['creator'],
                        ];

                        if($this->userModel->addjob($data)){
                            redirect("pages/client_dashboard", $data);
                        }
        }
    }

}


?>