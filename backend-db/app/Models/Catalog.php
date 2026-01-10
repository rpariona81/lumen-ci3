<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    protected $table = "t_catalogs";

    protected $fillable = [
        'catalog_name',
        'catalog_alias',
        'catalog_display',
        'catalog_ico'
    ];

    
}
