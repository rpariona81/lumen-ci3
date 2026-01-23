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
        $this->load->model('Clientebook_model');
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
            $username = $this->input->post('username', true);
            $user_find = $this->User_model->where('username', '=', $username)->get();
            $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
            if (isset($user_find) && isset($client_id)) {
                $model = User_model::find($user_find[0]['id']);
                $model->enabled = 1;
                $model->email_subscribed = 1;
                $model->save();
                $this->session->set_flashdata('success', 'Usuario ' . $model['username'] . ' activado.');
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
            $username = $this->input->post('username', true);
            $user_find = $this->User_model->where('username', '=', $username)->select('id')->get();
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
            $username = $this->input->post('username', true);
            $user_find = $this->User_model->where('username', '=', $username)->select('id')->get();
            $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
            if (isset($user_find) && isset($client_id)) {
                $model = User_model::find($user_find[0]['id']);
                $model->enabled = 1;
                $model->email_subscribed = 1;
                $model->save();
                $this->session->set_flashdata('success', 'Usuario ' . $model['username'] . ' aceptado.');
                redirect('/admin/requests', 'refresh');
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "error " . $username . '..' . $user_find;
        }
    }

    public function desactivaRequest()
    {
        try {
            $username = $this->input->post('username', true);
            $user_find = $this->User_model->where('username', '=', $username)->select('id')->get();
            $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
            if (isset($user_find) && isset($client_id)) {
                $model = User_model::find($user_find[0]['id']);
                $model->email_subscribed = 0;
                $model->enabled = 1;
                $model->save();
                $this->session->set_flashdata('success', 'Usuario ' . $model['username'] . ' no aceptado.');
                redirect('/admin/requests', 'refresh');
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "error " . $username . '..' . $user_find;
        }
    }

    public function editaUsuario($username = NULL)
    {
        $user_find = User_model::where('username', '=', $username)->first();
        $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
        //echo $user_find.'  .. '.$client_id.'..'.json_encode($data);
        //echo $user_find.'  .. '.$client_id.'..'.$data->usuario->lastname;
        //echo "user_find ".$user_find->id;
        if (isset($user_find) && isset($client_id)) {
            $data['usuario'] = User_model::findOrFail($user_find->id);
            //echo json_encode($data['usuario']['firstname']);
            $data['content'] = 'admin/userEdit';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error', 'Usuario ' . $username . ' no existe.');
            redirect('/admin/users/', 'refresh');
        }
    }

    public function no_repetir_email($registro)
    {
        $registro = $this->input->post();
        $nuevo_email = User_model::where('email', $registro['email'])->first();
        $usuario_actual = User_model::where('username', $registro['username'])->first();
        if (!isset($nuevo_email)) {
            $nuevo_dato = [];
            array_push($nuevo_dato, $registro);
            //echo 'FALSE 1';
            //exit();
            return TRUE;
        } elseif ($nuevo_email->id != $usuario_actual->id) {
            //echo 'FALSE 2';
            //exit();
            return FALSE;
        } else {
            //echo 'TRUE';
            //exit();
            return TRUE;
        }
    }

    public function actualizaUsuario()
    {
        $this->form_validation->set_message('no_repetir_email', 'Existe otro registro con el mismo %s');
        //echo 'pruebas';
        //exit();
        $this->form_validation->set_rules('firstname', 'Nombres', 'required|trim|min_length[2]');
        $this->form_validation->set_rules('lastname', 'Apellidos', 'required|trim|min_length[2]');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_no_repetir_email');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|trim|min_length[8]');
        $post_username = trim($this->input->post('username', true));
        //echo $post_username;
        //exit();
        $user_find = $this->User_model->where('username', '=', $post_username)->first();
        $client_id = $this->session->userdata('Client') ? $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id : null;
        //echo $user_find;
        //exit();
        //si el proceso falla mostramos errores
        if ($this->form_validation->run() == FALSE) {
            $this->editaUsuario($post_username);
            //exit();
            //en otro caso procesamos los datos
        } else {
            //echo $user_find->id;
            //exit();
            if (isset($client_id)) {
                date_default_timezone_set('America/Lima');
                $data = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'email' => $this->input->post('email'),
                );
                //echo $data;
                //exit();
                $model = $this->User_model::findOrFail($user_find->id);
                //echo json_encode($model);
                //exit();
                if (password_verify($this->input->post('password'), $model->password)) {
                    $data['password'] = $model->password;
                    $data['remember_token'] = $model->remember_token;
                } else {
                    $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                    $data['remember_token'] = base64_encode($this->input->post('password'));
                }
                $model->fill($data);
                //echo json_encode($model);
                //exit();
                $model->save();
                //echo $data;
                //exit();
                $this->session->set_flashdata('success', 'Usuario ' . $post_username . ' actualizado.');
                redirect('/admin/users/' . $post_username, 'refresh');
            } else {
                $this->editaUsuario($post_username);
            }
        }
    }

    public function verCatalogo()
    {
        $this->load->library('AdminLib');
        $data = [];
        $data['pagina_title'] = 'Panel de control';
        $util = new AdminLib();
        $data['catalogs'] = $util->getCatalogs();
        $data['query'] = $util->getEbooks();
        //print_r(json_encode($data));
        //exit();
        $data['content'] = 'admin/catalogTable';
        $this->load->view('admin/templateAdmin', $data);
    }

    public function verLibro($ebook_id = NULL)
    {
        $this->load->library('AdminLib');
        $data = [];
        $data['pagina_title'] = 'Panel de control';
        $util = new AdminLib();
        $data['book'] = $util->selectEbook($ebook_id);
        //print_r(json_encode($data));
        //exit();
        $data['content'] = 'admin/ebookView';
        $this->load->view('admin/templateAdmin', $data);
    }

    public function editaEbook($ebook_id = NULL)
    {
        $this->load->library('AdminLib');
        $data = [];
        $data['pagina_title'] = 'Panel de control';
        $util = new AdminLib();
        $data['book'] = $util->selectEbook($ebook_id);
        $data['content'] = 'admin/ebookEdit';
        $this->load->view('admin/templateAdmin', $data);
    }

    public function actualizaEbook()
    {
        //$this->_validate();
        try {
            date_default_timezone_set('America/Lima');
            $ebook_id = $this->input->post('id');
            $client_id = $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id;
            $data = array(
                'client_ebook_tags' => $this->input->post('client_ebook_tags') ? trim($this->input->post('client_ebook_tags')) : NULL
            );
            $model = Clientebook_model::where('ebook_id', '=', $ebook_id)->where('client_id', '=', $client_id)->first();
            //echo $model;
            //exit();
            
            $model->fill($data);
            $model->save($data);
            $this->session->set_flashdata('flashSuccess', 'Actualización exitosa de etiquetas.');
            redirect_back();
            //$this->session->set_flashdata('flashError', 'Error de carga de archivo.');
            //redirect_back(); 
        } catch (Exception $e) {
            $this->session->set_flashdata('flashError', $e->getMessage());
            exit();
        }
    }
}
