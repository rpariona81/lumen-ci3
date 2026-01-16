<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 't_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email', 
        'password', 
        'email_verified_at',
        'enabled',
        'client_id',
        'remember_token', //varchar
        'email_verified_at', //datetime
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $with = ['roles','client'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 't_role_user', 'user_id', 'role_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');  
    }
}
