<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

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
        $this->load->model('Offerclient_model');
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

    public function viewClientInfo()
    {
        $client_id = $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id;
        if (isset($client_id)) {
            $data['content'] = 'admin/clientInfo';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    /**
     * CONTROL DE PROGRAMAS DE ESTUDIOS
     *  */

    public function verProgramas()
    {
        $client_id = $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id;
        if (isset($client_id)) {
            $data['query'] = Offerclient_model::where('client_id', '=', $client_id)->get();
            $data['content'] = 'admin/programasTable';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function nuevoPrograma()
    {
        $client_id = $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id;
        if (isset($client_id)) {
            $data['content'] = 'admin/programaNew';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function creaPrograma()
    {
        $this->form_validation->set_rules('career_offered', 'Nombre del programa', 'required');
        //si el proceso falla mostramos errores
        if ($this->form_validation->run() == FALSE) {
            $this->nuevoPrograma();
            //en otro caso procesamos los datos
        } else {
            $client_id = $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id;
            if (isset($client_id)) {
                date_default_timezone_set('America/Lima');
                $data = array(
                    'career_offered' => trim($this->input->post('career_offered')),
                    'career_offered_code' => trim($this->input->post('career_offered_code')),
                    'client_id' => $client_id
                );
                //echo json_encode($data);
                //exit();
                $model = new Offerclient_model();
                $model->fill($data);
                $model->save($data);
                /*echo json_encode($model);
                exit();*/
                redirect('/admin/programas');
            } else {
                $this->nuevoPrograma();
            }
        }
    }

    public function editaPrograma($offer_id)
    {
        $client_id = $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id;
        if (isset($client_id)) {
            $data['programa'] = Offerclient_model::findOrFail($offer_id);
            $data['content'] = 'admin/programaEdit';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function actualizaPrograma()
    {
        $client_id = $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id;
        if (isset($client_id)) {
            date_default_timezone_set('America/Lima');
            $id = $this->input->post('id');
            $data = array(
                'career_offered' => $this->input->post('career_offered'),
                'career_offered_code' => $this->input->post('career_offered_code'),
            );

            $model = Offerclient_model::findOrFail($id);
            $model->fill($data);
            $model->save($data);
            redirect('/admin/programas', 'refresh');
        } else {
            echo "fallo actualizacion";
        }
    }

    public function eliminaPrograma()
    {
        $client_id = $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id;
        if (isset($client_id)) {
            $id_career = $this->input->post('id_career', true);
            $programa = Offerclient_model::find($id_career);
            $programa->delete();
            redirect('/admin/programas', 'refresh');
            //CareerEloquent::where('id', $id_career)->delete();
        } else {
            $this->session->set_flashdata('flashError', 'No se puede eliminar el programa seleccionado porque tiene registros.');
            redirect('/admin/programas', 'refresh');
        }
    }


    /** Repositorio de cliente */
    public function verRepositorios()
    {
        $this->load->library('AdminLib');
        $data = [];
        $data['pagina_title'] = 'Panel de control';
        $util = new AdminLib();
        $data['catalogs'] = $util->getCatalogRepo();
        $data['query'] = $util->getRepositories();
        //print_r(json_encode($data));
        //exit();
        $data['content'] = 'admin/repoTable';
        $this->load->view('admin/templateAdmin', $data);
    }

    public function verRepo($repo_id = NULL)
    {
        //echo "repo ".$repo_id;
        //exit();
        $this->load->library('AdminLib');
        $data = [];
        $data['pagina_title'] = 'Panel de control';
        $util = new AdminLib();
        //print_r(json_encode($data));
        //exit();
        $data['repo'] = $util->selectRepo($repo_id);

        $data['content'] = 'admin/repoEdit';
        $this->load->view('admin/templateAdmin', $data);
    }

    public function editaRepo($repo_id = NULL)
    {
        $this->load->library('AdminLib');
        $data = [];
        $data['pagina_title'] = 'Panel de control';
        $util = new AdminLib();
        $data['repo'] = $util->selectRepo($repo_id);
        $data['content'] = 'admin/repoEdit';
        $this->load->view('admin/templateAdmin', $data);
    }

    public function _do_upload_repo()
    {
        $config['upload_path']          = FCPATH . 'uploads/pdf/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 1048576;
        $config['file_name']            = round(microtime(true) * 10) . '_' . $_FILES['repo_file']['name'];
        $config['remove_spaces']        = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('repo_file')) {
            //$error = array('error' => $this->upload->display_errors());
            //print_r($error); die();
            $data['error_string'] = 'Error de carga de archivo: ' . $this->upload->display_errors('', '');
            $data['status'] = 0;
            exit();
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        return $data;
    }

    public function actualizaRepo()
    {
        //$this->_validate();
        try {
            $client_id = $this->Client_model->where('client_name', $this->session->userdata('Client'))->first()->id;
            if (isset($client_id)) {
                $id = $this->input->post('id');
                $checkFile = $this->input->post('checkFile');
                $repocode_uuid = Str::uuid()->toString();
                $data = array(
                    'repo_code' => $this->input->post('repo_code',true) ? trim($this->input->post('repo_code')) : $repocode_uuid,
                    'repo_isbn' => $this->input->post('repo_isbn', true) ? trim($this->input->post('repo_isbn', true)) : NULL,
                    'repo_title' => $this->input->post('repo_title', true) ? trim($this->input->post('repo_title', true)) : NULL,
                    'repo_tags' => $this->input->post('repo_tags', true) ? htmlspecialchars(trim($this->input->post('repo_tags', true))) : NULL,
                    'repo_display' => $this->input->post('repo_display', true) ? trim($this->input->post('repo_display', true)) : NULL,
                    'repo_author' => $this->input->post('repo_author', true),
                    'repo_editorial' => $this->input->post('repo_editorial', true),
                    'repo_year' => $this->input->post('repo_year', true)?? '2000',
                    'repo_pages' => $this->input->post('repo_pages', true) ? $this->input->post('repo_pages', true) : 9999
                );
                $checkFile = isset($checkFile) ?? 0;
                
                if ($checkFile) {
                    if (!empty($_FILES)) {
                        $upload = $this->_do_upload_repo();
                        if ($upload) {
                            $data['repo_url'] = $upload['upload_data']['full_path'];
                            $data['repo_file'] = $upload['upload_data']['file_name'];
                            $model = Repository_model::findOrFail($id);
                            $model->fill($data);
                            $model->save($data);
                            $this->session->set_flashdata('flashSuccess', 'Actualización exitosa.');
                            redirect_back();
                        } else {
                            $this->session->set_flashdata('flashError', 'Error de carga de archivo. Intente nuevamente.');
                            //$this->viewConvocatoria($data['offer_id']);
                            //redirect('users/convocatoria/' . $data['offer_id']);
                            //redirect($_SERVER['REQUEST_URI'], 'refresh'); 
                            redirect_back();
                            exit();
                            //return FALSE;
                        }
                    } else {
                        $this->session->set_flashdata('flashError', 'Error de carga de archivo. Intente nuevamente.');
                        exit();
                    }
                } else {
                    //redirect($_SERVER['REQUEST_URI'], 'refresh'); 
                    $model = Repository_model::findOrFail($id);
                    $model->fill($data);
                    $model->save($data);
                    $this->session->set_flashdata('flashSuccess', 'Actualización exitosa, no se modifica el PDF.');
                    redirect_back();
                    //$this->session->set_flashdata('flashError', 'Error de carga de archivo.');
                    //redirect_back(); 
                }
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('flashError', $e->getMessage());
            exit();
        }
    }
}
