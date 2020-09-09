@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/secteur') }}">Gérer Les Secteurs D'activité</a></li>
  <li class="active">Modifier Un Secteur D'activité</li>
</ol>



<hr>
<div class="container-fluid">
	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
			
				<legend>  &nbsp;<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;<i>Modifier Un Secteur D'activité</i></legend>
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

                      

	                 <form class="form-horizontal" role="form" method="POST" action="{{ url('secteur/'.$Secteur->id)}}">
	                 	 <input name="_method" type="hidden" value="PUT">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         

						
                        <div class="form-group">
							<label class="col-md-4 control-label">Nom Secteur</label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="secteur_nom" value="{{$Secteur->secteur_nom }}">	    
							</div>
						</div>


	
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                <a href="javascript:history.back()" class="btn btn-info btn-sm">
		                        	<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	                         	</a>

								<button type="submit" class="btn btn-primary btn-sm">
									<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;&nbsp;
									Modifier
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