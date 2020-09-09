<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Salle_reserver extends Model {

	protected $table = 'salle_reserver';
	public $timestamps = false;
	protected $fillable = array('salle_id', 'date_debut', 'date_fin');

}