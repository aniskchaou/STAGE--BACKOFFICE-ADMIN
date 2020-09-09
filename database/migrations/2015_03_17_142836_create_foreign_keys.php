<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('entreprise', function(Blueprint $table) {
			$table->foreign('secteur_id')->references('id')->on('secteur')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('etudiant', function(Blueprint $table) {
			$table->foreign('etudiant_filiere_id')->references('id')->on('filiere')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('filiere', function(Blueprint $table) {
			$table->foreign('enseig_id')->references('id')->on('enseignant')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('stage', function(Blueprint $table) {
			$table->foreign('type_id')->references('id')->on('type_stage')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('stage', function(Blueprint $table) {
			$table->foreign('entreprise_id')->references('id')->on('entreprise')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('stage_reservation', function(Blueprint $table) {
			$table->foreign('etudiant_id')->references('id')->on('etudiant')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('stage_reservation', function(Blueprint $table) {
			$table->foreign('stage_id')->references('id')->on('stage')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('stagiaire', function(Blueprint $table) {
			$table->foreign('stage_id')->references('id')->on('stage')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('stagiaire', function(Blueprint $table) {
			$table->foreign('etudiant_id')->references('id')->on('etudiant')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('offre_d_emploi', function(Blueprint $table) {
			$table->foreign('ent_id')->references('id')->on('entreprise')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('emploi_filere', function(Blueprint $table) {
			$table->foreign('emploi_id')->references('id')->on('offre_d_emploi')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('emploi_filere', function(Blueprint $table) {
			$table->foreign('filiere_id')->references('id')->on('filiere')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('stage_filiere', function(Blueprint $table) {
			$table->foreign('stage_id')->references('id')->on('stage')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('stage_filiere', function(Blueprint $table) {
			$table->foreign('filiere_id')->references('id')->on('filiere')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('soutenance', function(Blueprint $table) {
			$table->foreign('salle_id')->references('id')->on('soutenance_salle')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('soutenance', function(Blueprint $table) {
			$table->foreign('stage_id')->references('id')->on('stage')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('salle_reserver', function(Blueprint $table) {
			$table->foreign('salle_id')->references('id')->on('soutenance_salle')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('soutenance_jury', function(Blueprint $table) {
			$table->foreign('soutenance_id')->references('id')->on('soutenance')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('soutenance_jury', function(Blueprint $table) {
			$table->foreign('enseig_id')->references('id')->on('enseignant')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('encadreur', function(Blueprint $table) {
			$table->foreign('stage_id')->references('id')->on('stage')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('encadreur', function(Blueprint $table) {
			$table->foreign('enseig_id')->references('id')->on('enseignant')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('participer', function(Blueprint $table) {
			$table->foreign('soutenance_id')->references('id')->on('soutenance')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('participer', function(Blueprint $table) {
			$table->foreign('enseig_id')->references('id')->on('enseignant')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tele_utilisateur', function(Blueprint $table) {
			$table->foreign('tele_id')->references('id')->on('telecharger')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('document', function(Blueprint $table) {
			$table->foreign('type_stage_id')->references('id')->on('type_stage')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('document', function(Blueprint $table) {
			$table->foreign('doc_type_id')->references('id')->on('type_document')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('document', function(Blueprint $table) {
			$table->foreign('filiere_id')->references('id')->on('filiere')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('competence_enseignant', function(Blueprint $table) {
			$table->foreign('comp_id')->references('id')->on('competence')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('competence_enseignant', function(Blueprint $table) {
			$table->foreign('enseig_id')->references('id')->on('enseignant')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('etudiant_competence', function(Blueprint $table) {
			$table->foreign('comp_id')->references('id')->on('competence')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('etudiant_competence', function(Blueprint $table) {
			$table->foreign('etudiant_id')->references('id')->on('etudiant')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('entreprise', function(Blueprint $table) {
			$table->dropForeign('entreprise_secteur_id_foreign');
		});
		Schema::table('etudiant', function(Blueprint $table) {
			$table->dropForeign('etudiant_etudiant_filiere_id_foreign');
		});
		Schema::table('filiere', function(Blueprint $table) {
			$table->dropForeign('filiere_enseig_id_foreign');
		});
		Schema::table('stage', function(Blueprint $table) {
			$table->dropForeign('stage_type_id_foreign');
		});
		Schema::table('stage', function(Blueprint $table) {
			$table->dropForeign('stage_entreprise_id_foreign');
		});
		Schema::table('stage_reservation', function(Blueprint $table) {
			$table->dropForeign('stage_reservation_etudiant_id_foreign');
		});
		Schema::table('stage_reservation', function(Blueprint $table) {
			$table->dropForeign('stage_reservation_stage_id_foreign');
		});
		Schema::table('stagiaire', function(Blueprint $table) {
			$table->dropForeign('stagiaire_stage_id_foreign');
		});
		Schema::table('stagiaire', function(Blueprint $table) {
			$table->dropForeign('stagiaire_etudiant_id_foreign');
		});
		Schema::table('offre_d_emploi', function(Blueprint $table) {
			$table->dropForeign('offre_d_emploi_ent_id_foreign');
		});
		Schema::table('emploi_filere', function(Blueprint $table) {
			$table->dropForeign('emploi_filere_emploi_id_foreign');
		});
		Schema::table('emploi_filere', function(Blueprint $table) {
			$table->dropForeign('emploi_filere_filiere_id_foreign');
		});
		Schema::table('stage_filiere', function(Blueprint $table) {
			$table->dropForeign('stage_filiere_stage_id_foreign');
		});
		Schema::table('stage_filiere', function(Blueprint $table) {
			$table->dropForeign('stage_filiere_filiere_id_foreign');
		});
		Schema::table('soutenance', function(Blueprint $table) {
			$table->dropForeign('soutenance_salle_id_foreign');
		});
		Schema::table('soutenance', function(Blueprint $table) {
			$table->dropForeign('soutenance_stage_id_foreign');
		});
		Schema::table('salle_reserver', function(Blueprint $table) {
			$table->dropForeign('salle_reserver_salle_id_foreign');
		});
		Schema::table('soutenance_jury', function(Blueprint $table) {
			$table->dropForeign('soutenance_jury_soutenance_id_foreign');
		});
		Schema::table('soutenance_jury', function(Blueprint $table) {
			$table->dropForeign('soutenance_jury_enseig_id_foreign');
		});
		Schema::table('encadreur', function(Blueprint $table) {
			$table->dropForeign('encadreur_stage_id_foreign');
		});
		Schema::table('encadreur', function(Blueprint $table) {
			$table->dropForeign('encadreur_enseig_id_foreign');
		});
		Schema::table('participer', function(Blueprint $table) {
			$table->dropForeign('participer_soutenance_id_foreign');
		});
		Schema::table('participer', function(Blueprint $table) {
			$table->dropForeign('participer_enseig_id_foreign');
		});
		Schema::table('tele_utilisateur', function(Blueprint $table) {
			$table->dropForeign('tele_utilisateur_tele_id_foreign');
		});
		Schema::table('document', function(Blueprint $table) {
			$table->dropForeign('document_type_stage_id_foreign');
		});
		Schema::table('document', function(Blueprint $table) {
			$table->dropForeign('document_doc_type_id_foreign');
		});
		Schema::table('document', function(Blueprint $table) {
			$table->dropForeign('document_filiere_id_foreign');
		});
		Schema::table('competence_enseignant', function(Blueprint $table) {
			$table->dropForeign('competence_enseignant_comp_id_foreign');
		});
		Schema::table('competence_enseignant', function(Blueprint $table) {
			$table->dropForeign('competence_enseignant_enseig_id_foreign');
		});
		Schema::table('etudiant_competence', function(Blueprint $table) {
			$table->dropForeign('etudiant_competence_comp_id_foreign');
		});
		Schema::table('etudiant_competence', function(Blueprint $table) {
			$table->dropForeign('etudiant_competence_etudiant_id_foreign');
		});
	}
}