<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre_d_emploi extends Model {

	protected $table = 'offre_d_emploi';
	public $timestamps = true;
	protected $fillable = array('ent_id', 'emploi_titre', 'emploi_competence', 'emploi_date_fin', 'emploi_nbr', 'emploi_status');

	public function entreprise()
	{
		return $this->belongsTo('Entreprise');
	}

}