<?php namespace App\Http\Controllers;
use App\Entreprise;
use App\Secteur;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Support\Facades\DB;

class EntrepriseController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
    public function desactiver($id)
   {
       DB::table('entreprise')
            ->where('id', $id)
            ->update(array('ent_status' => 0));
            return redirect()->route('entreprise.index');
    
  }
    public function activer($id)
   {
       DB::table('entreprise')
            ->where('id', $id)
            ->update(array('ent_status' => 1));
            return redirect()->route('entreprise.index');
    
  }
  public function index()
  {
     $Entreprise = DB::table('entreprise')->get();
    $Secteur = Secteur::all();
   

  
    return view('Entreprise.AfficheEntreprise')->with('Entreprise',$Entreprise)->with('Secteur',$Secteur);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $Secteur = Secteur::all();
    return view('Entreprise.AjouterEntreprise')->with('Secteur',$Secteur);
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      


       $v = Validator::make($request->all(), [
        'ent_nom'=> 'required|max:20', 
        'ent_statut_juridique'=>'required|max:20',
        'ent_nbr'=>'integer',
        'ent_adresse'=>'required|max:255', 
        'ent_pays'=>'required|max:20',
        'ent_ville'=>'required|max:20',
        'ent_fax'=>'integer',
       'ent_tel'=>'integer',
        'ent_web'=>'url',
        'email' => 'required|email|unique:entreprise',
        'password'=>'' 
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
    $request->merge([
    'password' => '',
]);
    //print_r($request->all());
     $Entreprise = Entreprise::create( $request->all());
    $Entreprise->save();
   return Redirect:: to('entreprise');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
    $Entreprise = Entreprise::find($id);
    $Secteur = Secteur::find($Entreprise->secteur_id);
    return view('Entreprise.VoireEntreprise')->with('Entreprise',$Entreprise)->with('Secteur',$Secteur);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
        $Secteur = Secteur::all();
   
        $Entreprise = Entreprise::find($id);
    

  
    return view('Entreprise.ModifierEntreprise')->with('Entreprise',$Entreprise)->with('Secteur',$Secteur);
    
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
        'ent_nom'=> 'required|max:20', 
        'ent_statut_juridique'=>'required|max:20',
        'ent_nbr'=>'integer',
        'ent_adresse'=>'required|max:255', 
        'ent_pays'=>'required|max:20',
        'ent_ville'=>'required|max:20',
      //  'ent_fax'=>'integer',
      //  'ent_tel'=>'integer',
        'ent_web'=>'url',
        'email' => 'required|email|unique:entreprise,email,'.$id, 
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
  $Entreprise = Entreprise::find($id);    
   
    $Entreprise->ent_nom=$request->get('ent_nom');
    $Entreprise->ent_statut_juridique=$request->get('ent_statut_juridique');
    $Entreprise->secteur_id=$request->get('secteur_id');
    $Entreprise->ent_nbr=$request->get('ent_nbr');
    $Entreprise->ent_adresse=$request->get('ent_adresse');
    $Entreprise->ent_pays=$request->get('ent_pays');
    $Entreprise->ent_ville=$request->get('ent_ville');
    $Entreprise->ent_fax=$request->get('ent_fax');
    $Entreprise->ent_tel=$request->get('ent_tel');
    $Entreprise->ent_web=$request->get('ent_web');
    $Entreprise->email=$request->get('email');
   
    
    
    $Entreprise->save();
    return Redirect:: to('entreprise');
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