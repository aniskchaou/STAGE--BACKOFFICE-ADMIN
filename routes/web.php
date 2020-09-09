<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');
/*
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/
//Auth::routes(['reset' => false, 'verify' => false]);
/*Route::match(['get', 'post'], 'register', function(){
    return redirect('/home');
});*/


Route::get('entreprise/desactiver/{id}', ['as' => 'entreprise.desactiver', 'uses' => 'EntrepriseController@desactiver']);
Route::get('entreprise/activer/{id}', ['as' => 'entreprise.activer', 'uses' => 'EntrepriseController@activer']);
Route::resource('entreprise', 'EntrepriseController');
Route::get('enseignant/desactiver/{id}', ['as' => 'enseignant.desactiver', 'uses' => 'EnseignantController@desactiver']);
Route::get('enseignant/activer/{id}', ['as' => 'enseignant.activer', 'uses' => 'EnseignantController@activer']);
Route::resource('enseignant', 'EnseignantController');


Route::get('etudiant/desactiver/{id}', ['as' => 'etudiant.desactiver', 'uses' => 'EtudiantController@desactiver']);
Route::get('etudiant/activer/{id}', ['as' => 'etudiant.activer', 'uses' => 'EtudiantController@activer']);


Route::post('etudiant/etudiantImage/{id}', ['as' => 'etudiant.etudiantImage', 'uses' => 'EtudiantController@etudiantImage']);
Route::resource('etudiant', 'EtudiantController');
Route::resource('filiere', 'FiliereController');







Route::get('stage/stageEnAttente', ['as' => 'stage.stageEnAttente', 'uses' => 'StageController@stageEnAttente']);
Route::get('stage/stagesLibre', ['as' => 'stage.stagesLibre', 'uses' => 'StageController@stagesLibre']);
Route::get('stage/stageEnCours', ['as' => 'stage.stageEnCours', 'uses' => 'StageController@stageEnCours']);
Route::get('stage/avecEncadreur', ['as' => 'stage.avecEncadreur', 'uses' => 'StageController@avecEncadreur']);
Route::get('stage/sansEncadreur', ['as' => 'stage.sansEncadreur', 'uses' => 'StageController@sansEncadreur']);
Route::get('stage/stageAvecAffec', ['as' => 'stage.stageAvecAffec', 'uses' => 'StageController@stageAvecAffec']);
Route::get('stage/stageSansAffec', ['as' => 'stage.stageSansAffec', 'uses' => 'StageController@stageSansAffec']);


Route::post('stage/imprimer', ['as' => 'stage.imprimer', 'uses' => 'StageController@imprimer']);
Route::get('stage/imprimerStage', ['as' => 'stage.imprimerStage', 'uses' => 'StageController@imprimerStage']);

Route::resource('stage', 'StageController');
Route::resource('type_stage', 'Type_stageController');



Route::get('user/modifEmail/{id}', ['as' => 'user.modifEmail', 'uses' => 'UserController@modifEmail']);

Route::get('user/modifMotPasse/{id}', ['as' => 'user.modifMotPasse', 'uses' => 'UserController@modifMotPasse']);
Route::post('user/modifierMotPasse/{id}', ['as' => 'user.modifierMotPasse', 'uses' => 'UserController@modifierMotPasse']);
Route::post('user/ModifierEmail/{id}', ['as' => 'user.ModifierEmail', 'uses' => 'UserController@ModifierEmail']);

Route::resource('user', 'UserController');

Route::resource('admin', 'AdminController');


Route::resource('stage_reservation', 'Stage_reservationController');

Route::post('stagiaire/affecterEt/{id}', ['as' => 'stagiaire.affecterRt', 'uses' => 'StagiaireController@affecterEt']);
Route::post('stagiaire/supprimer/{id}', ['as' => 'stagiaire.supprimer', 'uses' => 'StagiaireController@supprimer']);

Route::get('stagiaire/affecter/{id}', ['as' => 'stagiaire.affecter', 'uses' => 'StagiaireController@affecter']);

Route::resource('stagiaire', 'StagiaireController');

Route::get('offre_d_emploi/emploiCorbeille', ['as' => 'offre_d_emploi.emploiCorbeille', 'uses' => 'Offre_d_emploiController@emploiCorbeille']);
Route::get('offre_d_emploi/emploiEnAttente', ['as' => 'offre_d_emploi.emploiEnAttente', 'uses' => 'Offre_d_emploiController@emploiEnAttente']);
Route::resource('offre_d_emploi', 'Offre_d_emploiController');
Route::resource('emploi_filere', 'Emploi_filereController');
Route::resource('stage_filiere', 'Stage_filiereController');

/*Route::post*/

Route::get('soutenance_salle/desactiver/{id}', ['as' => 'soutenance_salle.desactiver', 'uses' => 'Soutenance_salleController@desactiver']);
Route::get('soutenance_salle/activer/{id}', ['as' => 'soutenance_salle.activer', 'uses' => 'Soutenance_salleController@activer']);


Route::resource('soutenance_salle', 'Soutenance_salleController');

Route::post('soutenance/imprimer', ['as' => 'soutenance.imprimer', 'uses' => 'SoutenanceController@imprimer']);
Route::get('soutenance/imprimerPfe', ['as' => 'soutenance.imprimerPfe', 'uses' => 'SoutenanceController@imprimerPfe']);
Route::get('soutenance/historiqueSoute', ['as' => 'soutenance.historiqueSoute', 'uses' => 'SoutenanceController@historiqueSoute']);
Route::get('soutenance/souteNonPlanifie', ['as' => 'soutenance.souteNonPlanifie', 'uses' => 'SoutenanceController@souteNonPlanifie']);
Route::get('soutenance/organiserSoutenanc/{id}', ['as' => 'soutenance.organiserSoutenanc', 'uses' => 'SoutenanceController@organiserSoutenanc']);
Route::post('soutenance/dateSoutenance/{id}', ['as' => 'soutenance.dateSoutenance', 'uses' => 'SoutenanceController@dateSoutenance']);
Route::post('soutenance/enregSoutenance/{id}', ['as' => 'soutenance.enregSoutenance', 'uses' => 'SoutenanceController@enregSoutenance']);
Route::resource('soutenance', 'SoutenanceController');
Route::resource('salle_reserver', 'Salle_reserverController');
Route::resource('soutenance_jury', 'Soutenance_juryController');

Route::post('encadreur/affecterEn/{id}', ['as' => 'encadreur.affecterEn', 'uses' => 'EncadreurController@affecterEn']);
Route::get('encadreur/affecter/{id}', ['as' => 'encadreur.affecter', 'uses' => 'EncadreurController@affecter']);

Route::resource('encadreur', 'EncadreurController');
Route::resource('participer', 'ParticiperController');



Route::get('telecharger/consulter', ['as' => 'telecharger.consulter', 'uses' => 'TelechargerController@consulter']);
Route::resource('telecharger', 'TelechargerController');
Route::resource('tele_utilisateur', 'Tele_utilisateurController');
Route::resource('type_document', 'Type_documentController');
Route::resource('document', 'DocumentController');
Route::resource('competence', 'CompetenceController');
Route::resource('competence_enseignant', 'Competence_enseignantController');
Route::resource('etudiant_competence', 'Etudiant_competenceController');
Route::resource('contact', 'ContactController');
Route::resource('secteur', 'SecteurController');
Route::resource('configuration', 'ConfigurationController');



