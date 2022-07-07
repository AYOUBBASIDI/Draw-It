<?php
class Moneys extends controller
{
    public function __construct()
    {
        $this->moneyModel = $this->model('money');
    }

    //to withdraw (still static)
    public function withdraw()
    {
        if(isset($_POST["get_money"] ))
        {
            $data = [
                            "withdraw" => $_POST["withdraw"],
                        ];
            if($this->moneyModel->withdraw($data))
            {
                redirect("pages/designer_dashboard", $data);
            }
        }
    }

    //to depos (still static)
    public function depos(){
        if(isset($_POST["get_money"] ))
        {
            $data = [
                            "depos" => $_POST["depos"],
                        ];
            if($this->moneyModel->depos($data))
            {
                    redirect("pages/client_dashboard", $data);
            }
        }
    }
}