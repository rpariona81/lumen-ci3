<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Support\Carbon;

class LoginLib
{

    private $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('User_model');
        $this->ci->load->model('Role_model');
        $this->ci->load->model('Client_model');
        $this->ci->load->model('Session_model');
        $this->ci->load->library('session');
    }

    public function login($username, $password)
    {
        try {
            //code...
            $user = $this->ci->User_model->where('username', $username)->first();

            if ($user->enabled && password_verify($password, $user->password)) {

                if (empty($user->roles) || empty($user->client)) {
                    // User has no roles or client assigned
                    $this->ci->session->set_flashdata('No autorizado! Contacte con su administrador.');
                    return false;
                } else {
                    // Login successful
                    $user->last_login_at = Carbon::now()->toDateTimeString();
                    $user->last_login_ip = $this->ci->input->ip_address();
                    $user->save();

                    $session_id = $this->ci->session->session_id;
                    $session_opened = $this->ci->Session_model::find($session_id);
                    if ($session_opened) {
                        //$session_opened = new $this->ci->Session_model();
                        $session_opened->last_activity = Carbon::now()->getTimestamp();
                        $session_opened->user_id = $user->id;
                        $session_opened->ip_address = $this->ci->input->ip_address();
                        $session_opened->user_agent = $this->ci->input->user_agent();
                        //$session_opened->is_logged_out = 0;
                        $session_opened->save();
                    }
                    $newdata = array(
                        'User'    => $user['username'],
                        'Role'    => $user['roles'][0]->roledisplay,
                        'Client'    => $user['client']->client_name,
                        'User_guard' => $user['roles'][0]->guard_name,
                        'isLogged'    => true
                    );
                    $this->ci->session->set_userdata($newdata);
                    //Login successful
                    return true;
                }
            } else {
                // Login failed
                $this->ci->session->set_flashdata('Error de usuario y/o contraseña.');
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
            $this->ci->session->set_flashdata('Este usuario no existe o está desactivado.');
            return false;
        }
    }
}
