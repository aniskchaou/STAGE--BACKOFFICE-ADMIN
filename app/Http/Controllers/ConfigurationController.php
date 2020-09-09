<?php namespace App\Http\Controllers;
use App\Configuration;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Support\Facades\DB;

class ConfigurationController extends Controller {

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
    $Configuration=Configuration::find(1);
    return view('Configuration.ModifierConfiguration')->with('Cnf',$Configuration);
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
        'soutenance_dur_max'=> 'required|integer|max:120|min:5', 
        'nbr_elemont'=>'required|integer|max:20|min:2',
        'introdu'=>'required'
         
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
   $Configuration=Configuration::find(1);
/*
     $Configuration->soutenance_dur_max= 6; 
     $Configuration->nbr_elemont= 2;
     $Configuration->introdu="";
     $Configuration->save();
   */
   return Redirect:: to('home');
    
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