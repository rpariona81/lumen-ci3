<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLib
{

    private $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('User_model');
        $this->ci->load->model('Role_model');
        $this->ci->load->model('Client_model');
    }

    public function login($username, $password)
    {
        $user = $this->ci->User_model->where('username', $username)->first();

        if ($user->enabled && password_verify($password, $user->password)) {
            // Login successful
            return $user;
        } else {
            // Login failed
            return null;
        }
    }

}