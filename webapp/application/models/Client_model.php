<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class Client_Model extends MY_Model
{
	use HasFactory;
	
	protected $table = 't_clients';

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

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */

    public function users()
    {
		return $this->hasMany(User_model::class,'client_id','id');
    }

	
    //protected $with = ['users'];

	/*public function getUsersClient($client_id = null)
	{
		try {
			$client = Client_model::join($id);
		} catch (\Throwable $th) {
			//throw $th;
		} Catch 
		
		return $client->users;
	}	*/
}
