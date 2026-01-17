<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class Ebook_Model extends MY_Model
{
    use HasFactory;
    
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
        'ebook_available',
        'catalog_id'
    ];

    protected $casts = [
        'ebook_available' => 'boolean',
        'updated_at' => 'datetime:Y-m-d'
    ];

    public function getFlagAttribute()
    {
        //return date_diff(date_create($this->date_vigency), date_create('now'))->d;
        //https://blog.devgenius.io/how-to-find-the-number-of-days-between-two-dates-in-php-1404748b1e84
        //return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');
        if ($this->ebook_available) {
            return 'Disponible';
        } else {
            return 'No disponible';
        }
    }

    public function clients()
    {
        return $this->belongsToMany(Client_model::class, 't_client_ebook', 'ebook_id', 'client_id')
                    ->withPivot('authorized')
                    ->withTimestamps();
    }

    public function catalog()
    {
        return $this->belongsTo(Catalog_model::class, 'catalog_id');
    }

    public static function getCantSearchEbooks($search_text, $client_id = null)
    {
        $query = Ebook_model::query();

        if (!empty($search_text)) {
            $query->where(function ($q) use ($search_text) {
                $q->where('ebook_title', 'LIKE', '%' . $search_text . '%')
                  ->orWhere('ebook_author', 'LIKE', '%' . $search_text . '%')
                  ->orWhere('ebook_editorial', 'LIKE', '%' . $search_text . '%')
                  ->orWhere('ebook_tags', 'LIKE', '%' . $search_text . '%')
                  ->andWhere('ebook_available', true);
            });
        }

        return $query->count();
    }   



}