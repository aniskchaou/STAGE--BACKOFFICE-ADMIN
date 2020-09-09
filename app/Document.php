<?php namespace App;



use Illuminate\Database\Eloquent\Model;

class Document extends Model {

	protected $table = 'document';
	public $timestamps = true;
	protected $fillable = array('type_stage_id', 'doc_type_id', 'filiere_id', 'doc_text');

}