



@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/filiere') }}">Gérer Les Filières</a></li>
  <li class="active">Ajouter Une Filiere</li>
</ol>



<hr>
<div class="container-fluid">
	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				
					
             
				  <legend>  &nbsp;<i class="fa fa-plus-square fa-lg"></i>&nbsp;<i>Ajouter Une Filière</i></legend>
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

                      

	                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/filiere')}}">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         

						
                        <div class="form-group">
							<label class="col-md-4 control-label">Nom Filière</label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="filiere_nom" value="{{old('filiere_nom') }}">	    
							</div>
						</div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
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