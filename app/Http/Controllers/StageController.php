<?php namespace App\Http\Controllers;
use App\Stage;
use App\Encadreur;
use App\Etudiant;
use App\Soutenance;
use App\Filiere;
use App\Stage_filiere;
use App\Stagiaire;
use App\Type_stage;
use App\Entreprise;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StageController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
    public function imprimerStage()
  {
    $Type_stage =Type_stage::all();
    $Filiere=Filiere::all();
    $an=date("Y");
    $Anner = array((($an-4).'-'.($an-3)),(($an-3).'-'.($an-2)), (($an-2).'-'.($an-1)), (($an-1).'-'.($an)), (($an).'-'.($an+1)), (($an+1).'-'.($an+2)), (($an+2).'-'.($an+3)) );
    return view('Stage.ImprimerStage')->with(array('Anner'=>$Anner,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage ));
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
    
    $Filiere = Filiere::find($Ifiliere);
    $Type_stage =Type_stage::find($Itypes);
    $Etudiant=DB::select('select e.id, etudiant_cin, etudiant_prenom, etudiant_nom, s.stage_id, ent_nom, stage_title, stage_dete_debut,stage_dete_fin,stage_encadreur_s
                          from etudiant e , stagiaire s ,stage st,entreprise ent
                          where e.id =s.etudiant_id  and st.id=s.stage_id and ent.id = st.entreprise_id
                          and etudiant_filiere_id ="'.$Ifiliere.'" and etudiant_niveau ="'.$Iniveau.'" 
                          and (stage_id in (select st.id from stage st  where st.type_id ="'.$Itypes.'"  
                          and st.stage_annee_universitaire="'.$Ianner.'"  and st.stage_status = "Valide" )) ');


    return view('Stage.Imprimer')->with(array('Ianner'=>$Ianner,'Etudiant'=>$Etudiant,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage));
  




  }


  public function stageAvecAffec()
  {
    $Stage=DB::select("select * from stage where (id  in (select stage_id from stagiaire )) and (stage_status <> 'Archivé' )");
      
  
    
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
    $Etudiant=Etudiant::all();
    $Filiere=Filiere::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere=Stage_filiere::all();
     

    $an=date("Y");
    $Anner = array((($an-4).'-'.($an-3)),(($an-3).'-'.($an-2)), (($an-2).'-'.($an-1)), (($an-1).'-'.($an)), (($an).'-'.($an+1)), (($an+1).'-'.($an+2)), (($an+2).'-'.($an+3)) );
    return view('Stage.StageAvecAffectation')->with(array('Anner'=>$Anner,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));
   }   
     public function stageSansAffec()
  {
    $Stage=DB::select("select * from stage where (id not in (select stage_id from stagiaire )) and (stage_status <> 'Archivé' )");

    
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
    $Etudiant=Etudiant::all();
    $Filiere=Filiere::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere=Stage_filiere::all();
     

    $an=date("Y");
    $Anner = array((($an-4).'-'.($an-3)),(($an-3).'-'.($an-2)), (($an-2).'-'.($an-1)), (($an-1).'-'.($an)), (($an).'-'.($an+1)), (($an+1).'-'.($an+2)), (($an+2).'-'.($an+3)) );
    return view('Stage.StageSansAffectation')->with(array('Anner'=>$Anner,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));
   }   



  public function stageEnAttente()
  {
    
    $Stage = DB::table('stage')
                    ->where('stage_status', '1')
                    ->get();
    
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
    $Etudiant=Etudiant::all();
    $Filiere=Filiere::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere=Stage_filiere::all();
     

    $an=date("Y");
    $Anner = array((($an-4).'-'.($an-3)),(($an-3).'-'.($an-2)), (($an-2).'-'.($an-1)), (($an-1).'-'.($an)), (($an).'-'.($an+1)), (($an+1).'-'.($an+2)), (($an+2).'-'.($an+3)) );
    return view('Stage.StageEnAttente')->with(array('Anner'=>$Anner,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));
   }      
  public function stagesLibre()
  {
    $Stage=DB::select('select * from stage where (id not in (select stage_id from stagiaire ))and (id not in (select stage_id from encadreur )) and (stage_status != \'Archivé\' )');
      
    
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
    $Etudiant=Etudiant::all();
    $Filiere=Filiere::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere=Stage_filiere::all();
     

    $an=date("Y");
    $Anner = array((($an-4).'-'.($an-3)),(($an-3).'-'.($an-2)), (($an-2).'-'.($an-1)), (($an-1).'-'.($an)), (($an).'-'.($an+1)), (($an+1).'-'.($an+2)), (($an+2).'-'.($an+3)) );
    return view('Stage.AfficheStage')->with(array('Anner'=>$Anner,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));
   }      
  public function stageEnCours()
  {
    $Stage=DB::select('select * from stage where (\''.date('Y-m-d').'\' between stage_dete_debut  and stage_dete_fin ) and (stage_status <> \'Archivé\' )');
    
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
    $Etudiant=Etudiant::all();
    $Filiere=Filiere::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere=Stage_filiere::all();
     

    $an=date("Y");
    $Anner = array((($an-4).'-'.($an-3)),(($an-3).'-'.($an-2)), (($an-2).'-'.($an-1)), (($an-1).'-'.($an)), (($an).'-'.($an+1)), (($an+1).'-'.($an+2)), (($an+2).'-'.($an+3)) );
    return view('Stage.StagesEnCour')->with(array('Anner'=>$Anner,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));
   }      
  public function avecEncadreur()
  {
    $Stage=DB::select('select * from stage where (id in (select stage_id from encadreur )) and (stage_status <> \'Archivé\' )');
    
    
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
    $Etudiant=Etudiant::all();
    $Filiere=Filiere::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere=Stage_filiere::all();
     

    $an=date("Y");
    $Anner = array((($an-4).'-'.($an-3)),(($an-3).'-'.($an-2)), (($an-2).'-'.($an-1)), (($an-1).'-'.($an)), (($an).'-'.($an+1)), (($an+1).'-'.($an+2)), (($an+2).'-'.($an+3)) );
    return view('Stage.AvecEncadreur')->with(array('Anner'=>$Anner,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));
   }      
  public function sansEncadreur()
  {
    $Stage=DB::select('select * from stage where (id not in (select stage_id from encadreur )) and (stage_status <> \'Archivé\' ) and (type_id in ( select id from type_stage where type_encadreur = \'1\' )) ');
    
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
    $Etudiant=Etudiant::all();
    $Filiere=Filiere::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere=Stage_filiere::all();
     

    $an=date("Y");
    $Anner = array((($an-4).'-'.($an-3)),(($an-3).'-'.($an-2)), (($an-2).'-'.($an-1)), (($an-1).'-'.($an)), (($an).'-'.($an+1)), (($an+1).'-'.($an+2)), (($an+2).'-'.($an+3)) );
    return view('Stage.SansEncadreur')->with(array('Anner'=>$Anner,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));
   }      










  public function index()
  {
    $Stage=Stage::all();
    
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
    $Etudiant=Etudiant::all();
    $Filiere=Filiere::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere=Stage_filiere::all();
     

    $an=date("Y");
    $Anner = array((($an-4).'-'.($an-3)),(($an-3).'-'.($an-2)), (($an-2).'-'.($an-1)), (($an-1).'-'.($an)), (($an).'-'.($an+1)), (($an+1).'-'.($an+2)), (($an+2).'-'.($an+3)) );
    return view('Stage.AfficheStage')->with(array('Anner'=>$Anner,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));
   }      

  

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $Filiere = Filiere::all();
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
   


    return view('Stage.AjouterStage')->with(array('Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $v = Validator::make($request->all(), [
        'stage_title'=> 'required|max:255', 
        'type_id'=>'required',
        'stage_sujet'=>'required',
        'stage_dete_debut'=>'required|date',
        'stage_dete_fin'=>'required|date',
        'filiere_id'=>'required',
       
        'stage_sujet'=>'required'
        
        ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }

$Type_stage =Type_stage::find($request->get('type_id'));

$dateDebut = strtotime($request->get('stage_dete_debut'));
$dateFin = strtotime($request->get('stage_dete_fin'));

$dureeSejour = (($dateFin - $dateDebut)/86400);

  
  
$max= date("Y-m-d",$dateDebut+($Type_stage->type_dur_max*86400));
$min= date("Y-m-d",$dateDebut+($Type_stage->type_dur_min*86400));



    $v = Validator::make($request->all(), [
        'stage_nbr_etudiant'=> 'required|integer|min:'.$Type_stage->type_nb_min.'|max:'.$Type_stage->type_nb_max, 

        ]);
 if( intval($dureeSejour)> intval($Type_stage->type_dur_max) || intval($dureeSejour)<  intval($Type_stage->type_dur_min) )
     { $v->errors()->add('error', 'Le champ date de fin doit avoir une date entre '.$min.' et '.$max);
        return redirect()->back()->withErrors($v->errors())->withInput();
     }

   if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }


    
    $a1 = explode("-",$request->get('stage_dete_fin'));

      $stage_annee=(($a1[0])-1).'-'.$a1[0];
  
    


$ent=null;
if($request->get('entreprise_id')=='')
  $ent=null;
else
  $ent=$request->get('entreprise_id');
      

         $Stage = Stage::create(    
                                 array( 
                                         'type_id'=>$request->get('type_id'),
                                         'entreprise_id'=>$ent,
                                         'stage_title'=>$request->get('stage_title'),
                                         'stage_dete_debut'=>$request->get('stage_dete_debut'),
                                         'stage_dete_fin'=>$request->get('stage_dete_fin'),
                                         'stage_nbr_etudiant'=>$request->get('stage_nbr_etudiant'),
                                         'stage_sujet'=>$request->get('stage_sujet'),
                                         'stage_annee_universitaire'=>$stage_annee,
                                         'stage_encadreur_s'=>$request->get('stage_encadreur_s'),
                                         'stage_status'=>"En attente d'affectation",
                                         'stage_book'=>""
                                       )
                                    );
   
         $Stage->save();
                   
                   foreach($request->get('filiere_id') as $filiere){

                    $Stage_filiere=Stage_filiere::create(array('stage_id'=>$Stage->id,
                                                         'filiere_id'=>$filiere
                                                         ));
                    $Stage_filiere->save();
                   }
          
     /*    if($request->get('entreprise_id')!='')
         { $Entreprise=Entreprise::find($request->get('entreprise_id'));
                $data=['titre'=>'Bienvenu',
                      'content'=>'votre stage titulé '.$request->get('stage_title').' a été ajoutée avec succès',
                      'mail'=>$Entreprise->email
                    ];

                   $mail=$Entreprise->email;


try {
    Mail::queue('emails.welcome', $data, function($message) use ($data)
    {
    $message->to($data['mail'], 'admin')->subject('Welcome!');
    });

          } catch ( Exception $e) {

              
          }


            }           
*/

  return Redirect:: to('stage')->with('message', 'Le stage est ajouté avec succès');

  
}

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {  
    $Enseignant = DB::select('select * from enseignant where (id in (select enseig_id from encadreur e where e.stage_id ='.$id.'))');
    $Encadreur = DB::select('select * from encadreur e where e.stage_id ='.$id.'');
    $Soutenance=DB::select('select so.id as idSout, salle_id,  soute_date_debut, salle_nom, soute_date_fin 
                            from stage st , soutenance so, soutenance_salle sa 
                            where st.id = so.stage_id and so.salle_id = sa.id and st.id='.$id.'');
   
    $jury=DB::select('select en.id,soutenance_id, qualite_id ,enseig_prenom, enseig_nom 
                      from enseignant en , soutenance_jury jr 
                      where en.id = jr.enseig_id');

    $Enseignant = DB::select('select * from enseignant where (id in (select enseig_id from encadreur e where e.stage_id ='.$id.'))');
    
    $Stage=Stage::find($id);
    $Filiere = Filiere::all();
    $Type_stage =Type_stage::find($Stage->type_id);
    $Entreprise=Entreprise::all();
    $Etudiant=Etudiant::all();
    $Stagiaire =Stagiaire::all();
    $Stage_filiere = DB::table('stage_filiere')->where('stage_id',$id)->get();
    $Reservation=DB::select('SELECT motivation,pre_affecte, sr.created_at ,et.id, etudiant_cin, etudiant_prenom, etudiant_image, etudiant_nom FROM stage_reservation sr, etudiant et, stage st WHERE et.id = sr.etudiant_id and st.id=sr.stage_id and st.id='.$id.'');


    

    return view('Stage.VoireStage')->with(array('Soutenance'=>$Soutenance,'Reservation'=>$Reservation,'jury'=>$jury,'Encadreur'=>$Encadreur,'Enseignant'=>$Enseignant,'Stage_filiere'=>$Stage_filiere,'Stagiaire'=>$Stagiaire ,'Etudiant'=>$Etudiant,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));  
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
    $Filiere = Filiere::all();
    $Type_stage =Type_stage::all();
    $Entreprise=Entreprise::all();
    $Stage=Stage::find($id);
    $Stage_filiere = DB::table('stage_filiere')->where('stage_id',$id)->get(); 
    
    return view('Stage.ModifierStage')->with(array('Stage_filiere'=>$Stage_filiere,'Stage'=>$Stage,'Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Entreprise'=>$Entreprise ));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id,Request $request)
  {


     $v = Validator::make($request->all(), [
        'stage_status'=>'required',
        'stage_title'=> 'required|max:255', 
        'type_id'=>'required',
        'stage_sujet'=>'required',
        'stage_dete_debut'=>'required|date',
        'stage_dete_fin'=>'required|date',
        'filiere_id'=>'required',
        
        'stage_sujet'=>'required'
        
        ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }

$Type_stage =Type_stage::find($request->get('type_id'));

$dateDebut = strtotime($request->get('stage_dete_debut'));
$dateFin = strtotime($request->get('stage_dete_fin'));

$dureeSejour = (($dateFin - $dateDebut)/86400);

  
  
$max= date("Y-m-d",$dateDebut+($Type_stage->type_dur_max*86400));
$min= date("Y-m-d",$dateDebut+($Type_stage->type_dur_min*86400));



    $v = Validator::make($request->all(), [
        'stage_nbr_etudiant'=> 'required|integer|min:'.$Type_stage->type_nb_min.'|max:'.$Type_stage->type_nb_max, 

        ]);
 if( intval($dureeSejour)> intval($Type_stage->type_dur_max) || intval($dureeSejour)<  intval($Type_stage->type_dur_min) )
     { $v->errors()->add('error', 'Le champ date de fin doit avoir une date entre '.$min.' et '.$max);
        return redirect()->back()->withErrors($v->errors())->withInput();
     }

   if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
       $a1 = explode("-",$request->get('stage_dete_fin'));

      $stage_annee=(($a1[0])-1).'-'.$a1[0];


    $ent=null;
if($request->get('entreprise_id')=='')
  $ent=null;
else
  $ent=$request->get('entreprise_id');

         $Stage = Stage::find($id);    
                                 
         $Stage->type_id=$request->get('type_id');
         $Stage->entreprise_id = $ent;
         $Stage->stage_title = $request->get('stage_title');
         $Stage->stage_dete_debut = $request->get('stage_dete_debut');
         $Stage->stage_dete_fin = $request->get('stage_dete_fin');
         $Stage->stage_nbr_etudiant = $request->get('stage_nbr_etudiant');
         $Stage->stage_sujet = $request->get('stage_sujet');
         $Stage->stage_annee_universitaire = $stage_annee;
         $Stage->stage_encadreur_s = $request->get('stage_encadreur_s');
         $Stage->stage_status = $request->get('stage_status');
                                        
                                          
 

                                     
   
                   $Stage->save();


$Stage_filiere = DB::table('stage_filiere')->where('stage_id',$id)->delete();
                   foreach($request->get('filiere_id') as $filiere){

                    $stage_filiere=Stage_filiere::create(array('stage_id'=>$Stage->id,
                                                         'filiere_id'=>$filiere
                                                         ));
                    $stage_filiere->save();
                   }
     
       /*   $Entreprise=Entreprise::find($request->get('entreprise_id'));
                $data=['titre'=>'Bienvenu',
                      'content'=>'votre stage titulé  a été ajoutée avec succès',
                      'mail'=>$Entreprise->email
                    ];

                   $mail=$Entreprise->email;


try {
    Mail::queue('emails.welcome', $data, function($message) use ($data)
    {
    $message->to($data['mail'], 'admin')->subject('Welcome!');
    });

          } catch ( Exception $e) {

              
          }*/


                       


  return Redirect:: to('stage')->with('message', 'Le stage est modifié avec succès');

    
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
