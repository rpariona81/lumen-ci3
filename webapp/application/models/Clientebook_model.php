<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class Clientebook_Model extends MY_Model
{
	use HasFactory;

	protected $table = 't_client_ebook';

	protected $fillable = [
		'client_ebook_categories',
		'client_ebook_tags',
		'authorized',
		'client_id',
		'ebook_id'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */

	
}
