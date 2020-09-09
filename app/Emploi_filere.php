<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Emploi_filere extends Model {

	protected $table = 'emploi_filere';
	public $timestamps = false;
	protected $fillable = array('emploi_id', 'filiere_id');

}