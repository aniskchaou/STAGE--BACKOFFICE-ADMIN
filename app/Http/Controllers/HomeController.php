<?php namespace App\Http\Controllers;
use App\Configuration;
use App\Stage;
use App\Encadreur;
use App\Offre_d_emploi; 
use App\Etudiant;
use App\Filiere;
use App\Stage_filiere;
use App\Stagiaire;
use App\Entreprise;
use App\Soutenance;
use App\Type_stage;
use App\Telecharger;

use App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()

	{
$Configuration=Configuration::find(1);
    $Telecharger=DB::table('telecharger')->orderBy('created_at', 'desc')->paginate(4);
    $Telecharger->setPath('home'); 

	 $NBSNT = DB::table('stage')->where('stage_status','En attente de vérification de contenue')->count();
      //$StNsEnAtt=DB::select('select count(*)"nb" from stage where (stage_status ="Valide") and (id not in (select stage_id from soutenance )) and ( type_id in( select id from type_stage WHERE type_soutenable="1" ))');
      $StNsEnAtt=0;
        $NbOffre = DB::table('offre_d_emploi')->where('emploi_status','En attente')->count();
      
      
      $Stage= DB::table('stage')
                    ->where('stage_status', '<>', 'En attente de vérification de contenue')
                    ->Where('stage_status', '<>', 'Archivé')
                    ->Where('stage_dete_fin', '>', date('Y-m-d'))->orderBy('created_at', 'desc')
                    ->paginate(4);
      $Type_stage =Type_stage::all();
      $Entreprise=Entreprise::all();
      $Stage->setPath('home');
      $Offre_d_emploi = DB::table('offre_d_emploi')
                    ->where('emploi_status', '<>', 'En attente')
                    ->Where('emploi_date_fin', '>', date('Y-m-d'))->orderBy('created_at', 'desc')
                    ->paginate(4);
      $Offre_d_emploi->setPath('home');          
	  return view('home')->with(array('Telecharger'=>$Telecharger,'Offre_d_emploi'=>$Offre_d_emploi,'Stage'=>$Stage,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise,'NbOffre'=>$NbOffre,'Cnf'=>$Configuration,'StNsEnAtt'=>$StNsEnAtt,'NBSNT'=>$NBSNT));
	}

}
