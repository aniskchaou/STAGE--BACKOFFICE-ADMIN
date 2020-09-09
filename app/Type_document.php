<?php

namespace type_document;

use Illuminate\Database\Eloquent\Model;

class Type_document extends Model {

	protected $table = 'type_document';
	public $timestamps = true;
	protected $fillable = array('doc_type_nom', 'etat_dispo', 'etat_indispo');

}