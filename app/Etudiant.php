<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model {

	protected $table = 'etudiant';
	public $timestamps = true;
	protected $fillable = array('etudiant_cin', 'etudiant_mat', 'etudiant_prenom', 'etudiant_nom', 'etudiant_sexe','etudiant_image', 'etudiant_date_nissance', 'etudiant_lieu_naissance', 'etudiant_rue', 'etudiant_ville', 'etudiant_region', 'etudiant_adresse', 'etudiant_tel', 'email', 'etudiant_rebouble', 'etudiant_moda', 'etudiant_filiere_id', 'etudiant_niveau', 'etudiant_group_code', 'etudiant_group_name', 'etudiant_status', 'password');
	protected $hidden = array('rememberToken', 'password');

	public function fliere()
	{
		return $this->belongsTo('Filiere');
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