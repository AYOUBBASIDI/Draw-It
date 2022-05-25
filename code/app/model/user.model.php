<?php

class user extends database
{
    public function __construct()
    {
        $this->db= new database;
    }

    public function adduser($data)
    {
        $this->db->query("INSERT INTO users (fname,lname,email,pwd,role) VALUES (:fname,:lname,:email,:pwd,:role)");
        $this->db->bind(":fname", $data["fname"]);
        $this->db->bind(":lname", $data["lname"]);
        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":pwd", $data["pwd"]);
        $this->db->bind(":role", $data["role"]);
        // $this->db->execute();
        return $this->db->execute();
    }
    public function checklogin($email,$pwd){
        $this->db->query("SELECT * FROM users WHERE email='" . $email. "' and pwd='" . $pwd . "'");
        $result = $this->db->fetch();
        return $result;
    }
 
    // public function getUsers()
    // {
    //     $this->db->query("SELECT * FROM users");
    //     return $this->db->resultSet();
    // }
}
