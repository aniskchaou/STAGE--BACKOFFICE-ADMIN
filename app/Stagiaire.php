<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model {

	protected $table = 'stagiaire';
	public $timestamps = true;
	protected $fillable = array('stage_id','appreciation', 'etudiant_id', 'grade', 'valide', 'moyenne','assurance_code','assurance_nom');

	public function stage()
	{
		return $this->belongsTo('Stage');
	}

	public function etudiant()
	{
		return $this->belongsTo('Etudiant');
	}

}