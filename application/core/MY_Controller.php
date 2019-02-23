<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

class Admin_Controller extends MY_Controller
{
	public $permission = array();

    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_users');

        $current_user_data = $this->model_users->getUserData($this->session->userdata('id'));

        $group_data = array();
        if (empty($this->session->userdata('logged_in')) || ($current_user_data == false)) {
            $session_data = array('logged_in' => false);
            $this->session->set_userdata($session_data);
        } else {
            
        }
    }

    public function logged_in()
    {
        $session_data = $this->session->userdata();
        if ($session_data['logged_in'] == true) {
            redirect('dashboard', 'refresh');
        }
    }

    public function not_logged_in()
    {
        $session_data = $this->session->userdata();
        $current_user_data = $this->model_users->getUserData($this->session->userdata('id'));
        if ($session_data['logged_in'] == false || ($current_user_data == false)) {
            redirect('auth/login', 'refresh');
        }
    }

    public function render_template($page = null, $data = array())
    {

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_menu', $data);
        $this->load->view('templates/side_menubar', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer', $data);
    }

    
}
