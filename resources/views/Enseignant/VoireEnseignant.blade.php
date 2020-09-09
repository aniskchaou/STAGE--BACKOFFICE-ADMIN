



@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/enseignant') }}">Gérer Les Enseignants</a></li>
  <li class="active">Consulter Enseignant</li>
</ol>



<hr>
<ol class="breadcrumb">
  <a href="{{ url('/enseignant/create')}}" class="btn btn-primary btn-sm"> Ajouter un Enseignant  <i class="fa fa-user-plus fa-lg"></i></a>
</ol>
<div class="container-fluid">
	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
<legend>  &nbsp; <i class="fa fa-user fa-1x"></i>&nbsp;<i>Consulter Enseignant</i></legend>
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
								<label class="control-label">{{$Enseignant->enseig_nom }}</label>
							    
							</div>
						</div>

					    <div class="form-group">
							<label class="col-md-4 control-label">Prenom</label>
							<div class="col-md-6">
								<label class="control-label">{{$Enseignant->enseig_prenom }}	 </label>
							   
							</div>
						</div> 
					   
						<div class="form-group">
							<label class="col-md-4 control-label">Code</label>
							<div class="col-md-6">
								<label class="control-label">{{$Enseignant->enseig_code}}</label>
								
							</div>
						</div>

					
						<div class="form-group">
							<label class="col-md-4 control-label">Sexe</label>
							<div class="col-md-6">
								<label class="control-label">{{$Enseignant->enseig_sexe}}</label>
						    
                          
                             </div>
						</div> 

                 



   

	                  

	                    <div class="form-group">
							<label class="col-md-4 control-label">Adresse</label>
							<div class="col-md-6">
								<label class="control-label">{{ $Enseignant->enseig_adresse }}</label>
								    
							</div>
						</div>

						  <div class="form-group">
							<label class="col-md-4 control-label"> N° Téléphone </label>
							<div class="col-md-6">
								<label class="control-label">+216 {{$Enseignant->enseig_tel}}</label>
							
						</div>
						</div>
                        
					    <div class="form-group">
							<label class="col-md-4 control-label"> N° Téléphone mobile</label>
							<div class="col-md-6">
								<label class="control-label">+216 {{$Enseignant->enseig_mobile}}</label>
								
                                
							
						</div>
						</div>

						 <div class="form-group">
							<label class="col-md-4 control-label"> E-Mail </label>
							<div class="col-md-6">
								<label class="control-label">{{$Enseignant->email}}</label>
							    
							</div>
						</div>

						

                         <div class="form-group">
							<label class="col-md-4 control-label">Grade </label>
							<div class="col-md-6">
								<label class="control-label">{{$Enseignant->enseig_grade_nom}}</label>
								    
							</div>
						</div>
					   <div class="form-group">
							<label class="col-md-4 control-label"> Spécialité </label>
							<div class="col-md-6">
								<label class="control-label">{{$Enseignant->enseig_specialite_nom}}</label>
							    
							</div>
						</div>
					

							<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                <a href="javascript:history.back()" class="btn btn-primary btn-sm">
		                        	<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	                         	</a>

								<a href="{{ route('enseignant.edit',$Enseignant->id) }}" class="btn btn-default btn-sm"   data-toggle="tooltip" data-placement="top" title="Modifier"><span class="glyphicon glyphicon-pencil"></span>Modifier</a>
                    
								
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