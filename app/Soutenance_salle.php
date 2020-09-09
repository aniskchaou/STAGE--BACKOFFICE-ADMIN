<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Soutenance_salle extends Model {

	protected $table = 'soutenance_salle';
	public $timestamps = false;
	protected $fillable = array('salle_nom', 'salle_nb_plase','salle_status');

}