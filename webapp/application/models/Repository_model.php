<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class Repository_Model extends MY_Model
{
	use HasFactory;
	
    protected $table = "t_client_repository";

    protected $fillable = [
        'client_id',
        'repo_title',
        'repo_display',
        'repo_type',
        'repo_format',
        'repo_author',
        'repo_editorial',
        'repo_year',
        'repo_pages',
        'repo_front_page',
        'repo_details',
        'repo_url',
        'repo_file',
        'repo_categories',
        'repo_tags'
    ]; 

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

}
