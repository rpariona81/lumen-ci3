<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class User_Model extends MY_Model
{
    use HasFactory;
    
    protected $table = 't_users';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'enabled',
        'remember_token', //varchar
        'email_verified_at', //datetime
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'lock' => 'boolean',
        'enabled' => 'boolean',
        'row' => 'integer',
        'id' => 'integer'
    ];

    //protected $with = ['roles'];

    public function roles()
    {
        return $this->belongsToMany(Role_model::class, 't_role_user', 'user_id', 'role_id');
    }

    public function hasRole($roleName)
    {
        return $this->roles()->where('rolename', $roleName)->exists();
    }

    public function client()
    {
        return $this->belongsTo(Client_Model::class, 'client_id', 'id');  
    }
    
    protected $appends = ['userflag'];

    // Carbon instance fields
    protected $dates = ['created_at', 'updated_at'];

    public function getUserflagAttribute()
    {
        //return date_diff(date_create($this->date_vigency), date_create('now'))->d;
        //https://blog.devgenius.io/how-to-find-the-number-of-days-between-two-dates-in-php-1404748b1e84
        //return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');
        if ($this->enabled > 0) {
            return 'Activo';
        } else {
            return 'Suspendido';
        }
    }

    public static function getListStatusUsers()
    {
        $opcionesStatus = array();
        $opcionesStatus[NULL] = 'Seleccione condición';
        $opcionesStatus[1] = 'Activo';
        $opcionesStatus[0] = 'Suspendido';

        return $opcionesStatus;
    }

    public function getLockAttribute()
    {
        //return date_diff(date_create($this->date_vigency), date_create('now'))->d;
        //https://blog.devgenius.io/how-to-find-the-number-of-days-between-two-dates-in-php-1404748b1e84
        //return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');
        if ($this->user_type == 1) {
            return 1;
        } else {
            return 0;
        }
    }


    /**
     * Selecciona un usuario por algun campo y valor
     *
     * @param string $column
     * @param string|integer $value
     * @return User
     */
    public static function getUserBy($column, $value)
    {
        return User_Model::leftjoin('t_role_user', 't_role_user.user_id', '=', 't_users.id')
            ->leftjoin('t_roles', 't_role_user.role_id', '=', 't_roles.id')
            ->select('t_users.*', 't_role_user.role_id', 't_roles.rolename')
            ->where($column, '=', $value)->first();
    }

    public static function enableUser($request)
    {
        try {
            $model = User_Model::findOrFail($request['id']);
            $model->enabled = 1;
            $model->updated_at = Carbon::now();
            $model->save();
            return $model;
        } catch (ModelNotFoundException $e) {
            //throw $th;
            return FALSE;
        }
    }

    public static function disableUser($request)
    {
        try {
            $model = User_Model::findOrFail($request['id']);
            $model->enabled = 0;
            $model->updated_at = Carbon::now();
            $model->save();
            return $model;
        } catch (ModelNotFoundException $e) {
            //throw $th;
            return FALSE;
        }
    }

    public static function countRecords()
    {
        $model_count = User_Model::count();
        return $model_count;
    }

    

}