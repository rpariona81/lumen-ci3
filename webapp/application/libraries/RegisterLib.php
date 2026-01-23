<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class RegisterLib
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

    public function register($firstname, $lastname, $email, $password)
    {
        try {
            //code...
            $existingUser = $this->ci->User_model->where('email', $email)->first();
            $last_at_pos = strrpos($email, '@');
            $len_email = strlen($email);
            $host = $_SERVER['HTTP_HOST'];
            $subdomain_arr = explode('.', $host, 2); // Limit the split to 2 parts
            $subdomain_name = $subdomain_arr[0];
            if (isset($existingUser)) {
                // User already exists
                $this->ci->session->set_flashdata('error', 'Ya existe ese correo electrónico! Intente con otro.');
                return false;
            } else {
                // Create new user
                $role_user = $this->ci->Role_model::where('rolename', 'user')->first();
                $client_user = $this->ci->Client_model::where('client_subdomain', 'client01')->first();
                $newUser = new $this->ci->User_model();
                $newUser->firstname = $firstname;
                $newUser->lastname = $lastname;
                $newUser->email = $email;

                //$password_generated = trim(strtolower(substr($email, (-1 * $len_email), $last_at_pos)));
                //$password_generated = md5(substr($email, (-1 * $len_email), $last_at_pos));

                // Source - https://stackoverflow.com/a
                // Posted by houbysoft, modified by community. See post 'Timeline' for change history
                // Retrieved 2026-01-16, License - CC BY-SA 3.0
                //$password_generated = bin2hex(openssl_random_pseudo_bytes(5));

                //$newUser->username = $password_generated;
                $newUser->username = Str::uuid()->toString();
                //$newUser->username = (string) Str::uuid()->getHex() . '@';
                $newUser->password = password_hash($password, PASSWORD_BCRYPT);
                $newUser->enabled = false; // New users are disabled by default
                $newUser->remember_token = base64_encode($password);
                $newUser->save();
                // Assign default role and client if necessary
                $newUser->roles()->attach($role_user->id);
                $newUser->client()->associate($client_user);
                $newUser->save();

                $this->ci->session->set_flashdata('success', 'Solicitud recibida con éxito, se activará su cuenta dentro de las próximas 24 hrs.');
                return true;
            }
        } catch (Exception $e) {
            // Handle exception
            print_r($e->getMessage());
            $this->ci->session->set_flashdata('error', 'Verifique la información proporcionada e intente nuevamente.');
            return false;
        }
    }
}
