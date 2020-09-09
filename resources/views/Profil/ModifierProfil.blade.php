
@extends('app')
@section('conten')

<div id="non-printable">

<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  
  <li class="active">Modifier Mon Profil</li>
</ol>



<hr>

      
 
 </div>
	<div class="container-fluid">
		
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				
				<legend>  &nbsp; <i class="fa fa-pencil-square-o fa-1x"></i>&nbsp;<i> Modifier Mon Profil</i></legend>
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

		

	              
                         <form class="form-horizontal" role="form" method="POST" action="{{ url('user/'.Auth::user()->id)}}">
                         <input name="_method" type="hidden" value="PUT">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         
					
                        <div class="form-group">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-4">
							  
							<input type="text" class="form-control" name="nom" value="{{ Auth::user()->nom}}">	
							</div>
						</div>
					    <div class="form-group">
							<label class="col-md-4 control-label">Prenom</label>
							<div class="col-md-4">
							
							<input type="text" class="form-control" name="prenom" value="{{ Auth::user()->prenom }}">		    
							</div>
						</div> 
						<div class="form-group">
							<label class="col-md-4 control-label">Pseudo</label>
							<div class="col-md-4">
							
							<input type="text" class="form-control" name="Login" value="{{ Auth::user()->name}}">		    
							</div>
						</div> 
					  

						 <div class="form-group">
							<label class="col-md-4 control-label">N° Téléphone</label>
							<div class="col-md-4">
								<div class="input-group">
                                 <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-phone"></span></span>
							<input type="text" class="form-control" name="tel" value="{{ Auth::user()->tel }}">	    
							</div>
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