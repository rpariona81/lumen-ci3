<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class Role_Model extends MY_Model
{
	protected $table = 't_roles';

	protected $fillable = [
		'rolename',
		'roledisplay',
        'guard_name'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */

    public function users()
    {
        return $this->belongsToMany(User_model::class, 't_role_user', 'role_id', 'user_id');
    }
}
