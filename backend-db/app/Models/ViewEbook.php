<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewEbook extends Model
{
    //
    use HasFactory;

    protected $table = 't_ebooks_views';
    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'ebook_id',
        'user_id',
        'viewed'
    ];
}
