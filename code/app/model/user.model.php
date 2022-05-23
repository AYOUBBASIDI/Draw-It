<?php

class user extends database
{
    public function __construct()
    {
        $this->db= new database;
    }

    public function addUser($data)
    {
        $this->db->query("INSERT INTO users (name) VALUES (:name)");
        $this->db->bind(":name", $data["name"]);
        // $this->db->execute();
        return $this->db->execute();
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM users");
        return $this->db->resultSet();
    }
}
