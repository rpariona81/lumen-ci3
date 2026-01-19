<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Builder;

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

	protected $search_text;

	public function index()
	{
		//$this->load->view('welcome_message');
		$data = array();

		$this->load->model('Client_model');
		$this->load->model('Role_model');
		$this->load->model('User_model');
		$this->load->model('Ebook_model');
		$this->load->model('Repository_model');

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


		/*
		$user = $this->User_model::findOrFail(1);
		if ($user->hasRole('user')) {
			//echo "El usuario es administrador";
			//print_r(json_encode($user->with('client')->get()));
			//print_r(json_encode($user));
			print_r(json_encode($user['client_id'].' - '.$user->client->client_name));
		} else {
			echo "El usuario no es administrador";
			//print_r(json_encode($user));
		}
		*/

		/*
		$books = $this->Ebook_model::with('clients')->where('id',1)->get();
		$data['ebooks'] = $books;
		print_r(json_encode($data['ebooks']));
		*/

		$search_text = 'GUIA';

		/*
		$query = $this->Ebook_model::whereHas('clients', function ($q) {
			$q->where('client_id', 1)
			  ->orWhere('ebook_details', 'LIKE', '%'. $this->search_text .'%')
			  ->orWhere('ebook_title', 'LIKE', '%'. $this->search_text .'%')
			  ->orWhere('ebook_display', 'LIKE', '%'. $this->search_text .'%');
		})->get();
		$data['ebooks_client'] = $query;
		print_r(json_encode($data['ebooks_client']));
		*/

		/*
		$results = $this->Ebook_model::where('ebook_title', 'LIKE', '%' . $search_text . '%')
			->orWhere('ebook_author', 'LIKE', '%' . $search_text . '%')
			->orWhere('ebook_editorial', 'LIKE', '%' . $search_text . '%')
			->orWhere('ebook_tags', 'LIKE', '%' . $search_text . '%')
			->orWhere('ebook_display', 'LIKE', '%' . $search_text . '%')
			->whereHas('clients', function ($q) {
				$q->where('client_id', 1)
					->where('authorized', 1);
			})->get();
		$data['ebooks_client'] = $results->count();
		print_r(json_encode($data['ebooks_client']));
		*/

		/** ver cantidad filtrada */
		//$datos = $this->Ebook_model::with('clients')->where('clients[0]->id', 1)->get();
		//$i = 1;
		
		//$datos = $this->Ebook_model::();
		/*foreach ($datos as $client) {
			echo "ebook " . $client->ebook_title;
			//echo "client " . $client->clients[$i]->client_name;
			//$i = $i++;
		}*/
		//print_r(json_encode($datos));
		/*$datos1 = DB::table('t_ebooks')
						->select('id','ebook_code','ebook_isbn')
						->where('id', 'IN', '(select ebook_id from t_client_ebook where client_id=1)')
						->get();*/
						/*->leftjoin('t_clients','t_client_ebook.client_id','=','t_clients.id')
						->leftJoin('t_ebooks','t_client_ebook.ebook_id','=','t_ebooks.id')
						->where('t_client_ebook.client_id','=',1)
						->get();*/
		//$cant_datos = $this->Ebook_model::getCantSearchEbooks($search_text, 1);
		$client_id = '1';
		/*$datos1 = $this->Ebook_model::whereIn('id', function ($query) use ($client_id){
			$query->select('ebook_id')
					->from('t_client_ebook')
					->where('client_id','=',$client_id);
		})->select('id','ebook_code','ebook_isbn')->get();
		print_r(json_encode($datos1));*/

		$datos2 = $this->Repository_model::where('client_id','=', $client_id)->get();
		print_r(json_encode($datos2));
		//print_r($datos1->count());
		/* filtro de libros
		$datos = $this->Ebook_model::getPaginateSearchBooks(4, 2, $search_text, 1);
		$data['ebooks_client'] = $datos;
		print_r(json_encode($data['ebooks_client']));
		*/
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
