<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- Importa el trait
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory, SoftDeletes;

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
