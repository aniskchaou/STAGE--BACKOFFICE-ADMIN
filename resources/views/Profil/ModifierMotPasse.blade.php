@extends('app')
@section('conten')

<div id="non-printable">

<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  
  <li class="active">Modifier Mot De Passe</li>
</ol>



<hr>

      
 
 </div>
	<div class="container-fluid">
		
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				
				<legend>  &nbsp; <i class="fa fa-pencil-square-o fa-1x"></i>&nbsp;<i> Modifier Mot De Passe</i></legend>
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

		

	              
                         <form class="form-horizontal" role="form" name="fe" method="POST" action="{{ route('user.modifierMotPasse',$User->id)}}">
                        
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         
                         <div class="form-group">
							<label class="col-md-4 control-label">Ancien mot de passe</label>
							<div class="col-md-4">
							  
							<input type="password" class="form-control" name="enmp" value="">	
							</div>
						</div> 
					
                        <div class="form-group">
							<label class="col-md-4 control-label">Mot de passe</label>
							<div class="col-md-4">
							  
							<input type="password" class="form-control" name="Mot_de_passe" value="{{old('Mot_de_passe')}}">	
							</div>
						</div>
					    <div class="form-group">
							<label class="col-md-4 control-label">Vérification Mot de passe</label>
							<div class="col-md-4">
							
							<input type="password" class="form-control" name="VMot" value="{{old('VMot')}}">		    
							</div>
						</div> 
						


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                <a href="javascript:history.back()" class="btn btn-default btn-sm">
		                        	<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	                         	</a>

								<button type="submit" class="btn btn-primary btn-sm">
									<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;&nbsp;
									Modifier
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