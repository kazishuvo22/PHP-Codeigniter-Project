<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('User_model');
        $this->load->library('session');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->load->library('user_agent');


}



	public function index()
	{

		$data['page_title'] = "Homepage";
        $this->load->view('_Layout/home/header.php', $data); // Header File
        $this->load->view("user/homepage");
        $this->load->view('_Layout/home/footer.php'); // Footer File
	}
    /**
     * User Login
     */
	public function login()
	{
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title'] = "User Login";
            $this->load->view('_Layout/home/header.php', $data); // Header File
            $this->load->view("user/login");
            $this->load->view('_Layout/home/footer.php'); // Footer File
        }
        else
        {
            $login_data = array(
                'email' => $this->input->post('email', TRUE),
                'password' => $this->input->post('password', TRUE),
            );

            /**
             * Load User Model
             */
            $this->load->model('User_model', 'UserModel');
            $result = $this->UserModel->check_login($login_data);

            if (!empty($result['status']) && $result['status'] === TRUE) {

                /**
                 * Create Session
                 * -----------------
                 * First Load Session Library
                 */
                $session_array = array(
                    'USER_ID'  => $result['data']->id,
                    'USER_NAME'  => $result['data']->name,
                    'USERNAME'  => $result['data']->uname,
                    'USER_EMAIL' => $result['data']->email,
                    'IS_ACTIVE'  => $result['data']->valid,
                    'Designation' => $result['data2']->designation,
                );
                
                $this->session->set_userdata($session_array);

                /*Here session data saved to the database //user_session*/
                $user_session = array(
                'user_id' => $result['data']->id,
                'session_id'=>session_id(),
                'ipaddress'=> $_SERVER['REMOTE_ADDR'],
                'browser'=>$agent = $this->agent->browser().' '.$this->agent->version(),
                'os'=>$agent = $this->agent->platform(),

                );
                $this->session->set_userdata($user_session);
                $this->load->model('User_model', 'UserModel');
                $result = $this->UserModel->session_insert($user_session);

                //Login message
                $this->session->set_flashdata('success_flashData', 'Login Success');
                redirect('Users/panel');

            } else {

                $this->session->set_flashdata('error_flashData', 'Invalid Email/Password.');
                redirect('Users/login');
            }
        }
    }
    public function registration()
	{

		$data['page_title'] = "User Registration";
        $this->load->view('_Layout/home/header.php', $data); // Header File
        $this->load->view("user/registration");
        $this->load->view('_Layout/home/footer.php'); // Footer File
	}
    /**
     * User Registration for Student
     */
	public function re_student()
	{
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.name]', [
            'is_unique' => 'The %s already exists. Please use a different username',
        ]); // Unique Field

        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[user.email]', [
            'is_unique' => 'The %s already exists. Please use a different email',
        ]); // // Unique Field

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('valid', 'valid yes or no', 'required');
        $this->form_validation->set_rules('cdate', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title'] = "User Registration";
            $this->load->view('_Layout/home/header.php', $data); // Header File
            $this->load->view("user/re_student");
            $this->load->view('_Layout/home/footer.php'); // Footer File
        }
        else
        {   
            $insert_data = array(
                'name' => $this->input->post('full_name', TRUE),
                'uname' => $this->input->post('username', TRUE),
                'email' => $this->input->post('email', TRUE),
                'valid' => $this->input->post('valid', TRUE),
                'md5_pw' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
                'cdate' => $this->input->post('cdate', TRUE));
             $insert_data2 = array(
                'uname' => $this->input->post('username', TRUE),
                'email' => $this->input->post('email', TRUE),
                'designation'=>"Student",
                'gender' => $this->input->post('gender', TRUE),
                );
                

            /**
             * Load User Model
             */
            $this->load->model('User_model', 'UserModel');
            $result = $this->UserModel->insert_user($insert_data);
            $result2 = $this->UserModel->insert_user2($insert_data2);

            if ($result && $result2 == TRUE) {

                $this->session->set_flashdata('success_flashData', 'You have registered successfully.');
               redirect('Users/login');

            } else {

                $this->session->set_flashdata('error_flashData', 'Invalid Registration.');
                redirect('Users/registration');

            }
        }
	}
	/**
     * User Registration for Teacher
     */
	public function re_teacher()
	{
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.name]', [
            'is_unique' => 'The %s already exists. Please use a different username',
        ]); // Unique Field

        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[user.email]', [
            'is_unique' => 'The %s already exists. Please use a different email',
        ]); // // Unique Field

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('valid', 'valid yes or no', 'required');
        $this->form_validation->set_rules('cdate', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title'] = "User Registration";
            $this->load->view('_Layout/home/header.php', $data); // Header File
            $this->load->view("user/re_teacher");
            $this->load->view('_Layout/home/footer.php'); // Footer File
        }
        else
        {   
            $insert_data = array(
                'name' => $this->input->post('full_name', TRUE),
                'uname' => $this->input->post('username', TRUE),
                'email' => $this->input->post('email', TRUE),
                'valid' => $this->input->post('valid', TRUE),
                'md5_pw' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
                'cdate' => $this->input->post('cdate', TRUE));
            $insert_data2 = array(
                'name' => $this->input->post('full_name', TRUE),
            	'uname' => $this->input->post('username', TRUE),
                'email' => $this->input->post('email', TRUE),
                'address' => $this->input->post('address', TRUE),
                'designation' => $this->input->post('designation', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'district' => $this->input->post('district', TRUE),
                'gender' => $this->input->post('gender', TRUE),
            );
                

            /**
             * Load User Model
             */
            $this->load->model('User_model', 'UserModel');
            $result = $this->UserModel->insert_user($insert_data);
            $result2 = $this->UserModel->insert_user2($insert_data2);

            if ($result && $result2 == TRUE) {

                $this->session->set_flashdata('success_flashData', 'You have registered successfully.');
                echo "successfully inserted";
                redirect('Users/login');

            } else {

                $this->session->set_flashdata('error_flashData', 'Invalid Registration.');
                redirect('Users/registration');

            }
        }
	}
	/**
     * Update teacher profile
     */
	public function profile()
	{

        if (empty($this->session->userdata('id'))) {
           // redirect('user/login');
        }

        $data['page_title'] = "Welcome to User Panel";
        $this->load->view('_Layout/home/header.php', $data); // Header File
        $this->load->view("user/profile");
        $this->load->view('_Layout/home/footer.php'); // Footer File

        
    }
	 /**
     * User Panel
     */
    public function panel() {

        if (empty($this->session->userdata('email'))) {
            //redirect('users/login');
        }

        $data['page_title'] = "Welcome to User Panel";
        $this->load->view('_Layout/home/header.php', $data); // Header File
        $this->load->view("user/panel");
        $this->load->view('_Layout/home/footer.php'); // Footer File
    }
    /**
     * User Logout
     */
    public function logout() {

        /**
         * Remove Session Data
         */
        $remove_sessions = array('USER_ID', 'USERNAME','USER_EMAIL','IS_ACTIVE', 'USER_NAME');
        $this->session->unset_userdata($remove_sessions);

        redirect('Users/index');
    }
    public function test()
    {
        $data['page_title'] = "Test Page";
        $this->load->view('_Layout/home/header.php', $data); // Header File
        $this->load->view("user/test");
        $this->load->view('_Layout/home/footer.php'); // Footer File


    }
	
}
