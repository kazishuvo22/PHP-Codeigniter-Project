<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('user_model');
        $this->load->library('session');

}


	public function index()
	{
		$this->load->view('user/homepage');
	}
	public function registration()
	{
		$this->load->view('user/registration');
	}
	public function login()
	{
		$this->load->view('user/login');
	}
	public function re_student()
	{
		$this->load->view('user/re_student');
	}
	public function re_teacher()
	{
		$this->load->view('user/re_teacher');
	}
	public function profile()
	{
		$this->load->view('user/profile');
	}
	public function register_user(){

      $user=array(
      'uname'=>$this->input->post('uname'),
      'name' =>$this->input->post('name'),
      'email'=>$this->input->post('email'),
      'md5_pw'=>md5($this->input->post('md5_pw')),
      'valid'=>md5($this->input->post('valid')),
      'cdate'=>$this->input->post('cdate')
        );
        
        print_r("successfully created. Please Login");
       	redirect('users/profile');

		$email_check=$this->user_model->email_check($user['email']);

		if($email_check){
		  $this->user_model->register_user($user);
		  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
		  //redirect('user/login_view');

		}
		else{

		  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
		  
		  redirect('Users/registration');
		}
	}
	public function register_user2(){

      $userdetail=array(
      'uname'=>$this->input->post('uname'),
      'name' =>$this->input->post('name'),
      'bdate'=>$this->input->post('bdate'),
      'gender'=>$this->input->post('gender'),
      'address'=>$this->input->post('address'),
      'district'=>$this->input->post('district')
        );
        
        print_r("successfully Updated");
   
	}
}
