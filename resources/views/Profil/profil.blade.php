
@extends('app')
@section('conten')

<div id="non-printable">

<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  
  <li class="active">Consulter Mon Profil</li>
</ol>



<hr>

      
 
 </div>
	<div class="container-fluid">
		
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				
				<legend>  &nbsp; <i class="fa fa-user fa-1x"></i>&nbsp;<i> Consulter Mon Profil</i></legend>
				<div class="panel-body">
		

	              
                              <div  class="form-horizontal" >
                              	<!--startprint-->
					
                        <div class="form-group">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-3">
							<label class=" control-label">{{ Auth::user()->nom}} </label>   
							</div>
						</div>
					    <div class="form-group">
							<label class="col-md-4 control-label">Prenom</label>
							<div class="col-md-3">
							<label class=" control-label">{{ Auth::user()->prenom }}</label>	    
							</div>
						</div> 
					   

					
					    <div class="form-group">
							<label class="col-md-4 control-label"> N° Téléphone </label>
							<div class="col-md-6">
								<label class=" control-label">{{ Auth::user()->tel }}</label>
							</div>
						</div>

						 <div class="form-group">
							<label class="col-md-4 control-label"> E-Mail </label>
							<div class="col-md-6">
								<label class=" control-label">{{ Auth::user()->email }}</label>
							    
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Date d'inscription</label>
							   <div class="col-md-3">


							   	<label class=" control-label"> {{ Auth::user()->created_at }}</label>


                     
                            </div>
                        </div>

					
                          
			
                    
					
				

<!--endprint-->				
</div> 
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                <a href="javascript:history.back()" class="btn  btn-default btn-sm">
		                        	<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	                         	</a>
                               <a href="{{ route('user.edit',Auth::user()->id) }}" class="btn btn-primary  btn-sm"   data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fa fa-user fa-lg"></i> Modifier Profil</a>
                               <a href="{{route('user.modifEmail',Auth::user()->id)}}" class="btn btn-warning btn-sm" ><span class="glyphicon glyphicon-envelope"></span> email</a>
                               <a href="{{route('user.modifMotPasse',Auth::user()->id)}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-lock"></span> mot de passe</a>
								
							</div>
						</div>




					
					</div>
				</div>
			</div>
		</div>
	</div>
    </div>
@endsection