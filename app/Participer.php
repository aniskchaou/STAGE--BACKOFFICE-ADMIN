<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Participer extends Model {

	protected $table = 'participer';
	public $timestamps = false;
	protected $fillable = array('soutenance_id', 'enseig_id');

}