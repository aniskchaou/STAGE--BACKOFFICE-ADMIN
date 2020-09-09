<?php namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */


  public function modifEmail($id)
  {if(Auth::guest())
    {return view('auth.login');}
    
  $User = User::find($id); 
   return view('Profil.ModifierEmail')->with('User',$User);
  }

 public function ModifierEmail($id,Request $request)
  {  if(Auth::guest())
    {return view('auth.login');}

   $v = Validator::make($request->all(), [
         
        'Email'=>'required|email',
        'Verification_Email'=> 'required|same:Email', 
    ]);
  if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }

    $User = User::find($id); 

  
   $User->email= Input::get('Email');
   
 $User->save();
return Redirect:: to('/home')->with('message', 'Votre E-Mail a bien été modifier');

    
  }

   public function modifMotPasse($id)
  { if(Auth::guest())
    {return view('auth.login');}

   $User = User::find($id); 
   return view('Profil.ModifierMotPasse')->with('User',$User);

  }


   public function modifierMotPasse($id,Request $request)
  {  
       if(Auth::guest())
    {return view('auth.login');}
    $v = Validator::make($request->all(), [
         
        'enmp'=>'required',
        
    ]);

    
  if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }

$User = User::find($id);

 if( Hash::check(Input::get('enmp'), $User->password))
     {}else{ 
      $v->errors()->add('error', 'Votre  ancien mot de passe est incorrect.');
        return redirect()->back()->withErrors($v->errors())->withInput();
     }

   $v = Validator::make($request->all(), [
        'Mot_de_passe'=> 'required|min:8', 
        'VMot'=>'required|same:Mot_de_passe',
    ]);
    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
  

  
   $User->password= bcrypt(Input::get('Mot_de_passe'));
   
 $User->save();
return Redirect:: to('/home')->with('message', 'Votre Mot de passe a bien été modifié');

  //  return Crypt::decrypt($User->password) .' <br> '. Input::get('enmp');
  }

  public function index()
  {  
    if(Auth::guest())
    {return view('auth.login');}
   else {return view('Profil.profil');}
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
    
  
    
  return view('Profil.ModifierProfil');
  }


 







  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id,Request $request)
  {   $v = Validator::make($request->all(), [
        'nom'=> 'required|max:20', 
        'prenom'=>'required|max:20',
       
        'Login'=> 'required',
        
        'tel'=>'required|digits:8',
       
       
    ]);
  if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }

    $User = User::find($id); 

   $User->nom= Input::get('nom');
   $User->prenom= Input::get('prenom') ;
   $User->name= Input::get('Login');
   $User->tel= Input::get('tel');
   
 $User->save();
return Redirect:: to('user')->with('message', 'Votre profil a bien été modifié');

    
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