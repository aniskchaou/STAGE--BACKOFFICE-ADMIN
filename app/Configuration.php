<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model {

	protected $table = 'configuration';
	public $timestamps = true;
	protected $fillable = array('nomdusite', 
		                         'email', 
		                         'abr_institut', 
		                         'anne_universitaire', 
		                         'appelation_enseignant', 
		                         'soutenance_dur_max', 
		                         'pr_reservation', 
		                         'lon_nom_org', 
		                         'lon_sta_juridi', 
		                         'lon_max_email', 
		                         'lon_max_adrese', 
		                         'lon_max_site_web', 
		                         'lon_max_pwd', 
		                         'temps_redirection', 
		                         'nbr_elemont', 
		                         'type_lien', 
		                         'mois_deb_anne', 
		                         'introdu');

}
