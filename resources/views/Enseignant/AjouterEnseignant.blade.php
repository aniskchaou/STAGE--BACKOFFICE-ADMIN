



@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/enseignant') }}">Gérer Les Enseignants</a></li>
  <li class="active">Ajouter Enseignant</li>
</ol>



<hr>
<div class="container-fluid">
	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
			
			
                    
             <legend>  &nbsp;<i class="fa fa-user-plus fa-lg"></i>&nbsp;<i>Ajouter Enseignant</i></legend>
				
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

                      

	                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/enseignant')}}">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         

						
                        <div class="form-group">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="enseig_nom" value="{{old('enseig_nom') }}">	    
							</div>
						</div>

					    <div class="form-group">
							<label class="col-md-4 control-label">Prenom</label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="enseig_prenom" value="{{old('enseig_prenom') }}">	    
							</div>
						</div> 
					   
						<div class="form-group">
							<label class="col-md-4 control-label">Code</label>
							<div class="col-md-6">
								<input type="text" class="form-control"  name="enseig_code" value="{{old('enseig_code') }}">
							</div>
						</div>

					
						<div class="form-group">
							<label class="col-md-4 control-label">Sexe</label>
							<div class="col-md-2">
						     <select class="form-control chosen-select-no-single" data-placeholder="sélectionner" name="enseig_sexe" value="{{ old('enseig_sexe') }}">
                                <option value=""></option>
                                <option value="homme" >homme</option>
                                <option value="femme" >femme</option>
                             </select>
                             </div>
						</div> 

                 



   

	                  

	                    <div class="form-group">
							<label class="col-md-4 control-label">Adresse</label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="enseig_adresse" value="{{ old('enseig_adresse') }}">	    
							</div>
						</div>

						  <div class="form-group">
							<label class="col-md-4 control-label"> N° Téléphone </label>
							<div class="col-md-6">
								<div class="input-group">
                                 <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-earphone"></span></span>
							<input type="text" class="form-control" name="enseig_tel" value="{{old('enseig_tel') }}">	    
							</div>
						</div>
						</div>
                        
					    <div class="form-group">
							<label class="col-md-4 control-label"> N° Téléphone mobile</label>
							<div class="col-md-6">
								<div class="input-group">
                                 <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-phone"></span></span>
							<input type="text" class="form-control" name="enseig_mobile" value="{{old('enseig_mobile') }}">	    
							</div>
						</div>
						</div>

						 <div class="form-group">
							<label class="col-md-4 control-label"> E-Mail </label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="email" value="{{ old('email') }}">	    
							</div>
						</div>

						

                         <div class="form-group">
							<label class="col-md-4 control-label">Grade</label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="enseig_grade_nom" value="{{old('enseig_grade_nom') }}">	    
							</div>
						</div>
					   <div class="form-group">
							<label class="col-md-4 control-label"> Spécialité </label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="enseig_specialite_nom" value="{{old('enseig_specialite_nom') }}">	    
							</div>
						</div>
					

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
								 <span class="glyphicon glyphicon-floppy-open"></span>
								 Enregistrer
								</button>
								
								<button type="reset" class="btn btn-danger">
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