<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class Ebook_Model extends MY_Model
{
	protected $table = "t_ebooks";

    protected $fillable = [
        'ebook_code',
        'ebook_isbn',
        'ebook_title',
        'ebook_alias',
        'ebook_display',
        'ebook_type',
        'ebook_format',
        'ebook_author',
        'ebook_editorial',
        'ebook_year',
        'ebook_pages',
        'ebook_front_page',
        'ebook_details',
        'ebook_url',
        'ebook_file',
        'ebook_categories',
        'ebook_tags',
        'ebook_available'
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 't_client_ebook', 'ebook_id', 'client_id')
                    ->withPivot('authorized')
                    ->withTimestamps();
    }

}