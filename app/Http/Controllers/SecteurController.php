<?php namespace App\Http\Controllers;

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
class SecteurController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
        $Secteur = Secteur::all();
   

  
    return view('Secteur.AfficheSecteur')->with('Secteur',$Secteur);
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
     return view('Secteur.AjouterSecteur');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
     $v = Validator::make($request->all(), [
        'secteur_nom'=> 'required|unique:secteur|max:100', 
 
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors());
    }
     $Secteur = Secteur::create( $request->all());
    $Secteur->save();
   return Redirect:: to('secteur');
    
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
  { $Secteur=Secteur::find($id);
    return view('Secteur.ModifierSecteur')->with('Secteur',$Secteur);
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
        'secteur_nom'=> 'required|unique:secteur,secteur_nom,'.$id.'|max:100', 
 
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors());
    }
    $Secteur= Secteur::find($id);
     $Secteur->secteur_nom =$request->get('secteur_nom');
    $Secteur->save();
   return Redirect::to('secteur');
    
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