<?php
class Pages extends controller
{
    public function __construct()
    {
        $this->userModel = $this->model('user');
        $this->jobModel = $this->model('job');
        $this->adminModel = $this->model('admin');
        $this->moneyModel = $this->model('money');
    }
    public function index()
    {
       $this-> view('pages/home');
    }
    public function login()
    {
        $this-> view('pages/login');
    }
    public function signup()
    {
        $this-> view('pages/signup');
    }
    public function asClient()
    {
        $this-> view('pages/asclient');
    }
    public function asdesigner()
    {
        $this-> view('pages/asFreelancer');
    }
    public function hello_Client(){
        $this-> view('client/hello');
    }
    public function client_dashboard(){
        $jobs = $this->jobModel->getjobs();
        $rendu = $this->jobModel->getrendus();
            $data = [
                 'jobs' => $jobs,
                 'rendu' => $rendu,
            ];
        $this->view('client/dashboard', $data);
    }
    public function client_profile(){
        $user = $this->userModel->getUserById();
        $job_complete = $this->jobModel->getCompletedJobs();
        if($user){
            $data = [
                 'user' => $user,
                 'job_complete' => $job_complete,
            ];
        $this-> view('client/profile' , $data);
        }
    }
    public function details($id){
        $job = $this->jobModel->getJobById($id);
        if($job){
            $data = [
                 'job' => $job
            ];
        $this-> view('client/details' , $data);
        }
    }
    public function new_job(){
        $this-> view('client/newjob');
    }
    public function job_create(){

        $data = [
            "type" => $_POST["type"],
            "favcolor" => $_POST["favcolor"],
            "delay" => $_POST["delay"],
            "price" => $_POST["price"],
            "description" => $_POST["description"],
        ];
        $this-> view('client/jobinfo' , $data);
    }
    public function requests($id){
        $request = $this->jobModel->getRequestsById($id);
            $data = [
                 'request' => $request
            ];
        $this-> view('client/requests' , $data);
    }
    public function deposit(){
        $request = $this->moneyModel->for_money_page();
        $data = [
            'request' => $request
       ];   
        $this-> view('client/deposit', $data);
    }
    public function asFreelancer(){
        $this-> view('designer/hello');
    }
    public function test(){
        $test = $this->adminModel->getRandomTest();
        $data = [
            'test' => $test
        ];
        $this-> view('designer/test', $data);
    }
    public function thank(){
        $this-> view('designer/thank_you');
    }
    public function designer_profile(){
        $user = $this->userModel->getUserById();
        $job_complete = $this->jobModel->getCompletedJobs();
            $data = [
                 'user' => $user,
                 'job_complete' => $job_complete,
            ];
        $this-> view('designer/profile' , $data);
    }
    public function designer_dashboard(){
        $requests = $this->jobModel->getrequests();
        $jobs = $this->jobModel->getAlljobs();
        $accepted = $this->jobModel->getAllAccept();
        
            $data = [
                 'jobs' => $jobs,
                 'requests' => $requests,
                 'accepted' => $accepted,
            ];    
            // var_dump($data["requests"]);
            // die();
                $this-> view('designer/dashboard' ,$data);
            
    }
    public function withdraw(){
        $wallet = $this->moneyModel->for_money_page();
        $data = [
            'wallet' => $wallet,
       ];   
        $this-> view('designer/withdraw',$data);
    }
    public function request_job($id){
        $job = $this->jobModel->getJobById($id);
        $exist = $this->jobModel->ifExist($id);
            $data = [
                 'job' => $job,
                 "exist" => $exist,
            ];
            // echo $exist;
        $this-> view('designer/request' , $data);
    }
    public function details_job($id){
        $job = $this->jobModel->getJobById($id);
            $data = [
                 'job' => $job
            ];
            // var_dump($data["job"]);
        $this-> view('designer/details' , $data);

    }
    public function review(){
        $this-> view('designer/review');
    }
    public function submit_rendu($id){
        $job = $this->jobModel->getJobById($id);
        if($job){
            $data = [
                 'job' => $job
            ];
        $this-> view('designer/rendu', $data);
        }
    }
    public function accepted(){
        $this-> view('designer/accepted');
    }
    public function rejected(){
        $this-> view('designer/rejected');
    }
    public function googleapi(){
        $this-> view('pages/googleapi');
    }
    public function page404(){
        $this-> view('pages/404');
    }
    









    public function adminHome(){
        $jobs = $this->jobModel->jobsForAdmin();
        $users = $this->jobModel->usersForAdmin();
        $rendu = $this->adminModel->rendredForAdmin();
        $data = [
            'jobs' => $jobs,
            'users' => $users,
            'rendu' => $rendu,
       ];    
        $this-> view('admin/home' ,$data);
    }
    

}
