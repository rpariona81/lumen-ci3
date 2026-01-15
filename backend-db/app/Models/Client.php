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

    public function repositories()
    {
        return $this->hasMany(Repository::class,'client_id');
    }

    public function ebooks()
    {
        return $this->belongsToMany(Ebook::class, 't_client_ebook', 'client_id', 'ebook_id')
                    ->withPivot('authorized')
                    ->withTimestamps();
    }
}
