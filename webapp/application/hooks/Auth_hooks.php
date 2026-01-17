<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_hooks
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function check_login()
    {
        $rutas_free = array('/login', 'login', 'logout', '/logout', '/', '/logon', 'logon', '/register', 'register', '/registration', 'registration', '/home', 'home', '/about', 'about', '/contact', 'contact', '/welcome', 'welcome');
        $rutas_used = $this->CI->uri->segment(1);
        // Check if user is logged in
        if (in_array($rutas_used, $rutas_free)) {
            //print_r($rutas_used.'. '.'Ruta libre. No se requiere login.');
            echo $this->CI->output->get_output();
            //exit;
        } else {
            // User is logged in, proceed as normal
            if (!$this->CI->session->userdata('isLogged')) {
                // Redirect to login page if not logged in
                redirect('login');
                exit;
            } else {
                if ($this->CI->session->userdata('User_guard') == $rutas_used) {
                    // Redirect to login page if not logged in
                    //redirect('login');
                    //print_r("No autorizado. Redirigiendo a login...");
                    //print_r($rutas_used);
                    echo $this->CI->output->get_output();
                    //exit;
                } else {
                    print_r("No autorizado. Redirigiendo a login...");
                    redirect('login');
                    //echo $this->CI->output->get_output();
                }
            }
        }
    }
}
