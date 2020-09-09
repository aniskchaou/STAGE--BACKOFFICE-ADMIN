<?php namespace App\Http\Controllers;
use App\Stage_reservation;
use App\Type_stage;
use App\Stage;
use App\Etudiant;
use App\Filiere;
use App\Stagiaire;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Support\Facades\DB;



class StagiaireController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */



  public function index()
  {



    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $Etudiant = DB::select('select st.id,et.id as etId, etudiant_cin, etudiant_prenom, etudiant_nom, etudiant_filiere_id, etudiant_niveau , stage_id , grade, valide, moyenne ,stage_title,type_nom , appreciation
                            from etudiant et,stagiaire st,stage sg,type_stage ts where 
                            et.id=st.etudiant_id 
                            and sg.type_id = ts.id 
                            and st.stage_id=sg.id 
                            and ts.type_soutenable=\'1\'
                            and sg.stage_status=\'Valide\'
                            and (sg.id in(select stage_id from soutenance )) 
                            and grade=\'\'');
  $Filiere = Filiere::all();
  $Type_stage =Type_stage::all();
     

     return view('Soutenance.ajuterResultats')->with(array('Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Etudiant'=>$Etudiant));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {   $Etudiant = DB::select('select st.id,et.id "etId", etudiant_cin, etudiant_prenom, etudiant_nom, etudiant_filiere_id, etudiant_niveau , stage_id , grade, valide, moyenne ,stage_title,type_nom , appreciation
                            from etudiant et,stagiaire st,stage sg,type_stage ts where 
                            et.id=st.etudiant_id 
                            and sg.type_id = ts.id 
                            and st.stage_id=sg.id 
                            and ts.type_soutenable=\'1\'
                            and sg.stage_status=\'Valide\' 
                            and (sg.id in(select stage_id from soutenance )) 
                            and grade=\'\'');
 foreach( $Etudiant  as $Et)
 {


      if($request->get('not'.$Et->id)!='') 
      {
        $moyenne= $request->get('not'.$Et->id);
        
       $grade='';
        $valide=''; 
        if ($moyenne<10) 
        {
          $valide='invalide';
          
        }else
        {
          $valide='valide';
        }
        if ($moyenne<10){$grade='échoué';}
        if ($moyenne>=10 and $moyenne<12) {$grade='passable';}
        if ($moyenne>=12 and $moyenne<14) {$grade='assez bien';}
        if ($moyenne>=14 and $moyenne<16) {$grade='bien';}
        if ($moyenne>=16) {$grade='très bien';}
         
          
          

          
        


    $Stagiaire = Stagiaire::find($Et->id);
    $Stagiaire->grade =$grade;
    $Stagiaire->valide= $valide;
    $Stagiaire->moyenne= $moyenne ; 
    $Stagiaire->appreciation =$request->get('appreciation'.$Et->id); 
    $Stagiaire->save();

      }

 }
 return Redirect:: to('stagiaire/1/edit')->with('message', 'Les moyennes est ajouté avec succès');
    
  
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
        $Etudiant = DB::select('select st.id,et.id as etId, etudiant_cin, etudiant_prenom, etudiant_nom, etudiant_filiere_id, etudiant_niveau , stage_id , grade, valide, moyenne ,stage_title,type_nom , appreciation
                            from etudiant et,stagiaire st,stage sg,type_stage ts where 
                            et.id=st.etudiant_id 
                            and sg.type_id = ts.id 
                            and st.stage_id=sg.id 
                            and ts.type_soutenable=\'1\' 
                            and sg.stage_status=\'Valide\'
                            and (sg.id in(select stage_id from soutenance )) 
                            and grade<>\'\'');
  $Filiere = Filiere::all();
  $Type_stage =Type_stage::all();
     

     return view('Soutenance.modiferResultats')->with(array('Filiere'=>$Filiere,'Type_stage'=>$Type_stage,'Etudiant'=>$Etudiant));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
   $Etudiant = DB::select('select st.id,et.id as etId, etudiant_cin, etudiant_prenom, etudiant_nom, etudiant_filiere_id, etudiant_niveau , stage_id , grade, valide, moyenne ,stage_title,type_nom , appreciation
                            from etudiant et,stagiaire st,stage sg,type_stage ts where 
                            et.id=st.etudiant_id 
                            and sg.type_id = ts.id 
                            and st.stage_id=sg.id 
                            and ts.type_soutenable=\'1\' 
                            and sg.stage_status=\'Valide\' 
                            and (sg.id in(select stage_id from soutenance )) 
                            and grade<>\'\'');


     foreach( $Etudiant  as $Et)
     {


      
        $moyenne= $request->get('not'.$Et->id);
        $appreciation= $request->get('appreciation'.$Et->id); 
        
       $grade='';
        $valide='';

        if ($moyenne<10) 
        {
          $valide='invalide';
          
        }else
        {
          $valide='valide';
        }
        if ($moyenne<10){$grade='échoué';}
        if ($moyenne>=10 and $moyenne<12) {$grade='passable';}
        if ($moyenne>=12 and $moyenne<14) {$grade='assez bien';}
        if ($moyenne>=14 and $moyenne<16) {$grade='bien';}
        if ($moyenne>=16) {$grade='très bien';}
         
          if($moyenne==''){
            $grade='';
        $valide='';
        $appreciation='';
          }
          

          
        


    $Stagiaire = Stagiaire::find($Et->id);
    $Stagiaire->grade =$grade;
    $Stagiaire->valide= $valide;
    $Stagiaire->moyenne= $moyenne ; 
    $Stagiaire->appreciation = $appreciation; 
    $Stagiaire->save();

     

 }
 return Redirect:: to('stagiaire/1/edit')->with('message', 'Les moyennes est ajouté avec succès');
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
 Stagiaire::find($id)->delete();
 return Redirect::back();
 
  }









  public function affecter($id)
  { $Stage = Stage::find($id);
    $Type_stage =Type_stage::find($Stage->type_id);
      $NBS = DB::table('stagiaire')->where('stage_id', $id)->count();
    $NBR = DB::table('stage_reservation')->where('stage_id', $id)->count();
   $etudiantR = DB::select( 'select etudiant_id ,pre_affecte from stage_reservation sr where sr.stage_id ='.$id.''); 

    $Etudiant = DB::select('select * from etudiant where (id not in (select etudiant_id from stagiaire s where s.stage_id ='.$id.'))
     and (etudiant_filiere_id in(select filiere_id from stage_filiere where stage_id='.$id.' ) ) 
     and (id  not in (select etudiant_id from stagiaire st where  st.stage_id in (select id from stage sg where 
      ((sg.stage_dete_fin > \''.$Stage->stage_dete_debut.'\' and sg.stage_dete_fin< \''.$Stage->stage_dete_fin.'\' ) 
      or (sg.stage_dete_debut >= \''.$Stage->stage_dete_debut.'\' and sg.stage_dete_debut < \''.$Stage->stage_dete_fin.'\' ))
    and (sg.id not in (select id from stage st where st.stage_status=\'Archivé\' ) ))))'); 
    $Filiere=Filiere::all();
   
    
  return view('Stagiaire.affecterStagiaire')->with(array('etudiantR'=>$etudiantR,'Etudiant'=>$Etudiant,'Filiere'=>$Filiere, 'Stage'=>$Stage,'Type_stage'=>$Type_stage, 'NBS'=>$NBS,'NBR'=>$NBR));  

  }

 public function affecterEt($id)
{$Stage = Stage::find($id);
   
   


    $Etudiant = DB::select('select * from etudiant where (id not in (select etudiant_id from stagiaire s where s.stage_id ='.$id.')) 
                             and (etudiant_filiere_id in(select filiere_id from stage_filiere where stage_id='.$id.' ) ) and
                             (id  not in (select etudiant_id from stagiaire st where  st.stage_id in 
                             (select id from stage sg where 
                             ((sg.stage_dete_fin >= \''.$Stage->stage_dete_debut.'\' and sg.stage_dete_fin <\''.$Stage->stage_dete_fin.'\' ) or
                             (sg.stage_dete_debut >= \''.$Stage->stage_dete_debut.'\' and sg.stage_dete_debut <\''.$Stage->stage_dete_fin.'\' ))
                               and (sg.id not in (select id from stage st where st.stage_status=\'Archivé\' ) )
                               )))'); 



 foreach( $Etudiant  as $Et)
 {


     

    $Stagiaire = Stagiaire::create(array(
                                           'stage_id'=>$id,
                                        'etudiant_id'=>$Et->id,
                                              'grade'=>'',
                                              'appreciation'=>'',
                                              'assurance_code'=>''

                                  ));
             $Stagiaire->save();


     $Stage->stage_status='En attente de validation finale';
     $Stage->save();


           

 }



return Redirect:: to('stage/'.$Stage->id); 


}

 public function supprimer($id)
{


}
  
}

?>