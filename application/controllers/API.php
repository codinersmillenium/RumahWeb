<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {
	 
    function __construct() {
        parent::__construct();
        $this->load->library("curl");
    }
    
	 function index(){
    	$response=json_decode($this->curl->get_all_user('https://reqres.in/api/users?page=2'),true);
        $data['parseData'] = $response['data'];
        // var_dump($response);
        $this->load->view('tes',$data);
    }


    public function get(){
		$search = $_GET['search'];
		$response=$this->curl->get_data('https://reqres.in/api/users/'.$search);
		print_r($response);
    }
	public function Api_regist(){
		if(isset($_POST['regist'])){
				$email = $this->input->post('email');
				$pass = $this->input->post('password');
				$insert = $this->curl->account('https://reqres.in/api/register',$email,$pass);
				if (isset($insert)) {
					echo "<script>alert('Registration Success')</script>";
				}else{
					echo "<script>alert('Gagal')</script>";
				}
		}	
		
	}

	public function Add_user(){
		if(isset($_POST['submit_add'])){
				$name = $this->input->post('name');
				$job = $this->input->post('job');
				$insert = $this->curl->add_users('https://reqres.in//api/users',$name,$job,'POST');
				if (isset($insert)) {
					echo "<script>alert('Add User Success')</script>";
				}else{
					echo "<script>alert('Gagal')</script>";
				}
			
		}	
		
	}
	public function Update_user(){
		if(isset($_POST['submit_update'])){
				$name = $this->input->post('name');
				$id = $this->input->post('id');
				$job = $this->input->post('job');
				$insert = $this->curl->add_users('https://reqres.in//api/users/'.$id.'',$name,$job,'PUT');
				if (isset($insert)) {
					echo "<script>alert('Add User Success')</script>";
				}else{
					echo "<script>alert('Gagal')</script>";
				}
			
		}
	}
	public function Delete_user(){
		if(isset($_GET['delete'])){
				$id = $this->input->get('delete');
				$insert = $this->curl->delete('https://reqres.in//api/users/'.$id.'');
				if (isset($insert)) {
					echo "<script>alert('Delete User Success');window.location.href='".base_url('Dashboard/index?pages=delete_user')."'</script>";
				}else{
					echo "<script>alert('Gagal')</script>";
				}
			
		}		
		
	}
}
