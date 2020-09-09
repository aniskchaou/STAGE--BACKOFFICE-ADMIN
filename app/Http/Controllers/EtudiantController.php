<?php namespace App\Http\Controllers;
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
class EtudiantController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */ 





  public function etudiantImage($id,Request $request)
  {
      $v = Validator::make($request->all(), [
        
        'image'=> 'required|image', 
        ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
  
$image = $request->file('image');
 // $image = $request->file('Fichier');

  
      $chemin = config('images.path');

      $extension = $image->getClientOriginalExtension();

      do {
        $nom ='imageEt'.date('Ymdhis').'.'.$extension;
      } while(file_exists($chemin . '/' . $nom));

      if($image->move($chemin, $nom)) 
      {
    $Etudiant = Etudiant::find($id); 
    $Etudiant->etudiant_image= $nom;
    $Etudiant->save();

      
   return redirect()->back()->with('message','Votre  image est envoyé.');
       
      }
    

    return redirect()->back()
      ->with('error','Désolé mais votre image ne peut pas être envoyée !');
       
    
  }

  public function desactiver($id)
   {
       DB::table('etudiant')
            ->where('id', $id)
            ->update(array('etudiant_status' => 0));
            return redirect()->route('etudiant.index');
    
  }
    public function activer($id)
   {
       DB::table('etudiant')
            ->where('id', $id)
            ->update(array('etudiant_status' => 1));
            return redirect()->route('etudiant.index');
    
  }




  public function index()
  {

   $Etudiant = DB::table('etudiant')->orderBy('updated_at', 'desc')->get();
    $Filiere = Filiere::all();
    return view('Etudiants.AfficheEtudiant')->with('Etudiant',$Etudiant)->with('Filiere',$Filiere);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {$Filiere = Filiere::all();
    return view('Etudiants.AjouterEtudiant')->with('Filiere',$Filiere);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  { 
    
    $v = Validator::make($request->all(), [
        'etudiant_nom'=> 'required|max:20', 
        'etudiant_prenom'=>'required|max:20',
        'etudiant_cin'=>'required|unique:etudiant|digits:8',
        'etudiant_mat'=>'required|unique:etudiant|digits:7', 
        'etudiant_sexe'=> 'required',
        'etudiant_date_nissance'=>'required|date' , 
        'etudiant_lieu_naissance'=>'required|alpha|max:20',
        'etudiant_adresse'=>'required|max:255', 
        'etudiant_tel'=>'required|digits:8',
        'email' => 'required|email|unique:etudiant',
        'etudiant_filiere_id'=>'required',
        'etudiant_group_code'=>'integer' ,
        
    ]);
     $request->merge([
    'password' => '',
]);
    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }


     $Etudiants = Etudiant::create(    
                                 array('etudiant_cin'=> $request->get('etudiant_cin'),
                                       'etudiant_mat'=> $request->get('etudiant_mat'), 
                                       'etudiant_prenom'=> $request->get('etudiant_prenom'),
                                       'etudiant_nom'=> $request->get('etudiant_nom'), 
                                       'etudiant_sexe'=> $request->get('etudiant_sexe'),
                                       'etudiant_date_nissance'=> $request->get('etudiant_date_nissance'), 
                                       'etudiant_lieu_naissance'=> $request->get('etudiant_lieu_naissance'),
                                       'etudiant_rue'=> '',
                                       'etudiant_ville'=> '',
                                       'etudiant_region'=> '', 
                                       'etudiant_image'=>'user.png',
                                       'etudiant_adresse'=> $request->get('etudiant_adresse'), 
                                       'etudiant_tel'=> $request->get('etudiant_tel'),
                                       'email'=> $request->get('email'), 
                                       'etudiant_rebouble'=> $request->get('etudiant_rebouble') ? 'Oui':'Nom', 
                                       'etudiant_moda'=> '', 
                                       'etudiant_filiere_id'=> $request->get('etudiant_filiere_id'),
                                       'etudiant_niveau'=> $request->get('etudiant_niveau'),
                                       'etudiant_group_code'=> $request->get('etudiant_group_code'),
                                       'etudiant_group_name'=> $request->get('etudiant_group_name'),
                                       'password'=>''
                                      )
                                    );
   
    
     
    $Etudiants->save();
      

  return Redirect:: to('etudiant');
      
  
     
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
 



  public function show($id)
  {
    
    
    $etudiant = Etudiant::find($id);
    $Filiere = Filiere::all();
    
     return view('Etudiants.VoireEtudiant')->with('etudiant',$etudiant)->with('Filiere',$Filiere);
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
    
    $etudiant = Etudiant::find($id);
   
    return view('Etudiants.ModifierEtudiant')->with('etudiant',$etudiant)->with('Filiere',$Filiere);


    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id,Request $request)
  {   $v = Validator::make($request->all(), [
        'etudiant_nom'=> 'required|max:20', 
        'etudiant_prenom'=>'required|max:20',
        'etudiant_cin'=>'required|unique:etudiant,etudiant_cin,'.$id.'|digits:8',
        'etudiant_mat'=>'required|unique:etudiant,etudiant_mat,'.$id.'|digits:7', 
        'etudiant_sexe'=> 'required',
        'etudiant_date_nissance'=>'required|date' , 
        'etudiant_lieu_naissance'=>'required|alpha|max:20',
        'etudiant_adresse'=>'required|max:255', 
        'etudiant_tel'=>'required|digits:8',
        'email' => 'required|email|unique:etudiant,email,'.$id,
        'etudiant_filiere_id'=>'required',
        'etudiant_group_code'=>'integer' ,
       
    ]);
  if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }

    $etudiant = Etudiant::find($id); 

   $etudiant->etudiant_cin= $request->get('etudiant_cin');
   $etudiant->etudiant_mat= $request->get('etudiant_mat') ;
   $etudiant->etudiant_prenom= $request->get('etudiant_prenom');
   $etudiant->etudiant_nom= $request->get('etudiant_nom');
   $etudiant->etudiant_sexe= $request->get('etudiant_sexe');
   $etudiant->etudiant_date_nissance= $request->get('etudiant_date_nissance');
   $etudiant->etudiant_lieu_naissance= $request->get('etudiant_lieu_naissance');
   $etudiant->etudiant_rue= '';
   $etudiant->etudiant_ville= '';
   $etudiant->etudiant_region= '';
   $etudiant->etudiant_adresse= $request->get('etudiant_adresse'); 
   $etudiant->etudiant_tel= $request->get('etudiant_tel');
   $etudiant->email= $request->get('email'); 
   $etudiant->etudiant_rebouble= $request->get('etudiant_rebouble');  
   $etudiant->etudiant_moda= ''; 
   $etudiant->etudiant_filiere_id= $request->get('etudiant_filiere_id');
   $etudiant->etudiant_niveau= $request->get('etudiant_niveau');
   $etudiant->etudiant_group_code= $request->get('etudiant_group_code');
   $etudiant->etudiant_group_name= $request->get('etudiant_group_name');
   $etudiant->save();
  
   return Redirect:: to('etudiant');
   
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