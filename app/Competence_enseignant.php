<?php

namespace competence_enseignant;

use Illuminate\Database\Eloquent\Model;

class Competence_enseignant extends Model {

	protected $table = 'competence_enseignant';
	public $timestamps = false;
	protected $fillable = array('comp_id', 'enseig_id', 'pr_competence');

}