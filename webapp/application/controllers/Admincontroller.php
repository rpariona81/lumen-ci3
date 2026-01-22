<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
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
        //echo "Admin Controller.<br/>Client info:<br/>";
        $this->load->library('AdminLib');
        $data = [];
        $data['pagina_title'] = 'Panel de control';

        $data['content'] = 'admin/dashboard';
        $util = new AdminLib();
        $data['cantUsers'] = $util->getCantUsersActive();
        $data['cantCareers'] = $util->getCantCareers();
        $data['cantBooks'] = $util->getCantEbooks();
        $data['CantRequests'] = $util->getCantSolicitudes();
        $data['booksLast'] = $util->getLastViews();
        $this->load->view('admin/templateAdmin', $data);
        //$lastViews = $this->Viewebook_model::all();
        //echo json_encode($data);
        /*$data['cantCareers'] = CareerEloquent::getCantCareers();
            $data['cantBooks'] = BookEloquent::getCantEbooks();
            // $data['cantPostulations'] = PostulateJobEloquent::getCantPostulations();
            $data['cantUsersByCareer'] = CareerEloquent::getCantUsersByCareer();
            // $data['offersjobsLast'] = OfferJobEloquent::getOffersjobsLast();
            $data['booksLast'] = ViewBookEloquent::lastViews();
        
        $this->load->view('admin/demos', $data);*/
    }

    public function verUsuarios()
    {
        $this->load->library('AdminLib');
        $data = [];
        $data['pagina_title'] = 'Panel de control';

        $data['content'] = 'admin/usersTable';
        $util = new AdminLib();
        $data['query'] = $util->getUsersActive();
        //echo json_encode($data);
        $this->load->view('admin/templateAdmin', $data);
    }

    public function verSolicitudes()
    {
        $this->load->library('AdminLib');
        $data = [];
        $data['pagina_title'] = 'Panel de control';

        $data['content'] = 'admin/requestTable';
        $util = new AdminLib();
        $data['query'] = $util->getRequests();
        //echo json_encode($data);
        $this->load->view('admin/templateAdmin', $data);
    }

    public function activaUser()
    {
        try {
            $username = $this->input->post('username',true);
            $user_find = $this->User_model->where('username','=',$username)->select('id')->get();
            $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
            if (isset($user_find) && isset($client_id)) {
                $model = User_model::find($user_find[0]['id']);
                $model->enabled = 1;
                $model->email_subscribed = 1;
                $model->save();
                $this->session->set_flashdata('success', 'Usuario ' . $model['username'] . ' desactivado.');
                redirect('/admin/users', 'refresh');
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "error";
        }
    }

    public function desactivaUser()
    {
        try {
            $username = $this->input->post('username',true);
            $user_find = $this->User_model->where('username','=',$username)->select('id')->get();
            $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
            if (isset($user_find) && isset($client_id)) {
                $model = User_model::find($user_find[0]['id']);
                $model->enabled = 0;
                $model->save();
                $this->session->set_flashdata('success', 'Usuario ' . $model['username'] . ' desactivado.');
                redirect('/admin/users', 'refresh');
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "error";
        }
    }

    public function activaRequest()
    {
        try {
            $username = $this->input->post('username',true);
            $user_find = $this->User_model->where('username','=',$username)->select('id')->get();
            $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
            if (isset($user_find) && isset($client_id)) {
                $model = User_model::find($user_find[0]['id']);
                $model->enabled = 1;
                $model->email_subscribed = 1;
                $model->save();
                $this->session->set_flashdata('success', 'Usuario ' . $model['username'] . ' desactivado.');
                redirect('/admin/requests', 'refresh');
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "error ".$username.'..'.$user_find;
        }
    }

    public function desactivaRequest()
    {
        try {
            $username = $this->input->post('username',true);
            $user_find = $this->User_model->where('username','=',$username)->select('id')->get();
            $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
            if (isset($user_find) && isset($client_id)) {
                $model = User_model::find($user_find[0]['id']);
                $model->enabled = 0;
                $model->save();
                $this->session->set_flashdata('success', 'Usuario ' . $model['username'] . ' desactivado.');
                redirect('/admin/requests', 'refresh');
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "error ".$username.'..'.$user_find;
        }
    }
}
