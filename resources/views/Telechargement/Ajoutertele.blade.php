
@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/telecharger') }}">Gérer Les Téléchargements</a></li>

  <li class="active">Ajouter Un Téléchargement</li>
</ol>



<hr>
<div class="container-fluid">
	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				
					
             
				  <legend>  &nbsp;<i class="fa fa-plus-square fa-lg"></i>&nbsp;<i>Ajouter Un Téléchargement </i></legend>
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

                      

	                 <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/telecharger')}}">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         
                        <div class="form-group">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-5">
							
							<input type="text" class="form-control" name="Nom" value="{{old('Nom') }}" >	    
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Utilisateur</label>
							<div class="col-md-5">
						     <select class="form-control chosen-select" data-placeholder="sélectionner" name="Utilisateur[]" multiple >
                               <option value=""></option>
                               <option value="Étudiants">Étudiants</option>
                               <option value="Enseignants">Enseignants</option>
                               <option value="Entreprises">Entreprises</option>
                             </select>
                             </div>
						</div> 
						
                        <div class="form-group">
							<label class="col-md-4 control-label">Fichier</label>
							<div class="col-md-5">
							
							<input type="file"  class="filestyle" data-iconName="glyphicon-inbox"  data-buttonText="Choisissez un fichier" data-buttonBefore="true"  name="Fichier" id="exampleInputFile">	    
							</div>
						</div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary btn-sm">
								 <i class="fa fa-external-link fa-lg"></i>
								 Envoyer
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