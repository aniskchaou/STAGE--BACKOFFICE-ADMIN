<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	protected $table = 'contact';
	public $timestamps = true;
	protected $fillable = array('contact_nom', 'contact_email', 'contact_tel', 'contact_pays', 'contact_ville', 'contact_sujet', 'contact_message');

}