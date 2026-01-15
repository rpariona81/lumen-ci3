<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class Career_Model extends MY_Model
{
    use HasFactory;
    
	protected $table = 't_careers';

	protected $fillable = [
		'career_name',
        'career_description',
        'career_code',
        'career_alias',
        'career_display',
        'career_related'
	];

	
}
