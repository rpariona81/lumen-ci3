<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AppController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Role_model');
        $this->load->model('Client_model');
        $this->load->model('Repository_model');
        $this->load->model('Ebook_model');
        $this->load->model('Viewebook_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        // Load app view
        //echo "App Controller.<br/>Client info:<br/>";
        $data = [];
        $data['pagina_title'] = 'Catálogo de libros';
        $data['content'] = 'app/listCatalogosCardsPageIndex';
        $this->load->view('app/templateApp', $data);
    }

    public function view_cards($page = NULL)
    {
        // Load app view
        //echo "App Controller";
        $this->load->library('LibraryLib');
        $util = new libraryLib();
        $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
        //echo $client_id . '...';
        if (!isset($client_id)) {
            redirect(base_url() . 'login');
        } else {
            //echo "Client ID: ".$client_id;
            $search_text = is_string($this->input->post('search_key', true)) ? strip_tags(trim(strip_tags($this->input->post('search_key', true)))) : '';
            $total_row = $util->countEbooksFind($search_text, $client_id); //total row
            //echo "Total row: ".$total_row;
            $data = array();
            if ($total_row > 0) {
                $data['resultFlag'] = TRUE;
                $config['base_url'] = base_url() . '/user/catalog/';
                $data['total_row'] = $util->countEbooksFind($search_text, $client_id); //total row
                $config['total_rows'] = $total_row;
                $data['pagina_title'] = $this->uri->segment(2);
                $config['per_page'] = 9;  //show record per halaman
                $config['uri_segment'] = 3;
                $config['use_page_numbers'] = TRUE;

                $config['page_query_string'] = FALSE;
                $config['enable_query_strings'] = FALSE;

                $choice = $config['total_rows'] / $config['per_page'];
                //$config["num_links"] = floor($choice);
                $config['num_links'] = (fmod(floor($choice), 9) > 9) ? fmod(floor($choice), 9) : 9;

                // Membuat Style pagination untuk BootStrap v4
                $config['first_link']       = '<li class="page-item"><span class="page-link">Primero</span></li>';
                $config['last_link']        = '<li class="page-item"><span class="page-link">Último</span></li>';
                $config['next_link']        = 'Siguiente';
                $config['prev_link']        = 'Anterior';

                $config['full_tag_open']    = '<nav aria-label="..." class="ms-auto"><ul class="pagination pagination-light mb-0">';
                $config['full_tag_close']   = '</ul></nav>';

                $config['first_tag_open']   = '<li class="page-item"><span class="page-link border-0 font-weight-bold" href="javascript:;">';
                $config['first_tag_close'] = '</span></li>';
                $config['last_tag_open']   = '<li class="page-item"><span class="page-link border-0 font-weight-bold" href="javascript:;">';
                $config['last_tag_close'] = '</span></li>';

                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" aria-current="page">';
                $config['cur_tag_close']    = '</span></li>';

                $config['next_tag_open']    = '<li class="page-item"><span class="page-link" aria-hidden="true">';
                $config['next_tag_close']  = '</span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tag_close']  = '</span></li>';

                $this->pagination->initialize($config);
                $data['page'] = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1)  : 0;
                //echo "data['page']: ".$data['page']."perPage: ".$config['per_page'];
                $str_links = $this->pagination->create_links();
                $data['links'] = explode('&nbsp;', $str_links);
                //$results = $this->db->get('t_users', $config['per_page'], $this->uri->segment(4))->result_array();
                //$results = User_Eloquent::skip($this->uri->segment(4))->take($config['per_page'])->get();
                //$this->data['records'] = User_Eloquent::skip($this->data['page'])->take($config['per_page'])->get();
                //$data['records'] = BookEloquent::getEbooksPaginate($data['page'], $config['per_page']);
                //$data['records'] = $util->getEbooksPaginate($data['page'], $config['per_page'], $search_text, $client_id);
                $data['records'] = $util->getEbooksPaginate($data['page'], $config['per_page'], $search_text, $client_id);

                $data['pagination'] = $this->pagination->create_links();
                //$data['content'] = 'app/listCatalogosCardsPageAjax';
                //$this->load->view('app/templateApp', $data);
                //$this->load->view('app/listCatalogosCardsPageAjax', $data);
            } else {
                $data['total_row'] = $util->countEbooksFind($search_text, $client_id); //total row
                $data['resultFlag'] = FALSE;
                $data['resultVacio'] = 'No se encontraron libros en su búsqueda, intente con otra expresión.';
                //print_r($data);
            }
            $this->load->view('app/listCatalogosCardsPageAjax', $data);
            //$this->load->view('app/listCatalogosCardsPage', $data);
            //$this->load->view('app/pagination', $data);
        }
    }

    public function addViewEbook()
    {
        if ($this->input->is_ajax_request()) {
            $user_id = $this->session->userdata('Email') ? $this->User_model->where('email', $this->session->userdata('Email'))->first()->id : null;
            $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
            try {
                if (isset($user_id) && isset($client_id)) {
                    $data['user_id'] = $user_id;
                    $data['client_id'] = $client_id;
                    $data['ebook_id'] = $this->input->post('book_id', true);
                    $model = new Viewebook_model();
                    $model->fill($data);
                    $model->save($data);
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'No es posible registrar');
                redirect_back();
            }
        }
    }
}







    /* public function view_ebookcards($page = NULL)
    {
        // Load app view
        //echo "App Controller";
        $this->load->library('LibraryLib');
        $util = new libraryLib();
        $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
        //echo $client_id . '...';
        if (!isset($client_id)) {
            redirect(base_url() . 'login');
        } else {
            //echo "Client ID: ".$client_id;
            $search_text = is_string($this->input->post('search_key', true)) ? strip_tags(trim(strip_tags($this->input->post('search_key', true)))) : '';
            $total_row = $util->countEbooksFind($search_text, $client_id); //total row
            //echo "Total row: ".$total_row;
            $data = array();
            if ($total_row > 0) {
                $data['resultFlag'] = TRUE;
                $config['base_url'] = base_url() . '/user/ebooks/';
                $data['total_row'] = $util->countEbooksFind($search_text, $client_id); //total row
                $config['total_rows'] = $total_row;
                //echo "config['total_rows']: ".$config['total_rows']."| ";
                $data['pagina_title'] = $this->uri->segment(2);
                $config['per_page'] = 3;  //show record per halaman
                $config['uri_segment'] = 3;
                $config['use_page_numbers'] = TRUE;
                //echo "config[uri_segment]: ".$config['uri_segment']."| ";
                $config['page_query_string'] = FALSE;
                $config['enable_query_strings'] = FALSE;

                $choice = $config['total_rows'] / $config['per_page'];
                //echo "choice: ".$choice."   minimo entero: ".fmod(floor($choice),3)."/ ";
                //$config["num_links"] = floor($choice);
                $config['num_links'] = (fmod(floor($choice), 3) >= 3) ? fmod(floor($choice), 3) : 3;
                //echo "num_links: ".$config['num_links'];
                // Membuat Style pagination untuk BootStrap v4
                $config['first_link']       = '<li class="page-item"><span class="page-link">Primero</span></li>';
                $config['last_link']        = '<li class="page-item"><span class="page-link">Último</span></li>';
                $config['next_link']        = 'Siguiente';
                $config['prev_link']        = 'Anterior';

                $config['full_tag_open']    = '<nav aria-label="..." class="ms-auto"><ul class="pagination pagination-light mb-0">';
                $config['full_tag_close']   = '</ul></nav>';

                $config['first_tag_open']   = '<li class="page-item"><span class="page-link border-0 font-weight-bold" href="javascript:;">';
                $config['first_tag_close'] = '</span></li>';
                $config['last_tag_open']   = '<li class="page-item"><span class="page-link border-0 font-weight-bold" href="javascript:;">';
                $config['last_tag_close'] = '</span></li>';

                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" aria-current="page">';
                $config['cur_tag_close']    = '</span></li>';

                $config['next_tag_open']    = '<li class="page-item"><span class="page-link" aria-hidden="true">';
                $config['next_tag_close']  = '</span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tag_close']  = '</span></li>';

                $this->pagination->initialize($config);
                $data['page'] = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
                //echo "data['page']: ".$data['page']."perPage: ".$config['per_page'];
                $str_links = $this->pagination->create_links();
                $data['links'] = explode('&nbsp;', $str_links);
                //$results = $this->db->get('t_users', $config['per_page'], $this->uri->segment(4))->result_array();
                //$results = User_Eloquent::skip($this->uri->segment(4))->take($config['per_page'])->get();
                //$this->data['records'] = User_Eloquent::skip($this->data['page'])->take($config['per_page'])->get();
                //$data['records'] = BookEloquent::getEbooksPaginate($data['page'], $config['per_page']);
                $data['records'] = $util->getEbooksPaginate($data['page'], $config['per_page'], $search_text, $client_id);

                echo json_encode($data['records']);
                $data['pagination_links'] = $this->pagination->create_links();
                //$data['content'] = 'app/listCatalogosCardsPageAjax';
                //$this->load->view('app/templateApp', $data);
                //$this->load->view('app/listCatalogosCardsPageAjax', $data);
            } else {
                $data['total_row'] = $util->countEbooksFind($search_text, $client_id); //total row
                $data['resultFlag'] = FALSE;
                $data['resultVacio'] = 'No se encontraron libros en su búsqueda, intente con otra expresión.';
                //print_r($data);
            }
            //$this->load->view('app/listCatalogosCardsPageAjax', $data);
            //$this->load->view('app/listCatalogosCardsPage', $data);
            //$this->load->view('app/pagination', $data);
        }
    } */

    

    /*public function view_cards($page = NULL)
        {
        // Load app view
        //echo "App Controller";
        $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
        //echo $client_id . '...';
        if ($client_id == null) {
            redirect(base_url() . 'login');
        } else {
            //echo "Client ID: ".$client_id;
            $search_text = is_string($this->input->post('search_key', true)) ? strip_tags(trim(strip_tags($this->input->post('search_key', true)))) : '';
            $total_row = Ebook_model::getCantSearchEbooks($search_text, $client_id); //total row
            //print_r($total_row);
            $data = array();
            if ($total_row > 0) {
                $data['resultFlag'] = TRUE;
                $config['base_url'] = base_url() . '/user/catalog/';
                $data['total_row'] = Ebook_model::getCantSearchEbooks($search_text, $client_id); //total row
                $config['total_rows'] = $total_row;
                $data['pagina_title'] = $this->uri->segment(2);
                $config['per_page'] = 9;  //show record per halaman
                $config['uri_segment'] = 3;
                $config['use_page_numbers'] = TRUE;

                $config['page_query_string'] = FALSE;
                $config['enable_query_strings'] = FALSE;

                $choice = $config['total_rows'] / $config['per_page'];
                //$config["num_links"] = floor($choice);
                $config['num_links'] = (fmod(floor($choice), 9) > 9) ? fmod(floor($choice), 9) : 9;

                // Membuat Style pagination untuk BootStrap v4
                $config['first_link']       = '<li class="page-item"><span class="page-link">Primero</span></li>';
                $config['last_link']        = '<li class="page-item"><span class="page-link">Último</span></li>';
                $config['next_link']        = 'Siguiente';
                $config['prev_link']        = 'Anterior';

                $config['full_tag_open']    = '<nav aria-label="..." class="ms-auto"><ul class="pagination pagination-light mb-0">';
                $config['full_tag_close']   = '</ul></nav>';

                $config['first_tag_open']   = '<li class="page-item"><span class="page-link border-0 font-weight-bold" href="javascript:;">';
                $config['first_tag_close'] = '</span></li>';
                $config['last_tag_open']   = '<li class="page-item"><span class="page-link border-0 font-weight-bold" href="javascript:;">';
                $config['last_tag_close'] = '</span></li>';

                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" aria-current="page">';
                $config['cur_tag_close']    = '</span></li>';

                $config['next_tag_open']    = '<li class="page-item"><span class="page-link" aria-hidden="true">';
                $config['next_tag_close']  = '</span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tag_close']  = '</span></li>';



                $this->pagination->initialize($config);
                $data['page'] = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;

                $str_links = $this->pagination->create_links();
                $data['links'] = explode('&nbsp;', $str_links);
                //$results = $this->db->get('t_users', $config['per_page'], $this->uri->segment(4))->result_array();
                //$results = User_Eloquent::skip($this->uri->segment(4))->take($config['per_page'])->get();
                //$this->data['records'] = User_Eloquent::skip($this->data['page'])->take($config['per_page'])->get();
                //$data['records'] = BookEloquent::getEbooksPaginate($data['page'], $config['per_page']);
                $data['records'] = Ebook_Model::getPaginateSearchBooks($data['page'], $config['per_page'], $search_text, $client_id);

                $data['pagination'] = $this->pagination->create_links();
                //$data['content'] = 'app/listCatalogosCardsPageAjax';
                //$this->load->view('app/templateApp', $data);
                //$this->load->view('app/listCatalogosCardsPageAjax', $data);
            } else {
                $data['total_row'] = Ebook_Model::getCantSearchEbooks($search_text, $client_id); //total row
                $data['resultFlag'] = FALSE;
                $data['resultVacio'] = 'No se encontraron libros en su búsqueda, intente con otra expresión.';
                //print_r($data);
            }
            $this->load->view('app/listCatalogosCardsPageAjax', $data);
        }
    }*/
