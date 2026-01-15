<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends MY_Controller
{
    public function index()
    {
        $this->data = array();
        $this->load->model('Client_model');
        $this->load->model('Role_model');
        $this->load->model('User_model');
        $user = $this->User_model::findOrFail(1);
        if ($user->hasRole('user')) {
            //echo "El usuario es administrador";
            //print_r(json_encode($user->with('client')->get()));
            print_r(json_encode($user));
        } else {
            echo "El usuario no es administrador";
        }
    }
}