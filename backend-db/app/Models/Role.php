<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 't_roles';
    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rolename',
        'roledisplay',
        'guard_name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 't_role_user', 'role_id', 'user_id');
    }

}
