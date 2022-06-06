<?php

class money extends database
{
    public function __construct()
    {
        $this->db= new database;
    }

    public function withdraw($data)
    {
        $this->db->query("SELECT * FROM `users` where id_user = :id" );
        $this->db->bind(':id', $_SESSION['id']);
        $request = $this->db->fetch();
        $value = $request->wallet - $data['withdraw'] ;
        if ($value >= 0){
        $this->db->query("UPDATE `users` SET wallet = :wallet WHERE id_user = :id");
        $this->db->bind(":wallet", $value);
        $this->db->bind(":id", $_SESSION['id']);
        $result = $this->db->execute();
        }else{
            $result = "error";
        }
        return $result;
    }

    public function depos($data)
    {
        $this->db->query("SELECT wallet FROM users WHERE id_user = :id" );
        $this->db->bind(':id', $_SESSION["id"]);
        $request = $this->db->fetch();
            $this->db->query("UPDATE users SET wallet = wallet + :depos WHERE id_user = :id");
            $this->db->bind(":depos", $data["depos"]);
            $this->db->bind(":id", $_SESSION["id"]);
            $result = $this->db->execute();
            return $result;
    
}

public function for_money_page(){
    $this->db->query("SELECT wallet FROM users WHERE id_user = :id" );
    $this->db->bind(':id', $_SESSION["id"]);
    $request = $this->db->fetchAll();
    return $request;
}

}