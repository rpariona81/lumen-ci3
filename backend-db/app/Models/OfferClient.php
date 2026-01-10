<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferClient extends Model
{
    use HasFactory;

    protected $table = "t_offer_clients";

    protected $fillable = [
        'client_id',
        'career_offered',
        'level_offered',
        'career_timeframe',
        'career_related'
    ]; 

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id');
    }
}
