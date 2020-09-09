<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model {

	protected $table = 'entreprise';
	public $timestamps = true;
	protected $fillable = array('ent_nom', 'ent_statut_juridique', 'secteur_id', 'ent_nbr', 'ent_adresse', 'ent_pays', 'ent_ville', 'ent_fax', 'ent_tel', 'ent_web', 'email', 'password', 'ent_status');
	protected $hidden = array('password', 'rememberToken');

	public function stage()
	{
		return $this->hasMany('Stage');
	}

	public function secteur()
	{
		return $this->belongsTo('Secteur');
	}

	public function offre_d_emploi()
	{
		return $this->hasMany('Offre_d_emploi');
	}

}