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
        $this->db->query("INSERT INTO test_rendu (message,rendu,designer_test) VALUES (:message,:rendu,:designer)");
        $this->db->bind(":message", $data["message"]);
        $this->db->bind(":designer", $_SESSION["id"]);
        $this->db->bind(":rendu", $data["rendu"]);
        return $this->db->execute();
    }
    public function rendredForAdmin(){
        $this->db->query("SELECT test_rendu.*,users.fname,users.lname,users.id_user from test_rendu INNER JOIN users on test_rendu.designer_test = users.id_user");
        $rendu = $this->db->fetchAll();
        return $rendu;

    }
    public function accept_dsigner($id_user , $id_rendu)
    {
        $this->db->query("UPDATE users SET situation = 'yes'  WHERE id_user = :id ;
                                    DELETE FROM test_rendu WHERE id_rendu = :id_rendu ");
        $this->db->bind(':id', $id_user);
        $this->db->bind(':id_rendu', $id_rendu);
        return $this->db->execute();
    }
    public function reject_dsigner($id_user , $id_rendu)
    {
        $this->db->query("UPDATE users SET situation = 'no'  WHERE id_user = :id ;
                                    DELETE FROM test_rendu WHERE id_rendu = :id_rendu ");
        $this->db->bind(':id', $id_user);
        $this->db->bind(':id_rendu', $id_rendu);
        return $this->db->execute();
    }
    public function delete_user($id)
    {
        $this->db->query("DELETE FROM jobs where creator = :id;
                                    DELETE FROM users WHERE id_user = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}