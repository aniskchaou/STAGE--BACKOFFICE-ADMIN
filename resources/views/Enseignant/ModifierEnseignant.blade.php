



@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/enseignant') }}">Gérer Les Enseignants</a></li>
  <li class="active">Modifier Enseignant</li>
</ol>



<hr>
<div class="container-fluid">
	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
		
				<legend>  &nbsp;<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;<i>Modifier Enseignant</i></legend>
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

                      

	                 <form class="form-horizontal" role="form" method="POST" action="{{ url('enseignant/'.$Enseignant->id)}}">
                         <input name="_method" type="hidden" value="PUT">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         

						
                        <div class="form-group">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="enseig_nom" value="{{$Enseignant->enseig_nom }}">	    
							</div>
						</div>

					    <div class="form-group">
							<label class="col-md-4 control-label">Prenom</label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="enseig_prenom" value="{{$Enseignant->enseig_prenom }}">	    
							</div>
						</div> 
					   
						<div class="form-group">
							<label class="col-md-4 control-label">Code</label>
							<div class="col-md-6">
								<input type="text" class="form-control"  name="enseig_code" value="{{$Enseignant->enseig_code}}">
							</div>
						</div>

					
						<div class="form-group">
							<label class="col-md-4 control-label">Sexe</label>
							<div class="col-md-2">
						     <select class="form-control chosen-select-no-single" data-placeholder="sélectionner" name="enseig_sexe">
                                  @if( $Enseignant->enseig_sexe == "homme" )
                                <option value="homme" selected="selected" >homme</option>
                                <option value="femme" >femme</option>
                                @else
                                <option value="homme" >homme</option>
                                <option value="femme" selected="selected" >femme</option>
                                @endif
                             </select>
                             </div>
						</div> 

                 



   

	                  

	                    <div class="form-group">
							<label class="col-md-4 control-label">Adresse</label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="enseig_adresse" value="{{ $Enseignant->enseig_adresse }}">	    
							</div>
						</div>

						  <div class="form-group">
							<label class="col-md-4 control-label"> N° Téléphone </label>
							<div class="col-md-6">
								<div class="input-group">
                                 <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-earphone"></span></span>
							<input type="text" class="form-control" name="enseig_tel" value="{{$Enseignant->enseig_tel}}">	    
							</div>
						</div>
						</div>
                        
					    <div class="form-group">
							<label class="col-md-4 control-label"> N° Téléphone mobile</label>
							<div class="col-md-6">
								<div class="input-group">
                                 <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-phone"></span></span>
							<input type="text" class="form-control" name="enseig_mobile" value="{{$Enseignant->enseig_mobile}}">	    
							</div>
						</div>
						</div>

						 <div class="form-group">
							<label class="col-md-4 control-label"> E-Mail </label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="email" value="{{$Enseignant->email}}">	    
							</div>
						</div>

						

                         <div class="form-group">
							<label class="col-md-4 control-label">Grade </label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="enseig_grade_nom" value="{{$Enseignant->enseig_grade_nom}}">	    
							</div>
						</div>
					   <div class="form-group">
							<label class="col-md-4 control-label"> Spécialité </label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="enseig_specialite_nom" value="{{$Enseignant->enseig_specialite_nom}}">	    
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