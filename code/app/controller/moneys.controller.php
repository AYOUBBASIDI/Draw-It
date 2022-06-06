<?php
class Moneys extends controller
{
    public function __construct()
    {
        $this->moneyModel = $this->model('money');
    }

    public function withdraw(){
        if(isset($_POST["get_money"] )){
            $data = [
                            "withdraw" => $_POST["withdraw"],
                        ];
                        if($this->moneyModel->withdraw($data)){
                                redirect("pages/designer_dashboard", $data);
                            }
                    }
    }

    public function depos(){
        if(isset($_POST["get_money"] )){
            $data = [
                            "depos" => $_POST["depos"],
                        ];
                        if($this->moneyModel->depos($data)){
                                redirect("pages/client_dashboard", $data);
                            }
                    }
    }

}