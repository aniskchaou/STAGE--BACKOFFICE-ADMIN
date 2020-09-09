<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_stage extends Model {

	protected $table = 'type_stage';
	public $timestamps = false;
	protected $fillable = array('type_nom', 'type_dur_max', 'type_dur_min', 'type_encadreur', 'type_obligatoire', 'type_soutenable', 'type_nb_max', 'type_nb_min');

	public function stage()
	{
		return $this->hasMany('Stage');
	}

}