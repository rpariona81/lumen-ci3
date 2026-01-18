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
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->index();
            //redirect('/login');
            return;
        } else {
            $emailForm = $this->input->post('email', true);
            $passwordForm = $this->input->post('password', true);
            //print_r($username);
            $this->load->library('LoginLib');
            $util = new loginLib();
            $checkUser = $util->login($emailForm, $passwordForm);
            if ($checkUser) {
                redirect('/' . $this->session->userdata('User_guard'));
            } else {
                // Display error message
                //$this->session->set_flashdata('flashError', 'Error de usuario y/o contraseña o usuario desactivado.');
                redirect('/login');
            }
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

    public function register()
    {
        if ($this->session->userdata('isLogged')) {
            redirect('/' . $this->session->userdata('User_guard'));
        } else {
            $this->load->view('auth/register');
        }
    }

    public function registration()
    {
        /* if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } */

        //echo "Procces register function called";
        $this->form_validation->set_rules('firstname', 'Nombres', 'required|trim|min_length[2]');
        $this->form_validation->set_rules('lastname', 'Apellidos', 'required|trim|min_length[2]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('confirmpassword', 'Confirmar contraseña', 'required|trim|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->register();
            //redirect('/register');
            return;
        } else {
            $firstnameForm = $this->input->post('firstname', true);
            $lastnameForm = $this->input->post('lastname', true);
            $emailForm = $this->input->post('email', true);
            $passwordForm = $this->input->post('password', true);
            //print_r($username);
            $this->load->library('RegisterLib');
            $util = new registerLib();
            $checkRegister = $util->register($firstnameForm, $lastnameForm, $emailForm, $passwordForm);
            if ($checkRegister) {
                redirect('/login');
            } else {
                // Display error message
                //$this->session->set_flashdata('Verifique.');
                $this->register();
                //redirect('/register');
            }
        }
    }
}
