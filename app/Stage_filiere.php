<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage_filiere extends Model {

	protected $table = 'stage_filiere';
	public $timestamps = false;
	protected $fillable = array('stage_id', 'filiere_id');

}