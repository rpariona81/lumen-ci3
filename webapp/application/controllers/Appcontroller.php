<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AppController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        // Load admin dashboard view
        echo "App Controller";
    }

}