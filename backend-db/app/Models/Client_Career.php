<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_Career extends Model
{
    use HasFactory;
    protected $table = "t_client_career";

    protected $fillable = [
        'client_career_name',
        'client_career_description',
        'client_career_display',
        'career_available',
        'client_id',
        'client_career_related'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
