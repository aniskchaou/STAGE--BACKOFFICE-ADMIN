<?php namespace App\Http\Controllers;
use App\Soutenance;
use App\Stage;
use App\Encadreur;
use App\Etudiant;
use App\Filiere;
use App\Stage_filiere;
use App\Soutenance_salle;
use App\Soutenance_jury;
use App\Stagiaire;
use App\Configuration;
use App\Entreprise;
use App\Type_stage;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Salle_reserver;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;



class SoutenanceController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */

    public function imprimerPfe()
  {
    $Type_stage =Type_stage::all();
    $Filiere=Filiere::all();
    $an=date("Y");
    $Anner = array((($an-4).'-'.($an-3)),(($an-3).'-'.($an-2)), (($an-2).'-'.($an-1)), (($an-1).'-'.($an)), (($an).'-'.($an+1)), (($an+1).'-'.($an+2)), (($an+2).'-'.($an+3)) );
    return view('Soutenance.ImprimerPfe')->with(array('Anner'=>$Anner,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage ));
  }



     public function imprimer(Request $request)
  {
     $v = Validator::make($request->all(), [
        'filiere'=> 'required', 
        'types'=> 'required',
        'anner'=> 'required', 
        'niveau'=> 'required',

    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
    $Ifiliere =$request->get('filiere');
    $Iniveau = $request->get('niveau');
    $Itypes =$request->get('types');
    $Ianner =$request->get('anner');
   

    $Stage=DB::select('select so.id as idSout, salle_id, stage_id, soute_date_debut,st.id, type_id , entreprise_id,stage_title,stage_encadreur_s,salle_nom,stage_annee_universitaire 
                     from stage st , soutenance so,soutenance_salle sa 
                     where st.id = so.stage_id and so.salle_id = sa.id and st.stage_annee_universitaire="'.$Ianner.'"');
    $jury=DB::select('select en.id,soutenance_id, qualite_id ,enseig_prenom, enseig_nom 
                      from enseignant en , soutenance_jury jr 
                      where en.id = jr.enseig_id');
   
    $Encadreur = DB::select('select * from encadreur e 
                             where e.stage_id in( select id from stage where (stage_status =\'Valide\') and (id  in (select stage_id from soutenance )) and ( type_id in( select id from type_stage WHERE type_soutenable=\'1\' )))');
    $Enseignant = DB::select('select * from enseignant where (id in (select enseig_id from encadreur e where (e.stage_id in(select id from stage where (stage_status =\'Valide\') and (id  in (select stage_id from soutenance ))and ( type_id in( select id from type_stage WHERE type_soutenable=\'1\' )) )) ))');
    $Filiere = Filiere::find($Ifiliere);
    $Type_stage =Type_stage::find($Itypes);
    $Entreprise=Entreprise::all();
    $Etudiant=DB::select('select e.id, etudiant_cin, etudiant_prenom, etudiant_nom, s.stage_id
                          from etudiant e , stagiaire s where e.id =s.etudiant_id and
                          etudiant_filiere_id ="'.$Ifiliere.'" and etudiant_niveau ="'.$Iniveau.'" 
                          and (stage_id in (select st.id from stage st  where st.type_id ="'.$Itypes.'"  
                          and st.stage_annee_universitaire="'.$Ianner.'" and (st.id in ( select so.stage_id  from soutenance so ) ) )) ');
   
    $Stagiaire =Stagiaire::all();
   
    return view('Soutenance.ImprimerListPfe')->with(array('Ianner'=>$Ianner,'Enseignant'=>$Enseignant,'Encadreur'=>$Encadreur,'jury'=>$jury,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));
  }








  public function index()
  { $Stage=DB::select('select so.id as idSout, salle_id, stage_id, soute_date_debut,st.id, type_id , entreprise_id,stage_title,stage_encadreur_s,salle_nom,stage_annee_universitaire from stage st , soutenance so,soutenance_salle sa where st.id = so.stage_id and so.salle_id = sa.id ');
    $jury=DB::select('select en.id,soutenance_id, qualite_id ,enseig_prenom, enseig_nom 
                      from enseignant en , soutenance_jury jr 
                      where en.id = jr.enseig_id');
    $Encadreur = DB::select('select * from encadreur e 
                             where e.stage_id in( select id from stage where (stage_status =\'Valide\') and (id  in (select stage_id from soutenance )) and ( type_id in( select id from type_stage WHERE type_soutenable=\'1\' )))');
    $Enseignant = DB::select('select * from enseignant where (id in (select enseig_id from encadreur e where (e.stage_id in(select id from stage where (stage_status =\'Valide\') and (id  in (select stage_id from soutenance ))and ( type_id in( select id from type_stage WHERE type_soutenable=\'1\' )) )) ))');
    $Filiere = Filiere::all();
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
    $Etudiant=Etudiant::all();
    $Filiere=Filiere::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere=Stage_filiere::all();
    return view('Soutenance.soutePlanifie')->with(array('Enseignant'=>$Enseignant,'Encadreur'=>$Encadreur,'jury'=>$jury,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Filiere'=>$Filiere,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise )); 
  }

 public function historiqueSoute()
  {$Stage=DB::select('select so.id as idSout, salle_id, stage_id, soute_date_debut,st.id, type_id , entreprise_id,stage_title,stage_encadreur_s,salle_nom,stage_annee_universitaire from stage st , soutenance so,soutenance_salle sa where st.id = so.stage_id and so.salle_id = sa.id ');
    $jury=DB::select('select en.id,soutenance_id, qualite_id ,enseig_prenom, enseig_nom 
                      from enseignant en , soutenance_jury jr 
                      where en.id = jr.enseig_id');
    $Encadreur = DB::select('select * from encadreur e where stage_id in( select id from stage where (stage_status =\'Valide\') and (id in (select stage_id from soutenance )) and ( type_id in( select id from type_stage WHERE type_soutenable=\'1\' )))');
    $Enseignant = DB::select('select * from enseignant where (id in (select enseig_id from encadreur e where (e.stage_id in(select id from stage where (stage_status =\'Valide\') and (id  in (select stage_id from soutenance ))and ( type_id in( select id from type_stage WHERE type_soutenable=\'1\')) )) ))');
    $Filiere = Filiere::all();
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
    $Etudiant=Etudiant::all();
    $Filiere=Filiere::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere=Stage_filiere::all();
        $an=date("Y");
    $Anner = array((($an-4).'-'.($an-3)),(($an-3).'-'.($an-2)), (($an-2).'-'.($an-1)), (($an-1).'-'.($an)), (($an).'-'.($an+1)), (($an+1).'-'.($an+2)), (($an+2).'-'.($an+3)) );
    return view('Soutenance.HistoriqueSoute')->with(array('Anner'=>$Anner,'Enseignant'=>$Enseignant,'Encadreur'=>$Encadreur,'jury'=>$jury,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Filiere'=>$Filiere,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise )); 
  
    
  }








         
    public function souteNonPlanifie()
  {
    $Stage=DB::select('select * from stage where (stage_status =\'Valide\') and (id not in (select stage_id from soutenance )) and ( type_id in( select id from type_stage WHERE type_soutenable=\'1\' ))');
    $Enseignant = DB::select('select * from enseignant where (id in (select enseig_id from encadreur e where (e.stage_id in(select id from stage where (stage_status =\'Valide\') and (id not in (select stage_id from soutenance ))and ( type_id in( select id from type_stage WHERE type_soutenable=\'1\' )) )) ))');
    $Encadreur = DB::select('select * from encadreur e where e.stage_id in( select id from stage where (stage_status =\'Valide\') and (id not in (select stage_id from soutenance )) and ( type_id in( select id from type_stage WHERE type_soutenable=\'1\' )))');
    $Filiere = Filiere::all();
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
    $Etudiant=Etudiant::all();
    $Filiere=Filiere::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere=Stage_filiere::all();
      $an=date("Y");
    $Anner = array((($an-4).'-'.($an-3)),(($an-3).'-'.($an-2)), (($an-2).'-'.($an-1)), (($an-1).'-'.($an)), (($an).'-'.($an+1)), (($an+1).'-'.($an+2)), (($an+2).'-'.($an+3)) );
    return view('Soutenance.souteNonPlanifie')->with(array('Anner'=>$Anner,'Encadreur'=>$Encadreur,'Enseignant'=>$Enseignant,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Filiere'=>$Filiere,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));

  }

 public function organiserSoutenanc($id)
  {    $Enseignant = DB::select('select * from enseignant where (id in (select enseig_id from encadreur e where e.stage_id =\''.$id.'\'))');
    $Encadreur = DB::select('select * from encadreur e where e.stage_id =\''.$id.'\'');
   
    $Stage=Stage::find($id);
    $Filiere = Filiere::all();
   
  
    $Etudiant=Etudiant::all();
    $Filiere=Filiere::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere = DB::table('stage_filiere')->where('stage_id',$id)->get(); 
    return view('Soutenance.organiserSoutenance')->with(array('Encadreur'=>$Encadreur,'Enseignant'=>$Enseignant,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Filiere'=>$Filiere,'Stage'=>$Stage,'Filiere'=>$Filiere, 'res'=>0));  

  }


  
   public function dateSoutenance($id,Request $request)
  {
     $v = Validator::make($request->all(), [
        'datet'=> 'required|date', 
        'duree'=> 'required|regex:/^[0-9]{2}:[0-9]{2}$/'

    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }

  $datet=$request->get('datet');
  $duree=$request->get('duree');

$datet=$datet.':00';
$xp = explode(":",$duree);

$Configuration=Configuration::find(1);
$Pose=6;

$datefin = date("Y-m-d H:i:s", strtotime("+".$xp[0]." hour", strtotime($datet)));
$datefin = date("Y-m-d H:i:s", strtotime("+".$xp[1]." minute", strtotime($datefin)));
$datefinEn=date("Y-m-d H:i:s", strtotime("+".$Pose." minute", strtotime($datefin)));
$Hdet= date("H:i:s", strtotime($datet));
$H = explode(":",$Hdet);
$test =0;

 if($H[0]<8||$H[0]>18 )
     { $v->errors()->add('error', 'la soutenance doit étre organisé entre de 8 heure et 18 heure');
       $test =1;
     }

 if( intval(strtotime($datet))< intval(strtotime(date('Y-m-d ').'23:59:59')))
     { $v->errors()->add('error', 'Le champ Date et heure de début doit avoir une date supérieur à la date d\'aujourd');
       $test =1;
     }
  if( intval($xp[0])==00  and intval($xp[1])<10)
     { $v->errors()->add('errore', 'le temps minimum d\'une soutenance 10 minutes');
       $test =1;
     }
if( $test ==1)
 { return redirect()->back()->withErrors($v->errors())->withInput();
 }
 $Soutenance_salle = DB::select('select * from  soutenance_salle where id not in (select salle_id from salle_reserver where (date_debut >=\' '.$datet.'\' and date_debut < \''.$datefin.'\' ) 
  or (date_fin >= \' '.$datet.'\' and date_fin < \''.$datefin.'\') )');
   
   $Enseignant = DB::select('select * from enseignant where (id in (select enseig_id from encadreur e where e.stage_id ='.$id.'))');
    $Encadreur = DB::select('select * from encadreur e where e.stage_id ='.$id.'');
   
   $jury = DB::select('select * from enseignant where (id not in (select enseig_id from encadreur e where e.stage_id ='.$id.')) and id not in (select enseig_id from soutenance_jury where soutenance_id in(select id from soutenance where (soute_date_debut >= \''.$datet.'\' and soute_date_debut<\''.$datefinEn.'\' ) 
    or (soute_date_fin >= \''.$datet.'\' and soute_date_fin<\''.$datefinEn.'\')))');
    
    $Stage=Stage::find($id);
    $Filiere = Filiere::all();
   
   $specialite= DB::select('SELECT DISTINCT enseig_specialite_nom FROM enseignant WHERE enseig_specialite_nom  <>\'\'');
    $Etudiant=Etudiant::all();
    
    $Stagiaire =Stagiaire::all();
    $Stage_filiere = DB::table('stage_filiere')->where('stage_id',$id)->get(); 
    return view('Soutenance.organiserSoutenance')->with(array('specialite'=>$specialite,'datefinEn'=>$datefinEn,'jury'=>$jury,'duree'=>$duree,'datet'=>$datet, 'datefin'=>$datefin,'Soutenance_salle'=>$Soutenance_salle,'Encadreur'=>$Encadreur,'Enseignant'=>$Enseignant,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Filiere'=>$Filiere,'Stage'=>$Stage, 'res'=>1));  

  
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */



 public function enregSoutenance($id,Request $request)
  {

   $datet= $request->get('datedebut');
   $datefin=$request->get('datefin');
   $datefinEn=$request->get('datefinEn');

     $Soutenance_salle = DB::select('select * from  soutenance_salle where id not in (select salle_id from salle_reserver 
      where (date_debut >= \''.$datet.'\' and date_debut< \''.$datefin.'\' ) or (date_fin > \''.$datet.'\' and date_fin <\''.$datefin.'\') )');
      $jury = DB::select('select * from enseignant where (id not in (select enseig_id from encadreur e where e.stage_id ='.$id.')) 
        and id not in (select enseig_id from soutenance_jury where soutenance_id 
          in(select id from soutenance where (soute_date_debut > \''.$datet.'\' and soute_date_debut<\''.$datefinEn.'\' ) 
            or (soute_date_fin > \''.$datet.'\' and soute_date_fin< \''.$datefinEn.'\')))');
    $idSalle=0;
foreach( $Soutenance_salle  as $salle)
 {
       if($request->get('CBS'.$salle->id))
       {
             $idSalle=$salle->id;

       }

 }
  
  $Soutenance = Soutenance::create(array(
                                         'salle_id'=>$idSalle,
                                         'stage_id'=>$id,
                                         'soute_date_debut'=>$datet,
                                         'soute_date_fin'=>$datefin                              
                                  ));
  $Soutenance->save();
  $Salle_reserver = Salle_reserver::create(array(
                                                    'salle_id'=>$idSalle,
                                                  'date_debut'=>$datet,
                                                    'date_fin'=>$datefin                          
                                          ));

 $Salle_reserver->save();
 
foreach( $jury  as $ju)
 {
       if($request->get('JR'.$ju->id)!='')
       {
          $Soutenance_jury= Soutenance_jury::create(array(
                                                          'soutenance_id'=>$Soutenance->id,
                                                          'enseig_id'=>$ju->id,
                                                          'qualite_id'=>$request->get('JR'.$ju->id)                
                                          ));     
          $Soutenance_jury->save();
       }

  
 }

   return redirect()->route('soutenance.index')->with('message', 'La soutenance est ajoutée avec succès');
  }



 

  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
     
  

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>