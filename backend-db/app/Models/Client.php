<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    //
    protected $table = 't_clients';
    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_ruc_uid',
        'client_email',
        'client_name',
        'client_logo',
        'client_verified_at',
        'client_display',
        'status',
        'client_date_license',
        'client_weburl'
    ];

    public function users()
    {
        return $this->hasMany(User::class,'client_id');
    }
}
