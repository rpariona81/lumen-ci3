<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $table = "t_careers";

    protected $fillable = [
        'career_name',
        'career_description',
        'career_code',
        'career_alias',
        'career_display',
        'career_related'
    ];

}
