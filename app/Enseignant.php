<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model {

	protected $table = 'enseignant';
	public $timestamps = true;
	protected $fillable = array('enseig_code', 'enseig_prenom', 'enseig_nom', 'enseig_sexe', 'enseig_tel', 'enseig_mobile', 'enseig_adresse', 'enseig_grade_code', 'enseig_grade_nom','enseig_specialite_code','enseig_specialite_nom', 'enseig_status_code', 'enseig_status_nom', 'email', 'password', 'enseig_status');
	protected $hidden = array('password', 'rememberToken');

}