<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class Catalog_Model extends MY_Model
{
	use HasFactory;
	
	protected $table = 't_catalogs';

	protected $fillable = [
		'catalog_name',
		'catalog_alias',
        'catalog_display',
		'catalog_ico'
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
