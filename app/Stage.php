<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model {

	protected $table = 'stage';
	public $timestamps = true;
	protected $fillable = array('stage_status', 'type_id', 'entreprise_id','stage_book','stage_title', 'stage_dete_debut','stage_dete_fin', 'stage_nbr_etudiant', 'stage_sujet', 'stage_annee_universitaire', 'stage_encadreur_s');

	public function type_stage()
	{
		return $this->belongsTo('Type_stage');
	}

	public function entreprise()
	{
		return $this->belongsTo('Entreprise');
	}

	public function stage_reservation()
	{
		return $this->hasMany('Stage_reservation');
	}

	public function stagiaire()
	{
		return $this->hasMany('Stagiaire');
	}

}