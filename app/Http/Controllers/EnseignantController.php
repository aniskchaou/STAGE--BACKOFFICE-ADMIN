<?php namespace App\Http\Controllers;

use App\Enseignant;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Support\Facades\DB;

class EnseignantController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */

    public function desactiver($id)
   {
       DB::table('enseignant')
            ->where('id', $id)
            ->update(array('enseig_status' => 0));
            return redirect()->route('enseignant.index');
    
  }
    public function activer($id)
   {
       DB::table('enseignant')
            ->where('id', $id)
            ->update(array('enseig_status' => 1));
            return redirect()->route('enseignant.index');
    
  }
  public function index()
  {
    $Enseignant= DB::table('enseignant')->get();
    return view('Enseignant.AfficheEnseignant')->with('Enseignant',$Enseignant);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
     return view('Enseignant.AjouterEnseignant');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
     $v = Validator::make($request->all(), [
        'enseig_nom'=> 'required|max:20', 
        'enseig_prenom'=>'required|max:20',
        'enseig_code'=>'required|unique:enseignant|digits_between:5,10',
        'enseig_sexe'=> 'required',
        'enseig_adresse'=>'required|max:255', 
        'enseig_tel'=>'digits:8',
        'enseig_mobile'=>'digits:8',
        'email' => 'required|email|unique:enseignant'
        
        
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }


     $Enseignant = Enseignant::create(   array( 
                                                 'enseig_code'=> $request->get('enseig_code'), 
                                                 'enseig_prenom'=> $request->get('enseig_prenom'), 
                                                 'enseig_nom'=> $request->get('enseig_nom'), 
                                                 'enseig_sexe'=> $request->get('enseig_sexe'), 
                                                 'enseig_tel'=> $request->get('enseig_tel'), 
                                                 'enseig_mobile'=> $request->get('enseig_mobile'), 
                                                 'enseig_adresse'=> $request->get('enseig_adresse'), 
                                                 'enseig_grade_code'=>'',
                                                 'enseig_grade_nom'=> $request->get('enseig_grade_nom'),
                                                 'enseig_specialite_code'=>'',
                                                 'enseig_specialite_nom'=> $request->get('enseig_specialite_nom'), 
                                                 'enseig_status_code'=>'', 
                                                 'enseig_status_nom'=>'', 
                                                 'email'=> $request->get('email'), 
                                                 'password'=>'123456', 
                                                 'enseig_status'=> '1'

                                               ) 
                                     );
   
    
     
    $Enseignant->save();
   return Redirect:: to('enseignant');


  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {  $Enseignant = Enseignant::find($id);
    
     return view('Enseignant.VoireEnseignant')->with('Enseignant',$Enseignant);
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
     $Enseignant = Enseignant::find($id);
    
     return view('Enseignant.ModifierEnseignant')->with('Enseignant',$Enseignant);
    
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
        'enseig_nom'=> 'required|max:20', 
        'enseig_prenom'=>'required|max:20',
        'enseig_code'=>'required|unique:enseignant,enseig_code,'.$id.'|digits_between:5,10',
        'enseig_sexe'=> 'required',
        'enseig_adresse'=>'required|max:255', 
        'enseig_tel'=>'digits:8',
        'enseig_mobile'=>'digits:8',
        'email' => 'required|email|unique:enseignant,email,'.$id
        
        
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
$Enseignant = Enseignant::find($id);

     $Enseignant->enseig_code= $request->get('enseig_code'); 
     $Enseignant->enseig_prenom= $request->get('enseig_prenom');
     $Enseignant->enseig_nom=$request->get('enseig_nom');
     $Enseignant->enseig_sexe= $request->get('enseig_sexe');
     $Enseignant->enseig_tel= $request->get('enseig_tel') ;
     $Enseignant->enseig_mobile= $request->get('enseig_mobile') ;
     $Enseignant->enseig_adresse= $request->get('enseig_adresse');
     $Enseignant->enseig_grade_code='';
     $Enseignant->enseig_grade_nom= $request->get('enseig_grade_nom');
     $Enseignant->enseig_specialite_code='';
     $Enseignant->enseig_specialite_nom= $request->get('enseig_specialite_nom') ;
     $Enseignant->enseig_status_code='';
     $Enseignant->enseig_status_nom='';
     $Enseignant->email= $request->get('email');
     $Enseignant->enseig_status= '1';

                                   
   
    
     
    $Enseignant->save();
   return Redirect:: to('enseignant');

    
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