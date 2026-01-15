<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;

class Session_Model extends MY_Model
{
    protected $table = 't_sessions';

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'last_activity',
        'payload',
        'is_logged_out'
    ];

    public $timestamps = false;

    //
    //protected $appends = ['expires_at'];
    
    /*
    public function isExpired(){
        return $this->last_activity < Carbon::now()->subMinutes(config('session.lifetime'))->getTimestamp();
    }
    */

    /*
    public function getExpiresAtAttribute(){
        return Carbon::createFromTimestamp($this->last_activity)->addMinutes(config('session.lifetime'))->toDateTimeString();
    }
    */

}