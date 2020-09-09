
@extends('app')
@section('conten')

<div id="non-printable">

<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/admin') }}">Gérer Les Administrateurs</a></li>
  <li class="active">Ajouter Administrateur</li>
</ol>



<hr>

      
 
 </div>
	<div class="container-fluid">
		
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				
				<legend>  &nbsp; <i class="fa fa-pencil-square-o fa-1x"></i>&nbsp;<i>Ajouter Administrateur</i></legend>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Oups!</strong> Il y avait quelques problèmes avec votre entrée.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
	              
                         <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin')}}">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         
					
                        <div class="form-group">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-4">
							  
							<input type="text" class="form-control" name="nom" value="{{old('nom') }}">	
							</div>
						</div>
					    <div class="form-group">
							<label class="col-md-4 control-label">Prenom</label>
							<div class="col-md-4">
							
							<input type="text" class="form-control" name="prenom" value="{{old('prenom') }}">		    
							</div>
						</div> 
						<div class="form-group">
							<label class="col-md-4 control-label">Pseudo</label>
							<div class="col-md-4">
							
							<input type="text" class="form-control" name="Login" value="{{old('Login') }}">		    
							</div>
						</div> 
						<div class="form-group">
						 <label class="col-md-4 control-label"></label>
							<div class="col-md-4">

						         <label class="col-md-6 checkbox">
                                  <input  type="checkbox" name="status" value="1">&nbsp;Super administrateur
                                 </label>
                             </div>
						</div>
					  

						 <div class="form-group">
							<label class="col-md-4 control-label">N° Téléphone</label>
							<div class="col-md-4">
								<div class="input-group">
                                 <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-phone"></span></span>
							<input type="text" class="form-control" name="tel" value="{{old('tel') }}">	    
							</div>
						</div>
						</div>


						<div class="form-group">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-4">
							<div class="input-group">
                                 <span class="input-group-addon" ><i class="fa fa-at fa-lg"></i></span>
							<input type="email" class="form-control" name="email" value="{{old('email') }}">		    
							</div>
						    </div>
						</div> 
						<div class="form-group">
							<label class="col-md-4 control-label">Mot de passe</label>
							<div class="col-md-4">
							<div class="input-group">
                                 <span class="input-group-addon" ><i class="fa fa-lock fa-lg"></i></span>
							<input type="password" class="form-control" name="password" value="">		    
							</div>
						    </div>
						</div> 




						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                <a href="javascript:history.back()" class="btn btn-default btn-sm">
		                        	<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	                         	</a>

								<button type="submit" class="btn btn-primary btn-sm">
								 <span class="glyphicon glyphicon-floppy-open"></span>
								 Enregistrer
								</button>
							    <button type="reset" class="btn btn-danger btn-sm">
                                   <span class="glyphicon glyphicon-remove"></span>
                                    Annuler
                                </button>
								
							</div>
						</div>


                      </form>
					</div>
				</div>
			</div>
		</div>
	</div>
    </div>
@endsection