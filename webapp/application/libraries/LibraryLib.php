<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Support\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Capsule\Manager as DB;

class LibraryLib
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
        $this->ci->load->library('session');
    }

    public function selectEbook($id = null)
    {
        
    }

    public function countEbooksFind($search_text = NULL, $client_id = NULL)
    {
        /*
        $firstLoad = $this->ci->Ebook_model::whereIn('id', function ($query) use ($client_id) {
            $query->select('ebook_id')
                ->from('t_client_ebook')
                ->where('client_id', '=', $client_id);
        })->where(function ($query) use ($search_text) {
            $query->where('ebook_title', 'LIKE', '%' . $search_text . '%')
                ->orWhere('ebook_author', 'LIKE', '%' . $search_text . '%')
                ->orWhere('ebook_code', 'LIKE', '%' . $search_text . '%')
                ->orWhere('ebook_isbn', 'LIKE', '%' . $search_text . '%')
                ->orWhere('ebook_editorial', 'LIKE', '%' . $search_text . '%')
                ->orWhere('ebook_tags', 'LIKE', '%' . $search_text . '%')
                ->orWhere('ebook_display', 'LIKE', '%' . $search_text . '%');
        })->get();

        $secondLoad = $this->ci->Repository_model::where(function ($query) use ($client_id) {
            $query->where('client_id', '=', $client_id);
        })->where(function ($query) use ($search_text) {
            $query->where('repo_title', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_author', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_code', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_isbn', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_editorial', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_tags', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_display', 'LIKE', '%' . $search_text . '%');
        })->get();

        $results = $firstLoad->merge($secondLoad);
        */

        $firstLoad = DB::table('t_client_ebook')
            ->leftjoin('t_ebooks', 't_client_ebook.ebook_id', '=', 't_ebooks.id')
            ->where('t_client_ebook.client_id', '=', $client_id)
            ->where(function ($query) use ($search_text) {
                $query->where('ebook_title', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('ebook_author', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('ebook_code', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('ebook_isbn', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('ebook_editorial', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('client_ebook_tags', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('ebook_display', 'LIKE', '%' . $search_text . '%');
            })
            ->get();

        $secondLoad = $this->ci->Repository_model::where(function ($query) use ($client_id) {
            $query->where('client_id', '=', $client_id);
        })->where(function ($query) use ($search_text) {
            $query->where('repo_title', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_author', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_code', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_isbn', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_editorial', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_tags', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_display', 'LIKE', '%' . $search_text . '%');
        })->get();

        $results = $firstLoad->merge($secondLoad);
        return $results->count();
    }


    public function getEbooksPaginate($skip = NULL, $take = NULL, $search_text = NULL, $client_id = NULL)
    {
        //$client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;

        /*$firstLoad = $this->ci->Ebook_model::whereIn('id', function ($query) use ($client_id) {
            $query->select('ebook_id')
                ->from('t_client_ebook')
                ->where('client_id', '=', $client_id);
        })->where(function ($query) use ($search_text) {
            $query->where('ebook_title', 'LIKE', '%' . $search_text . '%')
                ->orWhere('ebook_author', 'LIKE', '%' . $search_text . '%')
                ->orWhere('ebook_code', 'LIKE', '%' . $search_text . '%')
                ->orWhere('ebook_isbn', 'LIKE', '%' . $search_text . '%')
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
            'ebook_tags'
        )
            ->get();*/

        $firstLoad = DB::table('t_client_ebook')
            ->leftjoin('t_ebooks', 't_client_ebook.ebook_id', '=', 't_ebooks.id')
            ->where('t_client_ebook.client_id', '=', $client_id)
            ->where(function ($query) use ($search_text) {
                $query->where('ebook_title', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('ebook_author', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('ebook_code', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('ebook_isbn', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('ebook_editorial', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('client_ebook_tags', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('ebook_display', 'LIKE', '%' . $search_text . '%');
            })->select(
                't_ebooks.id',
                't_ebooks.ebook_code',
                't_ebooks.ebook_isbn',
                't_ebooks.ebook_title',
                't_ebooks.ebook_alias',
                't_ebooks.ebook_display',
                't_ebooks.ebook_type',
                't_ebooks.ebook_author',
                't_ebooks.ebook_editorial',
                't_ebooks.ebook_year',
                't_ebooks.ebook_pages',
                't_ebooks.ebook_front_page',
                't_ebooks.ebook_url',
                't_ebooks.ebook_file',
                't_ebooks.catalog_id',
                't_ebooks.ebook_available',
                't_ebooks.ebook_format',
                't_ebooks.ebook_details',
                't_ebooks.ebook_categories',
                't_client_ebook.client_ebook_tags as ebook_tags'
            )
            ->get();

        $secondLoad = $this->ci->Repository_model::where(function ($query) use ($client_id) {
            $query->where('client_id', '=', $client_id);
        })->where(function ($query) use ($search_text) {
            $query->where('repo_title', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_author', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_code', 'LIKE', '%' . $search_text . '%')
                ->orWhere('repo_isbn', 'LIKE', '%' . $search_text . '%')
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
            'repo_tags as ebook_tags'
        )
            ->get();

        //$results = $firstLoad->merge($secondLoad);
        $collected  = $firstLoad->merge($secondLoad);
        //$currentPage = LengthAwarePaginator::resolveCurrentPage();
        //$perPage = 3;
        $currentPageItems = $collected->slice(($skip * $take), $take)->values();
        return $currentPageItems;
    }
}
