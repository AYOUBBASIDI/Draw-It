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
                $name_file = $_FILES['rendu']['name'];
                $tmp_name = $_FILES['rendu']['tmp_name'];
                $local_image = '../public/local_images/';
                $upload = move_uploaded_file($tmp_name,$local_image.$name_file);
                if($upload){
                    $data = [
                        "message" => $_POST["message"],
                        "rendu" => $name_file,
                    ];
                    if($this->adminModel->submitTest($data)){
                        redirect("users/review");
                        // echo "final ";
                    }
                }
            
        }
    }
    public function upload($name)
    {
        if(!empty($name))
        {
            $filename = basename($name);
            $filepath = '../public/local_images/' . $filename;
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
            else{
                echo "this file does not exist";
                echo $filename;
            }
        }
    }

    public function accept_designer($id_user , $id_rendu)
    {
        if ($this->adminModel->accept_dsigner($id_user , $id_rendu)){
            redirect('pages/adminHome');
        }
    }
    public function reject_designer($id_user , $id_rendu)
    {
        if ($this->adminModel->reject_dsigner($id_user , $id_rendu)){
            redirect('pages/adminHome');
        }
    }

    public function delete_user($id){
        if ($this->adminModel->delete_user($id)){
            redirect('pages/adminHome');
        }
    }


}