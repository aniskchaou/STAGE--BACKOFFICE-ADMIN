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

class AdminController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {if(Auth::guest())
    {return view('auth.login');}
    $User = User::all(); 
   return view('admin.AfficheAdmin')->with('User',$User);
    

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    if( Auth::user()->status==0)
    {return Redirect:: to('admin');}
    return view('admin.AjouterAdmin');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {   $v = Validator::make($request->all(), [
       'nom'=> 'required|max:20', 
        'prenom'=>'required|max:20',
        'email'=>'required|email|unique:users',
        'Login'=> 'required',
        
        'tel'=>'required|digits:8',
       'password'=>'required|min:8',
       
    ]);
  if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput();
    }

      $User = User::create(    
                                 array(     'name'=>Input::get('Login'),
                                            'tel'=>Input::get('tel'),
                                            'prenom'=>Input::get('prenom'),
                                            'nom'=>Input::get('nom'),
                                            'email'=>Input::get('email'),
                                            'password'=>bcrypt(Input::get('password')),
                                            'status'=>Input::get('status')? '1':'0',
                                       )
                                    );
   
         $User->save();
return Redirect:: to('admin')->with('message', 'L\'administrateur a bien été créé');
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
  { if( Auth::user()->status==0)
    {return Redirect:: to('admin');}
    $User = User::find($id); 
  return view('admin.ModifierAdmin')->with('User',$User);
  
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
        'email'=>'required|email|unique:users,email,'.$id,
        'Login'=> 'required',
        
        'tel'=>'required|digits:8',
       'password'=>'min:8',
       
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
   $User->email=Input::get('email');
   if (Input::get('password')!='') {
      $User->password=bcrypt(Input::get('password'));
   }
  
   $User->status=Input::get('status')? '1':'0';
   

   
    $User->save();
   return Redirect:: to('admin')->with('message','L\'administrateur a bien été modifié');

    
  }
  

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
     User::find($id)->delete();
 return Redirect::back();
  }
  
}

?>