<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB as DBuilder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;

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
		$datos1 = $this->Ebook_model::whereIn('id', function ($query) use ($client_id) {
			$query->select('ebook_id')
				->from('t_client_ebook')
				->where('client_id', '=', $client_id);
		})->select('id', 'ebook_code', 'ebook_isbn', 'ebook_isbn', 'ebook_title', 'ebook_alias', 'ebook_display')
			->get();
		//print_r(json_encode($datos1)); 

		$datos2 = $this->Repository_model::where('client_id', '=', $client_id)
			->select('id', 'repo_code as ebook_code', 'repo_isbn as ebook_isbn', 'repo_title as ebook_title', 'repo_alias as ebook_alias', 'repo_display as ebook_display')
			->get();
		/*->get();*/
		//$data = array_merge($datos1, $datos2);
		print_r(json_encode($datos1));

		//print_r(json_encode($datos2->count()));
		//print_r($datos1->count());
		//$todos_datos = array_merge($datos1, $datos2);
		//print_r(json_encode($todos_datos));
		/* filtro de libros
		$datos = $this->Ebook_model::getPaginateSearchBooks(4, 2, $search_text, 1);
		$data['ebooks_client'] = $datos;
		print_r(json_encode($data['ebooks_client']));
		*/
	}

	public function queries()
	{
		$this->load->model('Client_model');
		$this->load->model('Role_model');
		$this->load->model('User_model');
		$this->load->model('Ebook_model');
		$this->load->model('Repository_model');

		// First Query: Select columns from the 'payments' table
		/* $payments = $this->Ebook_model::whereIn('id', function ($query) use ($client_id) {
			$query->select('ebook_id','client_ebook_tags as ebook_tags')
				->from('t_client_ebook')
				->where('client_id', '=', $client_id);
		})->where(function ($query) use ($search_text) {
			$query->where('ebook_title', 'LIKE', '%' . $search_text . '%')
				->orWhere('ebook_author', 'LIKE', '%' . $search_text . '%')
				->orWhere('ebook_editorial', 'LIKE', '%' . $search_text . '%')
				->orWhere('ebook_tags', 'LIKE', '%' . $search_text . '%')
				->orWhere('ebook_display', 'LIKE', '%' . $search_text . '%');
		})->select(
            'id',
            'ebook_code',
            'ebook_isbn',
            'ebook_title',
            'ebook_alias',
            'ebook_display',
            'ebook_type',
            'ebook_author',
            'ebook_editorial',
            'ebook_year',
            'ebook_pages',
            'ebook_front_page',
            'ebook_url',
            'ebook_file',
            'catalog_id',
            'ebook_available',
            'ebook_format',
            'ebook_details',
            'ebook_categories',
            'ebook_tags')
            ->get(); */

		$client_id = 3;
		$search_text = 'sistema';
		/*$payments = $this->Ebook_model::with('clients')->whereIn('id',function ($query) use ($client_id) {
			$query->select('ebook_id')
				->from('t_client_ebook')
				->where('client_id', '=', $client_id);		//->where('client_id', '=', $client_id);
		})/*->where(function ($query) use ($search_text){
			$query->wherePivot('client_ebook_tags','LIKE','%'.$search_text.'%');
		})*/

		$payments = $this->Ebook_model::with('clients')->where('clients[0]->id',1)->get();

		//$payments = $this->Ebook_model::with('clients')->get();

		/*$payments = $this->Ebook_model::whereIn('id', function ($query) use ($client_id) {
			$query->select('ebook_id')
				->from('t_client_ebook')
				->where('client_id', '=', $client_id);		//->where('client_id', '=', $client_id);
		})->whereHas('clients', function ($query) use ($search_text) {
			$query->where('client_ebook_tags', 'LIKE', '%' . $search_text . '%');
		})->get();*/

		/*$payments = $this->Ebook_model::whereHas('clients', function ($query) use ($search_text) {
			$query//->where('client_ebook_tags', 'LIKE', '%' . $search_text . '%')
			->where('client_id','=',1);
		})->get();*/

		/*$payments = $this->Ebook_model::whereHas('clients', function ($query) use ($client_id){
			$query->where('client_id','=',$client_id);
		})->with('clients')->get();*/

		/*$payments = $this->Ebook_model::whereIn('id', function ($query) use ($client_id) {
			$query->select('ebook_id')
				->from('t_client_ebook')
				->where('client_id', '=', $client_id);
		})
			->where('ebook_title', 'LIKE', '%' . $search_text . '%')
			->orWhere('ebook_author', 'LIKE', '%' . $search_text . '%')
			->orWhere('ebook_editorial', 'LIKE', '%' . $search_text . '%')
			->orWhere('ebook_tags', 'LIKE', '%' . $search_text . '%')
			->orWhere('ebook_display', 'LIKE', '%' . $search_text . '%')
			->select('id', 'ebook_code', 'ebook_isbn', 'ebook_isbn', 'ebook_title', 'ebook_alias', 'ebook_display', 'ebook_tags')
			->get();
			*/

		print_r(json_encode($payments));

		// Second Query: Select matching columns from the 'expenses' table
		// Use DB::raw("'' as ...") to create empty columns to match the first query's structure
		/*$expenses = $this->Repository_model::where('client_id', '=', $client_id)
			->select('id', 'repo_code as ebook_code', 'repo_isbn as ebook_isbn', 'repo_title as ebook_title', 'repo_alias as ebook_alias', 'repo_display as ebook_display')
			->where('repo_title', 'LIKE', '%' . $search_text . '%')
			->orWhere('repo_author', 'LIKE', '%' . $search_text . '%')
			->orWhere('repo_editorial', 'LIKE', '%' . $search_text . '%')
			->orWhere('repo_tags', 'LIKE', '%' . $search_text . '%')
			->orWhere('repo_display', 'LIKE', '%' . $search_text . '%')
			->get();*/

		/* $expenses = $this->Repository_model::where(function ($query) use ($client_id) {
			$query->where('client_id', '=', $client_id);
		})->where(function ($query) use ($search_text) {
			$query->where('repo_title', 'LIKE', '%' . $search_text . '%')
				->orWhere('repo_author', 'LIKE', '%' . $search_text . '%')
				->orWhere('repo_editorial', 'LIKE', '%' . $search_text . '%')
				->orWhere('repo_tags', 'LIKE', '%' . $search_text . '%')
				->orWhere('repo_display', 'LIKE', '%' . $search_text . '%');
		})->select(
			'id', 
			'repo_code as ebook_code',
            'repo_isbn as ebook_isbn',
            'repo_title as ebook_title',
            'repo_alias as ebook_alias',
            'repo_display as ebook_display',
            'repo_type as ebook_type',
            'repo_author as ebook_author',
            'repo_editorial as ebook_editorial',
            'repo_year as ebook_year',
            'repo_pages as ebook_pages',
            'repo_front_page as ebook_front_page',
            'repo_url as ebook_url',
            'repo_file as ebook_file',
            'client_id as catalog_id',
            'repo_available as ebook_available',
            'repo_format as ebook_format',
            'repo_details as ebook_details',
            'repo_categories as ebook_categories',
            'repo_tags as ebook_tags',
			)
			->get();
 */
		//print_r(json_encode($expenses));

		//$collected  = $payments->merge($expenses);
		//$currentPage = LengthAwarePaginator::resolveCurrentPage();
		//$currentPage = 1;
		//$perPage = 3;
		//$currentPageItems = $collected->slice(($currentPage * $perPage) - $perPage, $perPage)->values();

		//print_r(json_encode($results->count()));
		//print_r(json_encode($currentPageItems));

		// Combine the two queries using unionAll()
		//$results = $payments->unionAll($expenses)
		//	->orderBy('date', 'desc') // You can order the combined results
		//	->get(); // Execute the combined query

		// $results is now a single collection containing all records from both tables

	}

	public function testLibrary()
	{
		$client_id = 1;
		$search_text = '';
		$this->load->library('LibraryLib');
		$util = new libraryLib();
		$data['total_row'] = $util->countEbooksFind($search_text, $client_id); //total row
		$data['records'] = $util->getEbooksPaginate(1, 6, $search_text, $client_id);
		print_r(json_encode($data));
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
