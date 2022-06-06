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
        $this->db->query("SELECT jobs.*,users.fname,users.lname from jobs INNER JOIN users on jobs.creator = users.id_user WHERE id_job = :id");
        $this->db->bind(':id', $id);
        $job = $this->db->fetchAll();
        return $job;
    }
    public function getRequestsById($id){
        $this->db->query("SELECT requests.*,jobs.price,jobs.id_job,users.fname,users.lname,users.id_user from requests INNER JOIN jobs on requests.job = jobs.id_job INNER JOIN users on requests.designer = users.id_user WHERE job = :id");
        $this->db->bind(':id', $id);
        $request = $this->db->fetchAll();
        return $request;
    }
    public function getAlljobs()
    {
        $this->db->query("SELECT jobs.id_job, jobs.type,jobs.favcolor,jobs.delay,jobs.price,jobs.description,users.fname,users.lname from jobs,users where jobs.id_job not in ( select job from requests where designer = :id) and jobs.creator=users.id_user ;");
        $this->db->bind(':id', $_SESSION["id"]);
        $jobs = $this->db->fetchAll();
        return $jobs;
    }
    public function getAllAccept(){
        $this->db->query("SELECT accepted.*,jobs.id_job, jobs.type,jobs.favcolor,jobs.delay,jobs.price,jobs.description,users.fname,users.lname from accepted INNER JOIN jobs on accepted.job_accepted = jobs.id_job INNER JOIN users on jobs.creator = users.id_user WHERE designer_accepted = :id;");
        $this->db->bind(':id', $_SESSION["id"]);
        $accepted = $this->db->fetchAll();
        return $accepted;
    }
    public function getrequests()
    {
        $this->db->query("SELECT requests.*,jobs.type,jobs.delay,jobs.price,jobs.description,jobs.favcolor,users.fname,users.lname from requests INNER JOIN jobs on requests.job = jobs.id_job INNER JOIN users on jobs.creator = users.id_user WHERE designer = :id");
        $this->db->bind(':id', $_SESSION['id']);
        $requests = $this->db->fetchAll();
        return $requests;
    }
    public function addrequest($data){
        $this->db->query("SELECT requests FROM jobs WHERE id_job = :id" );
        $this->db->bind(':id', $data["id"]);
        $request = $this->db->fetch();
        $value = $request->requests +1;
        $this->db->query("UPDATE jobs SET requests = (:value)  WHERE id_job = :id ;
                                    INSERT INTO requests (job,designer) VALUES (:job,:designer) ");
        $this->db->bind(":value", $value);
        $this->db->bind(':id', $data["id"]);
        $this->db->bind(":job", $data["id"]);
        $this->db->bind(':designer', $_SESSION["id"]);
        return $this->db->execute();
    }

    public function acceptJob($data){
        $this->db->query("SELECT wallet FROM users WHERE id_user = :id" );
        $this->db->bind(':id', $_SESSION["id"]);
        $request = $this->db->fetch();
        if ($request->wallet < $data["price"]){
            $result = "err";
            return $result;
        }else{
            $this->db->query("INSERT INTO accepted (job_accepted,designer_accepted) VALUES (:job,:designer);
                                        UPDATE jobs SET requests = requests - 1 WHERE id_job = :job ;
                                        DELETE FROM requests WHERE id = :request ;
                                        UPDATE users SET wallet = wallet - :price WHERE id_user = :client ;
                                        INSERT INTO wallet_admin (price,receiver,recipient,forjob) VALUES (:price,:designer,:client,:job);
                                        ;");
            $this->db->bind(':job', $data["job_accepted"]);
            $this->db->bind(":designer", $data["user_accepted"]);
            $this->db->bind(":client", $_SESSION["id"]);
            $this->db->bind(":request", $data["request"]);
            $this->db->bind(":price", $data["price"]);
            return $this->db->execute();

        }
        // $this->db->query("SELECT requests FROM jobs WHERE id_job = :id" );
        // $this->db->bind(':id', $data["job_accepted"]);
        // $request = $this->db->fetch();
        // $value = $request->requests - 1 ;
        // $this->db->query("INSERT INTO accepted (job_accepted,designer_accepted) VALUES (:job,:designer);
        //                             UPDATE jobs SET requests = (:value)  WHERE id_job = :job ;
        //                             DELETE FROM requests WHERE id = :request ");
        // $this->db->bind(':job', $data["job_accepted"]);
        // $this->db->bind(":value", $value);
        // $this->db->bind(":designer", $data["user_accepted"]);
        // $this->db->bind(":request", $data["request"]);
        // return $this->db->execute();
    }
    public function deleteRequest($data){
        $this->db->query("SELECT requests FROM jobs WHERE id_job = :id" );
        $this->db->bind(':id', $data["job"]);
        $request = $this->db->fetch();
        $value = $request->requests -1;

    }

    public function jobsForAdmin(){
        $this->db->query("SELECT * FROM jobs");
        $jobs = $this->db->fetchAll();
        return $jobs;
    }
    public function usersForAdmin(){
        $this->db->query("SELECT * FROM users");
        $users = $this->db->fetchAll();
        return $users;
    }
    public function new_rendu($data)
    {
        $this->db->query("INSERT INTO rendu_client (message_rendu,rendu_for,rendu_client,designer_rendu) VALUES (:message,:job_id,:rendu,:designer)");
        $this->db->bind(":message", $data["message"]);
        $this->db->bind(":job_id", $data["id_job"]);
        $this->db->bind(":rendu", $data["rendu"]);
        $this->db->bind(":designer", $_SESSION["id"]);
        return $this->db->execute();
    }
    public function getrendus()
    {
        $this->db->query("SELECT rendu_client.*,jobs.id_job,jobs.type,jobs.delay,jobs.price,jobs.description,jobs.favcolor,users.id_user,users.fname,users.lname from rendu_client INNER JOIN jobs on rendu_client.rendu_for = jobs.id_job INNER JOIN users on rendu_client.designer_rendu = users.id_user WHERE jobs.creator = :id;");
        $this->db->bind(":id", $_SESSION["id"]);
        $rendu = $this->db->fetchAll();
        return $rendu;
    } 

public function goodjob($data)
{ 
    $payer = $data["price"] * 0.8 ;

    $this->db->query("INSERT INTO completed_job (job_completed,designer_id,client_id) VALUES (:job_completed,:designer_id,:client_id);
                                UPDATE users SET wallet = wallet + :price ,  num_job_complet = num_job_complet + 1   WHERE id_user = :designer_id ;
                                UPDATE users SET  num_job_complet = num_job_complet + 1 WHERE id_user = :client_id;
                                UPDATE wallet_admin SET  price = price - :price  WHERE receiver = :designer_id AND recipient = :client_id AND forjob = :job_completed;
                                DELETE FROM accepted WHERE job_accepted = :job_completed AND designer_accepted = :designer_id");
    $this->db->bind(":job_completed", $data["id_job"]);
    $this->db->bind(":designer_id", $data["id_user"]);
    $this->db->bind(":price", $payer);
    $this->db->bind(":client_id", $_SESSION["id"]);
    return $this->db->execute();
}
public function getCompletedJobs()
{
    $this->db->query("SELECT completed_job.*,jobs.type,jobs.price from completed_job INNER JOIN jobs on completed_job.job_completed = jobs.id_job WHERE designer_id = :id or client_id = :id ");
    $this->db->bind(":id", $_SESSION["id"]);
    $job = $this->db->fetchAll();
    return $job;
}

}