<?php

class job extends database
{
    public function __construct()
    {
        $this->db= new database;
    }

    public function addjob($data)
    {
        $this->db->query("INSERT INTO jobs (type,favcolor,delay,price,description,creator) VALUES (:type,:favcolor,:delay,:price,:description,:creator)");
        $this->db->bind(":type", $data["type"]);
        $this->db->bind(":favcolor", $data["favcolor"]);
        $this->db->bind(":delay", $data["delay"]);
        $this->db->bind(":price", $data["price"]);
        $this->db->bind(":description", $data["description"]);
        $this->db->bind(":creator", $data["creator"]);
        // $this->db->execute();
        return $this->db->execute();
    }

    public function getjobs()
    {
        $this->db->query("SELECT * FROM jobs WHERE creator = :id");
        $this->db->bind(':id', $_SESSION['id']);
        $jobs = $this->db->fetchAll();
        return $jobs;
    }
    public function getJobById($id){
        $this->db->query("SELECT * FROM jobs WHERE id = :id");
        $this->db->bind(':id', $id);
        $job = $this->db->fetchAll();
        return $job;
    }
    public function getAlljobs()
    {
        $this->db->query("SELECT * from jobs where id not in (
                                    select job 
                                    from requests 
                                    )");
        $jobs = $this->db->fetchAll();
        return $jobs;
    }
    public function addrequest($data){
        $this->db->query("SELECT requests FROM jobs WHERE id = :id" );
        $this->db->bind(':id', $data["id"]);
        $request = $this->db->fetch();
        $value = $request->requests +1;
        $this->db->query("UPDATE jobs SET requests = (:value)  WHERE id = :id ;
                                    INSERT INTO requests (job,designer) VALUES (:job,:designer) ");
        $this->db->bind(":value", $value);
        $this->db->bind(':id', $data["id"]);
        $this->db->bind(":job", $data["id"]);
        $this->db->bind(':designer', $_SESSION["id"]);
        return $this->db->execute();
    }


}