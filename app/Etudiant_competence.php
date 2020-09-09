<?php

namespace etudiant_competence;

use Illuminate\Database\Eloquent\Model;

class Etudiant_competence extends Model {

	protected $table = 'etudiant_competence';
	public $timestamps = false;
	protected $fillable = array('comp_id', 'etudiant_id', 'pr_competence');

}