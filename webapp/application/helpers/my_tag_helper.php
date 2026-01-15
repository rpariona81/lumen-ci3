<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Helper que da formato a los errores.
 * */
if (!function_exists('my_validation_errors')) {

    function my_validation_errors($errors)
    {
        $salida = '';
        if ($errors) {
            /*$salida = '<div class="alert alert-danger">';
            
            $salida = $salida . '<h4> Mensajes Validacion </h4>';
            $salida = $salida . '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $salida = $salida . '<small>' . $errors . '</small>';
            $salida = $salida . '</div>';
            */

            $salida = '<div class="alert alert-danger">';
            $salida = $salida . '<h5 class="card-title">Mensajes de validación</h5>';
            $salida = $salida . '<small>' . $errors . '</small>';
            $salida = $salida . '</div>';
        }
        return $salida;
    }
}


if (!function_exists('my_error')) {

    function my_error($error)
    {
        $salida = '';
        if ($error) {
            $salida = '<div class="alert alert-danger alert-dismissible fade show" role="alert"  style="font-size: 0.9em; padding: 0.9em">';
            $salida = $salida . '<strong>' . $error . '</strong>';
            $salida = $salida . '  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
        return $salida;
    }
}

if (! function_exists('redirect_back')) {
    function redirect_back()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('Location: http://' . $_SERVER['SERVER_NAME']);
        }
        exit;
    }
}
