<?php

class user extends database
{
    public function __construct()
    {
        $this->db= new database;
    }

    public function adduser($data)
    {
        $this->db->query("INSERT INTO users (fname,lname,email,pwd,role,situation) VALUES (:fname,:lname,:email,:pwd,:role,'0')");
        $this->db->bind(":fname", $data["fname"]);
        $this->db->bind(":lname", $data["lname"]);
        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":pwd", $data["pwd"]);
        $this->db->bind(":role", $data["role"]);
        // $this->db->execute();
        return $this->db->execute();
    }
    public function checklogin($email,$pwd){
        $this->db->query("SELECT * FROM users WHERE email='" . $email. "'");
        $result = $this->db->fetch();
        $hashed = $result->pwd;
        if (password_verify($pwd, $hashed)) {
            return $result;
        } 
    }
    public function getUserById(){
        $this->db->query("SELECT * FROM users WHERE id_user = :id");
        $this->db->bind(':id', $_SESSION['id']);
        $user = $this->db->fetchAll();
        // var_dump($user);
        return $user;
    }
    public function notFirstTime(){
        $this->db->query("UPDATE users SET situation = '1'  WHERE id_user = :id ");
        $this->db->bind(':id', $_SESSION['id']);
        return $this->db->execute();
    }
 
    // public function getUsers()
    // {
    //     $this->db->query("SELECT * FROM users");
    //     return $this->db->resultSet();
    // }
}
