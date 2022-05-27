<?php

class admins extends controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('admin');
    }

    public function add_test(){
        if(isset($_POST["submit"] )){
            $data = [
                            "title" => $_POST["title"],
                            "slug" => $_POST["slug"],
                            "color" => $_POST["color"],
                            "genre" => $_POST["genre"],
                            "description" => $_POST["description"],
                        ];
                        if($this->adminModel->addtest($data)){
                            redirect("pages/adminHome", $data);
                        }
            }
    }
    public function submit_test(){
        if(isset($_POST["test_submit"])){
            echo "im in";
                $name_file = $_FILES['rendu']['name'];
                $tmp_name = $_FILES['rendu']['tmp_name'];
                $local_image = 'public/local_images/';
                $upload = move_uploaded_file($tmp_name,$local_image.$name_file);
                if($upload){
                    echo "wlya";
                //     $data = [
                //         "message" => $_POST["message"],
                //         "rendu" => $name_file,
                //     ];
                //     if($this->adminModel->submitTest($data)){
                //         // redirect("users/review");
                //         echo "final ";
                //     }
                }
            
        }
    }


}