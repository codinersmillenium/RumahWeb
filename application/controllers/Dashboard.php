<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	  
	 function __construct(){
        parent::__construct();
        //load libary pagination        
        $this->load->library('curl');
    }
	public function index()
	{
		
		$data['token']=$this->session->flashdata('login');
		$data['judul']="Dashboard";
		if (isset($_GET['pages'])) {
		if ($_GET['pages']!="") {
		$pages = $_GET['pages'];
		if ($pages=="delete_user") {
		$response=json_decode($this->curl->get_data('https://reqres.in/api/users?per_page=8&delay=3'),true);
		}
		else{
		$response=json_decode($this->curl->get_data('https://reqres.in/api/users?per_page=8&page='.$pages.''),true);
		}}
		else if (isset($_POST['pages'])) {
		$pages_user = $_POST['search'];
		$response=json_decode($this->curl->get_data('https://reqres.in/api/users/'.$pages_user.''),true);
		}
		}else{
			if (isset($_GET['search'])) {
		$search = $_GET['search'];
		$response=$this->curl->get_data('https://reqres.in/api/users/'.$search);
			}else{
		$response=json_decode($this->curl->get_data('https://reqres.in/api/users?per_page=8'),true);
	}
		}
        $data['parseData'] = $response['data'];
        $data['total_pages'] = $response['total_pages'];
        $this->load->view('Dashboard/index',$data);
        $this->load->view('Dashboard/partials/modal_komponen',$data);
	}
	public function register(){
			$this->load->view('form_register');
	}
}
