<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('welcome_message');
		$data = array();
		$this->load->model('Role_model');
		$this->load->model('User_model');

		
		$users = $this->User_model::all();
		$data['users'] = $users;
		print_r(json_encode($data['users']));
		

		/*
		$user = $this->User_model::findOrFail(1);
		if ($user->hasRole('user')) {
			echo "El usuario es administrador";
		} else {
			echo "El usuario no es administrador";
		}
			*/
	}
}
