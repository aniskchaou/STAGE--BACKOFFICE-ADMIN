<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tele_utilisateur extends Model {

	protected $table = 'tele_utilisateur';
	public $timestamps = false;
	protected $fillable = array('tele_id', 'utilisa_type');

}