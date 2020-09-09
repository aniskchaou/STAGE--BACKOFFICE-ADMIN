<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Soutenance extends Model {

	protected $table = 'soutenance';
	public $timestamps = true;
	protected $fillable = array('salle_id', 'stage_id', 'soute_date_debut', 'soute_date_fin');

}