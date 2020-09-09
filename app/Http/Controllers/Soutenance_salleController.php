<?php namespace App\Http\Controllers;
use App\Soutenance_salle;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Support\Facades\DB;

class Soutenance_salleController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */


      public function desactiver($id)
   {
       DB::table('soutenance_salle')
            ->where('id', $id)
            ->update(array('salle_status' => 0));
            return redirect()->route('soutenance_salle.index');
    
  }
    public function activer($id)
   {
       DB::table('soutenance_salle')
            ->where('id', $id)
            ->update(array('salle_status' => 1));
            return redirect()->route('soutenance_salle.index');
    
  }
  public function index()
  {
      $Soutenance_salle = Soutenance_salle::all();
   

  
    return view('Salle.AfficheSalle')->with('Soutenance_salle',$Soutenance_salle);
  


  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
     return view('Salle.AjouterSalle');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
     $v = Validator::make($request->all(), [

           'salle_nom'=>'required|unique:soutenance_salle|max:100',
           'salle_nb_plase'=>'required|integer',
        
 
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
         $Soutenance_salle = Soutenance_salle::create(array(
         'salle_nom'=>$request->get('salle_nom'),
         'salle_nb_plase'=>$request->get('salle_nb_plase')

      ));



    
 
    $Soutenance_salle->save();
   return Redirect:: to('soutenance_salle');
    
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
     
     $Soutenance_salle = Soutenance_salle::find($id);
    return view('Salle.ModifierSalle')->with('Soutenance_salle',$Soutenance_salle);


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

           'salle_nom'=>'required|unique:soutenance_salle,salle_nom,'.$id.'|max:100',
           'salle_nb_plase'=>'required|integer',
        
 
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
         $Soutenance_salle = Soutenance_salle::find($id);
         $Soutenance_salle->salle_nom=$request->get('salle_nom');
         $Soutenance_salle->salle_nb_plase=$request->get('salle_nb_plase');

 
    $Soutenance_salle->save();
   return Redirect:: to('soutenance_salle');
    
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