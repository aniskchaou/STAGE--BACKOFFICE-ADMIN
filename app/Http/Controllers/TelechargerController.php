<?php namespace App\Http\Controllers;
use App\Telecharger;
use App\Tele_utilisateur;
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
use Illuminate\Support\Facades\File;
class TelechargerController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */

  public function index()
  {
    $Telecharger= Telecharger::all();
    $Tele_utilisateur= Tele_utilisateur::all();
    return view('Telechargement.AfficheTele')->with(array('Telecharger'=>$Telecharger,'Tele_utilisateur'=>$Tele_utilisateur));
    
  }
 public function  consulter()
  {
    $Telecharger= Telecharger::all();
    return view('Telechargement.ConsulterTele')->with(array('Telecharger'=>$Telecharger));
    
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('Telechargement.Ajoutertele');
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $v = Validator::make($request->all(), [
        'Utilisateur'=>'required',
        'Nom'=>'required',
        'Fichier'=> 'required|mimes:txt,pdf,docx,ppt', 
        ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
  
$image = $request->file('Fichier');
 // $image = $request->file('Fichier');

  
      $chemin = config('uploads.path');

      $extension = $request->file('Fichier')->getClientOriginalExtension();

      do {
        $nom =date('Ymdhis').'.'.$extension;
      } while(file_exists($chemin . '/' . $nom));

      if($image->move(public_path('uploads'), $nom)) {
       

               $Telecharger = Telecharger::create(    
                                 array(  
                                         'tele_nom'=>$request->get('Nom'),
                                         'tele_ficher'=>$nom,
                                      
                                       )
                                    );
   
         $Telecharger->save();
                   
                   foreach($request->get('Utilisateur') as $Util){

                    $Tele_utilisateur=Tele_utilisateur::create(array(
                                                         'utilisa_type'=>$Util,
                                                         'tele_id'=>$Telecharger->id,
                                                         ));
                    $Tele_utilisateur->save();
                   }






       return Redirect:: to('home')->with('message','Votre fichier est envoyé.');
       
      }
    

    return Redirect:: to('home')
      ->with('error','Désolé mais votre fichier ne peut pas être envoyée !');
    
 


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
  {
    
  
$Tele= DB::table('tele_utilisateur')->where('tele_id', $id)->delete();
 
$Telecharger=Telecharger::find($id)->delete();
 return Redirect::back();

 


  }
  
}

?>