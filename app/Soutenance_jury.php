<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Soutenance_jury extends Model {

	protected $table = 'soutenance_jury';
	public $timestamps = true;
	protected $fillable = array('soutenance_id', 'enseig_id', 'qualite_id');

}