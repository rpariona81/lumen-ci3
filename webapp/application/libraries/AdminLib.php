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

        $users = $this->ci->User_model::with('roles')
            ->where('client_id', '=', $client_id)
            ->where('enabled', '=', true)
            ->where('roles[0]["guard_name"]','=','user')
            ->get();

        return $users;
    }

    public function getRequests()
    {
        $users = array();
        $client_id = $this->ci->session->userdata('Client') ? $this->ci->Client_model->where('client_name', $this->ci->session->userdata('Client'))->first()->id : null;

        $users = $this->ci->User_model::with('roles')
            ->where('client_id', '=', $client_id)
            ->where('enabled', '=', false)
            ->get();

        return $users;
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
}
