<?php

class admin extends database
{
    public function __construct()
    {
        $this->db= new database;
    }

    public function addtest($data)
    {
        $this->db->query("INSERT INTO tests (title_test,color_test,slug_test,genre_test,description) VALUES (:title_test,:color_test,:slug_test,:genre_test,:description)");
        $this->db->bind(":title_test", $data["title"]);
        $this->db->bind(":color_test", $data["color"]);
        $this->db->bind(":slug_test", $data["slug"]);
        $this->db->bind(":genre_test", $data["genre"]);
        $this->db->bind(":description", $data["description"]);
        return $this->db->execute();
    }
    public function getRandomTest()
    {
        $this->db->query("SELECT * FROM tests WHERE id_test = 1");
        $test = $this->db->fetchAll();
        return $test;
    }
    public function submitTest($data){
        $this->db->query("INSERT INTO test_rendu (message,rendu) VALUES (:message,:rendu)");
        $this->db->bind(":message", $data["message"]);
        $this->db->bind(":rendu", $data["rendu"]);
        return $this->db->execute();
    }
}