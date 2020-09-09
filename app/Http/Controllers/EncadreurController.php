<?php namespace App\Http\Controllers;

use App\Enseignant;
use App\Stage;
use App\Encadreur;
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

class EncadreurController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */

  public function affecter( $id)
  {$Stage = Stage::find($id);
   $specialite= DB::select('SELECT DISTINCT enseig_specialite_nom FROM enseignant WHERE enseig_specialite_nom  <>\'\'');
    $Enseignant = DB::select('select * from enseignant where (id not in (select enseig_id from encadreur e where e.stage_id ='.$id.'))'); 
   return view('Encadreur.affecterEncadreur')->with('Enseignant',$Enseignant)->with('Stage',$Stage)->with('specialite',$specialite);  

  }
    public function affecterEn($id)
  {
   $Enseignant = DB::select('select * from enseignant where (id not in (select enseig_id from encadreur e where e.stage_id ='.$id.'))');
  foreach( $Enseignant as $Et)
  {


      

    $Encadreur = Encadreur::create(array(
                                           'stage_id'=>$id,
                                          'enseig_id'=>$Et->id,
                                          ));
             $Encadreur->save();
        

  }

return Redirect:: to('stage/'.$id); 
  }


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
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
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
  { Encadreur::find($id)->delete();
 return Redirect::back();
    
  }
  
}

?>