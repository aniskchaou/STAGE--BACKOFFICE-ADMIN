<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Telecharger extends Model {

	protected $table = 'telecharger';
	public $timestamps = true;
	protected $fillable = array('tele_nom', 'tele_ficher');

}