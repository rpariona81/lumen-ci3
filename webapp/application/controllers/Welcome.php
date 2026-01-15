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
		$this->load->model('Client_model');
		$this->load->model('Role_model');
		$this->load->model('User_model');

		/* 
		$users = $this->User_model::all();
		$data['users'] = $users;
		print_r(json_encode($data['users']));
		 */

		/*
		$clients = $this->Client_model::with('users')->get();
		$data['clients'] = $clients;
		print_r(json_encode($data['clients']));
		*/

		/* 
		$roles = $this->Role_model::all();
		$data['roles'] = $roles;
		print_r(json_encode($data['roles']));
		 */

		
		$user = $this->User_model::findOrFail(1);
		if ($user->hasRole('user')) {
			//echo "El usuario es administrador";
			//print_r(json_encode($user->with('client')->get()));
			print_r(json_encode($user));
		} else {
			echo "El usuario no es administrador";
			//print_r(json_encode($user));
		}
		
	}

	public function testlogin()
	{
		//session_destroy();
		$usernameForm = 'user';
		$passwordForm = '123456';

		$this->load->library('LoginLib');
		//$this->load->library('session');
		$userLogged = $this->loginlib->login($usernameForm, $passwordForm);
		if ($userLogged) {
			//print_r(json_encode($user));
			/*$session_id = session_id();
			$session_opened = 
			$newdata = array(
				'User'	=> $user['username'],
				'Role'	=> $user['roles'][0]->roledisplay,
				'Client'	=> $user['client']->client_name,
				'is_logged_in'	=> true
			);
			$this->session->set_userdata($newdata);
			//$this->session->set
			print_r(json_encode($this->session->all_userdata()));
			*/
			//echo "Login successful";
			print_r(json_encode($this->session->all_userdata()));
		} else {
			echo "Login failed";
		}
	}

	public function testlogin1()
	{
		//session_destroy();
		$usernameForm = 'graduated';
		$passwordForm = '123456';

		$this->load->library('LoginLib');
		//$this->load->library('session');
		$userLogged1 = $this->loginlib->login($usernameForm, $passwordForm);
		if ($userLogged1) {
			//echo "Login successful";
			print_r(json_encode($this->session->all_userdata()));
		} else {
			echo "Login failed";
		}
	}

	public function testlogin2()
	{
		//session_destroy();
		$usernameForm = 'student';
		$passwordForm = '123456';

		$this->load->library('LoginLib');
		//$this->load->library('session');
		$userLogged2 = $this->loginlib->login($usernameForm, $passwordForm);
		if ($userLogged2) {
			//echo "Login successful";
			print_r(json_encode($this->session->all_userdata()));
		} else {
			echo "Login failed";
		}
	}

	public function testlogin3()
	{
		//session_destroy();
		$usernameForm = 'guest';
		$passwordForm = '123456';

		$this->load->library('LoginLib');
		//$this->load->library('session');
		$userLogged3 = $this->loginlib->login($usernameForm, $passwordForm);
		if ($userLogged3) {
			//echo "Login successful";
			print_r(json_encode($this->session->all_userdata()));
		} else {
			echo "Login failed";
		}
	}
}
