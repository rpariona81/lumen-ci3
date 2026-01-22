<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Support\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Capsule\Manager as DB;
use PhpParser\Node\NullableType;

class UserLib
{
    private $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('User_model');
        $this->ci->load->model('Role_model');
        $this->ci->load->model('Client_model');
        $this->ci->load->model('Session_model');
        $this->ci->load->model('Ebook_model');
        $this->ci->load->model('Repository_model');
        $this->ci->load->model('Viewebook_model');
        $this->ci->load->library('session');
    }

    public function getListDocumentType()
    {
        $results = DB::table('t_document_type')
            ->select('id', 'document_type_label')
            ->get();

        $lista = array();
        //$lista[NULL]='Seleccionar';
        foreach ($results as $result) {
            $lista[$result->id] = $result->document_type_label;
        }
        return $lista;
    }
}
