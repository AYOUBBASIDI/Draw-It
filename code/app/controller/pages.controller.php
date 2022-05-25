<?php
class Pages extends controller
{
    public function __construct()
    {
    }
    public function index()
    {
       $this-> view('pages/home');
    }
    public function login()
    {
        // echo("hello");
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
    public function hello_Client(){
        $this-> view('client/hello');
    }
    public function client_dashboard(){
        $this-> view('client/dashboard');
    }
    public function client_profile(){
        $this-> view('client/profile');
    }
    public function details(){
        $this-> view('client/details');
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
    public function requests(){
        $this-> view('client/requests');
    }
    public function deposit(){
        $this-> view('client/deposit');
    }
    public function asFreelancer(){
        $this-> view('designer/hello');
    }
    public function test(){
        $this-> view('designer/test');
    }
    public function thank(){
        $this-> view('designer/thank_you');
    }
    public function designer_profile(){
        $this-> view('designer/profile');
    }
    public function designer_dashboard(){
        $this-> view('designer/dashboard');
    }
    public function withdraw(){
        $this-> view('designer/withdraw');
    }
    public function request_job(){
        $this-> view('designer/request');
    }
    public function details_job(){
        $this-> view('designer/details');
    }
    public function review(){
        $this-> view('designer/review');
    }
    public function submit_rendu(){
        $this-> view('designer/rendu');
    }

}
