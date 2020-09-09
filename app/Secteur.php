<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Secteur extends Model {

	protected $table = 'secteur';
	public $timestamps = false;
	protected $fillable = array('secteur_nom');

	public function entreprise()
	{
		return $this->hasMany('Entreprise');
	}

}