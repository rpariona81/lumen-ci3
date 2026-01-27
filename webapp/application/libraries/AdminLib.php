<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Support\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Capsule\Manager as DB;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\NullableType;

class AdminLib
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
        $this->ci->load->model('Offerclient_model');
        $this->ci->load->model('Viewebook_model');
        $this->ci->load->model('Clientebook_model');
        $this->ci->load->library('session');
    }

    public function getCantUsersActive()
    {
        $CantUsersActive = 0;
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;
        if (isset($client_id)) {
            $CantUsersActive = $this->ci->User_model::where('enabled', true)
                ->where('client_id', '=', $client_id)
                ->count();
        }
        return $CantUsersActive;
    }

    public function getCantSolicitudes()
    {
        $CantRequests = 0;
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;
        if (isset($client_id)) {
            $CantRequests = $this->ci->User_model::where('enabled', false)
                ->where('client_id', '=', $client_id)
                ->count();
        }
        return $CantRequests;
    }

    public function getCantCareers()
    {
        $cantCareers = 0;
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;
        if (isset($client_id)) {
            $cantCareers = $this->ci->Offerclient_model::where('client_id', '=', $client_id)
                ->count();
        }
        return $cantCareers;
    }

    public function getCantEbooks()
    {
        $cantBooks = 0;
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;
        if (isset($client_id)) {
            $cantBooks = $this->ci->Ebook_model::whereIn('id', function ($query) use ($client_id) {
                $query->select('ebook_id')
                    ->from('t_client_ebook')
                    ->where('client_id', '=', $client_id);
            })->count();
        }
        return $cantBooks;
    }



    public function getLastViews()
    {
        $lastViews = array();
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;
        //$lastViews = $this->ci->Viewebook_model::all();
        //$lastViews = $this->ci->Viewebook_model::leftjoin('t_ebooks', 't_ebooks.id', '=', 't_ebooks_views.ebook_id')
        $lastViews = DB::table('t_ebooks_views')
            ->leftJoin('t_ebooks', 't_ebooks_views.ebook_id', '=', 't_ebooks.id')
            ->leftjoin('t_client_ebook', function ($join) {
                $join->on('t_client_ebook.client_id', '=', 't_ebooks_views.client_id')
                    ->on('t_client_ebook.ebook_id', '=', 't_ebooks_views.ebook_id');
            })
            ->where(function ($query) use ($client_id) {
                $query->where('t_ebooks_views.client_id', '=', $client_id);
            })
            ->take(4)
            ->distinct('t_ebooks.id')
            ->get();
        /*->distinct('t_ebooks.id')
            ->where('client_id', '=', $client_id)
            ->take(4)
            ->get();*/
        return $lastViews;
        /*->leftjoin('t_client_ebook', 't_client_ebook.client_id', '=', 't_ebooks_views.client_id')*/
    }

    public function getUsersActive()
    {
        $users = array();
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;

        $users = DB::table('t_users')
            ->leftjoin('t_role_user', 't_role_user.user_id', '=', 't_users.id')
            ->leftJoin('t_roles', 't_roles.id', '=', 't_role_user.role_id')
            ->where('client_id', '=', $client_id)
            ->where('email_subscribed', '=', true)
            ->where('guard_name', '=', 'user')
            ->orderBy('t_users.updated_at', 'desc')
            ->get();

        return $users;
    }

    public function getRequests()
    {
        $requests = array();
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;

        /*$requests = $this->ci->User_model::with('roles')
            ->where('client_id', '=', $client_id)
            ->where('enabled', '=', false)
            ->get();*/

        $requests = DB::table('t_users')
            ->leftjoin('t_role_user', 't_role_user.user_id', '=', 't_users.id')
            ->leftJoin('t_roles', 't_roles.id', '=', 't_role_user.role_id')
            ->where('client_id', '=', $client_id)
            ->where('email_subscribed', '=', false)
            ->where('guard_name', '=', 'user')
            ->orderBy('t_users.updated_at', 'desc')
            ->get();

        return $requests;
    }

    public function activeUser($user_id, $client_id)
    {
        //$client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;

        $model = $this->ci->User_model::where('id', $user_id)
            ->where('client_id', '=', $client_id)
            ->where('enabled', '=', false);
        $model->enabled = true;
        if ($model->save()) {
            return true;
        }

        return false;
    }

    public function getEbooks()
    {
        $ebooks = array();
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;
        //$lastViews = $this->ci->Viewebook_model::all();
        //$lastViews = $this->ci->Viewebook_model::leftjoin('t_ebooks', 't_ebooks.id', '=', 't_ebooks_views.ebook_id')
        $ebooks = DB::table('t_client_ebook')
            ->leftjoin('t_ebooks', 't_client_ebook.ebook_id', '=', 't_ebooks.id')
            ->where('t_client_ebook.client_id', '=', $client_id)
            ->where('ebook_available', '=', 1)
            ->distinct('t_ebooks.id')
            ->get();
        return $ebooks;
    }

    public function selectEbook($ebook_id)
    {
        $ebook = array();
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;
        $ebook = DB::table('t_client_ebook')
            ->leftjoin('t_ebooks', 't_client_ebook.ebook_id', '=', 't_ebooks.id')
            ->where('t_client_ebook.client_id', '=', $client_id)
            ->where('t_client_ebook.ebook_id', '=', $ebook_id)
            ->distinct('t_ebooks.id')
            ->first();
        return $ebook;
    }

    public function getCatalogs()
    {

        $catalogs = array();
        $array_tags = array();
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;
        //$lastViews = $this->ci->Viewebook_model::all();
        //$lastViews = $this->ci->Viewebook_model::leftjoin('t_ebooks', 't_ebooks.id', '=', 't_ebooks_views.ebook_id')
        $catalogs = DB::table('t_client_ebook')
            ->where('client_id', '=', $client_id)
            ->distinct('t_client_ebook.client_ebook_tags')
            ->get();
        foreach ($catalogs as $tags) {
            if (isset($tags->client_ebook_tags)) {
                if (str_contains($tags->client_ebook_tags, ',')) {
                    $client_ebook_tags = explode(',', $tags->client_ebook_tags);
                    foreach ($client_ebook_tags as $tag)
                        array_push($array_tags, $tag);
                } else {
                    array_push($array_tags, $tags->client_ebook_tags);
                }
            }
        }
        $unique_array = array_unique($array_tags);

        return $unique_array;
    }

    public function selectEbookClient($ebook_id)
    {
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;
        print_r($client_id);
        exit();
        $model = $this->ci->Clientebook_model::where('ebook_id', '=', $ebook_id)->get();
        //->where('client_id', '=', $client_id)->first();
        //print_r($model);
        //exit();
        return $model;
    }

    public function getRepositories()
    {
        $repos = array();
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;
        //$lastViews = $this->ci->Repository_model::all();
        //$repos = $this->ci->Repository_model::where('client_id', '=', $client_id)->get();
        $repos = DB::table('t_client_repository')
            ->where('client_id', '=', $client_id)
            ->where('repo_available', '=', 1)
            ->get();
        return $repos;
    }

    public function selectRepo($repo_id)
    {
        $repo = array();
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;
        $repo = $this->ci->Repository_model::where('id', '=', $repo_id)->first();
        /*$repo = DB::table('t_client_repository')
            ->where('client_id', '=', $client_id)
            ->where('id', '=', $repo_id)
            ->first();*/
        return $repo;
    }

    public function getCatalogRepo()
    {
        $catalogRepo = array();
        $array_tags = array();
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;
        //$lastViews = $this->ci->Viewebook_model::all();
        //$lastViews = $this->ci->Viewebook_model::leftjoin('t_ebooks', 't_ebooks.id', '=', 't_ebooks_views.ebook_id')
        $catalogRepo = DB::table('t_client_repository')
            ->where('client_id', '=', $client_id)
            ->distinct('t_client_repository.repo_tags')
            ->get();
        foreach ($catalogRepo as $tags) {
            if (isset($tags->repo_tags)) {
                if (str_contains($tags->repo_tags, ',')) {
                    $client_repo_tags = explode(',', $tags->repo_tags);
                    foreach ($client_repo_tags as $tag)
                        array_push($array_tags, $tag);
                } else {
                    array_push($array_tags, $tags->repo_tags);
                }
            }
        }
        $unique_array = array_unique($array_tags);

        return $unique_array;
    }
}
