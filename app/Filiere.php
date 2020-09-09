<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model {

	protected $table = 'filiere';
	public $timestamps = false;
	protected $fillable = array('filiere_nom', 'enseig_id');

	public function etudiant()
	{
		return $this->hasMany('Etudiant');
	}

}