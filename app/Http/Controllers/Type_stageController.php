<?php namespace App\Http\Controllers;
use App\Type_stage;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Support\Facades\DB;
class Type_stageController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */


  public function index()
  {
      $Type_stage = Type_stage::all();
   

  
    return view('Type_stage.AfficheType_stage')->with('Type_stage',$Type_stage);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('Type_stage.AjouterType_stage');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $v = Validator::make($request->all(), [
        'type_nom'=>'required|unique:type_stage|max:100',
        'type_dur_max'=>'required|integer',
        'type_dur_min'=>'required|integer|max:'.$request->get('type_dur_max'),
        'type_nb_max'=>'required|integer',
        'type_nb_min'=>'required|integer|max:'.$request->get('type_nb_max'),
 
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
     $Type_stage = Type_stage::create(array(
          'type_nom'=>$request->get('type_nom'),
      'type_dur_max'=>$request->get('type_dur_max'),
      'type_dur_min'=>$request->get('type_dur_min'),
    'type_encadreur'=>$request->get('type_encadreur') ? '1':'0',
  'type_obligatoire'=>$request->get('type_obligatoire') ? '1':'0',
   'type_soutenable'=>$request->get('type_soutenable') ? '1':'0',
       'type_nb_max'=>$request->get('type_nb_max'),
       'type_nb_min'=>$request->get('type_nb_max')


      ));
 
    $Type_stage->save();
   return Redirect:: to('type_stage');
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

    $Type_stage = Type_stage::find($id);
    return view('Type_stage.ModifierType_stage')->with('Type_stage',$Type_stage);
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id,Request $request)
  {    $v = Validator::make($request->all(), [
        'type_nom'=>'required|unique:type_stage,type_nom,'.$id.'|max:100',
        'type_dur_max'=>'required|integer',
        'type_dur_min'=>'required|integer|max:'.$request->get('type_dur_max'),
        'type_nb_max'=>'required|integer',
        'type_nb_min'=>'required|integer|max:'.$request->get('type_nb_max'),
 
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
    $Type_stage = Type_stage::find($id);
       
    $Type_stage->type_nom=$request->get('type_nom');
    $Type_stage->type_dur_max=$request->get('type_dur_max');
    $Type_stage->type_dur_min=$request->get('type_dur_min');
    $Type_stage->type_encadreur=$request->get('type_encadreur') ? '1':'0';
    $Type_stage->type_obligatoire=$request->get('type_obligatoire') ? '1':'0';
    $Type_stage->type_soutenable=$request->get('type_soutenable') ? '1':'0';
    $Type_stage->type_nb_max=$request->get('type_nb_max');
    $Type_stage->type_nb_min=$request->get('type_nb_min');

    $Type_stage->save();
   return Redirect::to('type_stage');


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