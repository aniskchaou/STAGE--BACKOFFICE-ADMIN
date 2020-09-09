<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Encadreur extends Model {

	protected $table = 'encadreur';
	public $timestamps = true;
	protected $fillable = array('stage_id', 'enseig_id');

}