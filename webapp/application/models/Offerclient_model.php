<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class OfferClient_Model extends MY_Model
{
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