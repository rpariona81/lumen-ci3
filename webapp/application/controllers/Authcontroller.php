<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //echo "Auth Controller";
        //$this->load->view('auth/login');
        if ($this->session->userdata('isLogged')) {
            redirect('/' . $this->session->userdata('User_guard'));
        } else {
            $this->load->view('auth/login');
        }
    }

    public function logon()
    {
        //echo "Logon function called";
        $usernameForm = $this->input->post('username', true);
        $passwordForm = $this->input->post('password', true);
        //print_r($username);
        $this->load->library('LoginLib');
        $util = new loginLib();
        $checkUser = $util->login($usernameForm, $passwordForm);
        if ($checkUser) {
            redirect('/' . $this->session->userdata('User_guard'));
        } else {
            // Display error message
            $this->session->set_flashdata('flashError', 'Error de usuario y/o contraseña o usuario desactivado.');
            redirect('/login');
        }
    }

    public function logout()
    {
        //echo "Logout function called";
        $this->session->unset_userdata('user_id');
        $this->load->driver('cache');
        $this->cache->clean();
        $this->session->set_userdata(array('user_id' => '', 'isLogged' => FALSE));
        session_destroy();
        $this->session->sess_destroy();
        redirect('/login');
    }
}
