<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage_reservation extends Model {

	protected $table = 'stage_reservation';
	public $timestamps = true;
	protected $fillable = array('etudiant_id','stage_id', 'motivation', 'pre_affecte');

	public function stage()
	{
		return $this->belongsTo('Stage');
	}

	public function etudiant()
	{
		return $this->belongsTo('Etudiant');
	}

}