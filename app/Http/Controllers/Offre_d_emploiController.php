<?php namespace App\Http\Controllers;


use App\Offre_d_emploi;
use App\Emploi_filere;
use App\Entreprise;
use App\Secteur;
use App\Etudiant;
use App\Filiere;
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

class Offre_d_emploiController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
    public function emploiCorbeille()
  {
    $Filiere = Filiere::all();
    $Entreprise = Entreprise::all();
    $Emploi_filere = Emploi_filere::all();
     $Offre_d_emploi = DB::table('offre_d_emploi')
                    ->where('emploi_status','Archivé')
                    ->orWhere('emploi_date_fin', '<', date('Y-m-d'))
                    ->get();

    $Secteur= Secteur::all();
    return view('OffresEmploies/EmploiCorbeille')->with(array('Secteur'=>$Secteur,'Offre_d_emploi'=>$Offre_d_emploi,'Emploi_filere'=>$Emploi_filere,'Filiere'=>$Filiere,'Entreprise'=>$Entreprise));    
  }
  public function emploiEnAttente()
  {
    $Filiere = Filiere::all();
    $Entreprise = Entreprise::all();
    $Emploi_filere = Emploi_filere::all();
      $Offre_d_emploi = DB::table('offre_d_emploi')
                    ->where('emploi_status', 'En attente')
                    ->get();
    $Secteur= Secteur::all();
    return view('OffresEmploies/emploiEnAttente')->with(array('Secteur'=>$Secteur,'Offre_d_emploi'=>$Offre_d_emploi,'Emploi_filere'=>$Emploi_filere,'Filiere'=>$Filiere,'Entreprise'=>$Entreprise));    
  }
  public function index()
  {
    $Filiere = Filiere::all();
    $Entreprise = Entreprise::all();
    $Emploi_filere = Emploi_filere::all();
     $Offre_d_emploi = DB::table('offre_d_emploi')
                    ->where('emploi_status','<>', 'Archivé')
                    ->get();
    $Secteur= Secteur::all();
    return view('OffresEmploies/AfficheOffre_d_emploi')->with(array('Secteur'=>$Secteur,'Offre_d_emploi'=>$Offre_d_emploi,'Emploi_filere'=>$Emploi_filere,'Filiere'=>$Filiere,'Entreprise'=>$Entreprise));    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $Filiere = Filiere::all();
    $Entreprise = Entreprise::all();
    return view('OffresEmploies/AjouterOffre_d_emploi')->with(array('Filiere'=>$Filiere,'Entreprise'=>$Entreprise));
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  { 
     $v = Validator::make($request->all(), [

        
        'emploi_titre'=>'required|max:255',
        'emploi_nbr'=>'required|integer|max:9000',
        'emploi_date_fin'=>'required|date',
        'ent_id'=>'required',
        'filiere_id'=>'required',
        'emploi_competence'=>'required',
        ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }

       $Offre_d_emploi = Offre_d_emploi::create(    
                                 array(  'emploi_titre'=>$request->get('emploi_titre'),
                                         'emploi_nbr'=>$request->get('emploi_nbr'),
                                         'emploi_date_fin'=>$request->get('emploi_date_fin'),
                                         'ent_id'=>$request->get('ent_id'),
                                         'emploi_competence'=>$request->get('emploi_competence'),
                                         'emploi_status'=>'Diffuser',
                                       )
                                    );
   
                   $Offre_d_emploi->save();
                   foreach($request->get('filiere_id') as $filiere){
                                                                  
                    $Emploi_filere=Emploi_filere::create(array('emploi_id'=>$Offre_d_emploi->id,
                                                         'filiere_id'=>$filiere
                                                        ));
                    $Emploi_filere->save();
                   }
     
   /*      $Entreprise=Entreprise::find($request->get('ent_id'));
                $data=['titre'=>' Sage+ Bienvenu',
                       'content'=>'votre Offre d\'emploi titulé'.$Offre_d_emploi->emploi_titre.'  a été Diffuser',
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


                       


  return Redirect:: to('offre_d_emploi');



    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $Filiere = Filiere::all();
    $Entreprise = Entreprise::all();
    $Emploi_filere = DB::table('emploi_filere')->where('emploi_id',$id)->get();   
    $Offre_d_emploi = Offre_d_emploi::find($id);
    
    return view('OffresEmploies/VoireOffre_d_emploi')->with(array('Emploi_filere'=>$Emploi_filere,'Offre_d_emploi'=>$Offre_d_emploi,'Filiere'=>$Filiere,'Entreprise'=>$Entreprise));
    


    
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
    $Entreprise = Entreprise::all();
    $Emploi_filere = DB::table('emploi_filere')->where('emploi_id',$id)->get();   
    $Offre_d_emploi = Offre_d_emploi::find($id);
    
    return view('OffresEmploies/ModifierOffre_d_emploi')->with(array('Emploi_filere'=>$Emploi_filere,'Offre_d_emploi'=>$Offre_d_emploi,'Filiere'=>$Filiere,'Entreprise'=>$Entreprise));
    
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
        'emploi_status'=>'required',
        'emploi_titre'=>'required|max:255',
        'emploi_nbr'=>'required|integer|max:9000',
        'emploi_date_fin'=>'required|date',
        'ent_id'=>'required',
        'filiere_id'=>'required',
        'emploi_competence'=>'required',

        ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
    $Offre_d_emploi = Offre_d_emploi::find($id);  
                         $Offre_d_emploi->emploi_titre=$request->get('emploi_titre');
                           $Offre_d_emploi->emploi_nbr=$request->get('emploi_nbr');
                      $Offre_d_emploi->emploi_date_fin=$request->get('emploi_date_fin');
                               $Offre_d_emploi->ent_id=$request->get('ent_id');
                    $Offre_d_emploi->emploi_competence=$request->get('emploi_competence');
                        $Offre_d_emploi->emploi_status=$request->get('emploi_status');
     

         $Offre_d_emploi->save();


$Emploi_filere = DB::table('emploi_filere')->where('emploi_id',$id)->delete();
 foreach($request->get('filiere_id') as $filiere){
                                                                  
                    $emploi_filere=Emploi_filere::create(array('emploi_id'=>$Offre_d_emploi->id,
                                                         'filiere_id'=>$filiere
                                                        ));
                    $emploi_filere->save();
                   }


    return Redirect:: to('offre_d_emploi');

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