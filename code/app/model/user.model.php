<?php

class user extends database
{
    public function __construct()
    {
        $this->db= new database;
    }

    public function addclient($data)
    {
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind(":email", $data["email"]);
        $user = $this->db->fetch();
        if($user == null){
        $this->db->query("INSERT INTO users (fname,lname,email,pwd,role,situation) VALUES (:fname,:lname,:email,:pwd,:role,'0')");
        $this->db->bind(":fname", $data["fname"]);
        $this->db->bind(":lname", $data["lname"]);
        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":pwd", $data["pwd"]);
        $this->db->bind(":role", $data["role"]);
        $this->db->execute();
        $result = "add";
        }else{
        $result = "exist";
        }
        return $result;
    }

    public function addfreelancer($data)
    {
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind(":email", $data["email"]);
        $user = $this->db->fetch();
        if($user == null){
        $this->db->query("INSERT INTO users (fname,lname,email,pwd,role,situation) VALUES (:fname,:lname,:email,:pwd,:role,'fr')");
        $this->db->bind(":fname", $data["fname"]);
        $this->db->bind(":lname", $data["lname"]);
        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":pwd", $data["pwd"]);
        $this->db->bind(":role", $data["role"]);
        $this->db->execute();
        $result = "add";
        }else{
        $result = "exist";
        }
        return $result;
    }

    public function checklogin($email,$pwd){
        $this->db->query("SELECT * FROM users WHERE email='" . $email. "'");
        $user = $this->db->fetch();
        $hashed = $user->pwd;
        if (password_verify($pwd, $hashed)) {
            return $user;
        }
        
    }
    public function getUserById(){
        $this->db->query("SELECT * FROM users WHERE id_user = :id");
        $this->db->bind(':id', $_SESSION['id']);
        $user = $this->db->fetchAll();
        return $user;
    }
    public function notFirstTime(){
        $this->db->query("UPDATE users SET situation = '1'  WHERE id_user = :id ");
        $this->db->bind(':id', $_SESSION['id']);
        return $this->db->execute();
    }
    public function fortest(){
        $this->db->query("UPDATE users SET situation = 'att'  WHERE id_user = :id ");
        $this->db->bind(':id', $_SESSION['id']);
        return $this->db->execute();
    }
    public function review(){
        $this->db->query("UPDATE users SET situation = 'sub'  WHERE id_user = :id ");
        $this->db->bind(':id', $_SESSION['id']);
        return $this->db->execute();
    }
 

}
