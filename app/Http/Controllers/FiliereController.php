<?php namespace App\Http\Controllers;

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
class FiliereController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */

  public function index()
  {
        $Filiere = Filiere::all();
   

  
    return view('Filiere.AfficheFiliere')->with('Filiere',$Filiere);
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
     return view('Filiere.AjouterFiliere');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
     $v = Validator::make($request->all(), [
        'filiere_nom'=> 'required|unique:filiere|max:100', 
 
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors());
    }
     $Filiere = Filiere::create( $request->all());
    $Filiere->save();
   return Redirect:: to('filiere');
    
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
  { $Filiere=Filiere::find($id);
    return view('Filiere.ModifierFiliere')->with('Filiere',$Filiere);
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
        'filiere_nom'=> 'required|unique:filiere,filiere_nom,'.$id.'|max:100', 
 
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors());
    }
    $Filiere= Filiere::find($id);
     $Filiere->filiere_nom=$request->get('filiere_nom');
    $Filiere->save();
   return Redirect::to('filiere');
    
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