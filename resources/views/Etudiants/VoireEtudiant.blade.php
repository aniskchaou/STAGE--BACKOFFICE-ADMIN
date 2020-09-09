
@extends('app')
@section('conten')



<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/etudiant') }}">Gérer Les Étudiants</a></li>
  <li class="active">Consulter Étudiant</li>
</ol>



<hr>

<ol class="breadcrumb">
 <a href="{{ url('/etudiant/create')}}" class="btn btn-primary btn-sm"> Ajouter un Étudiant&nbsp;&nbsp;<i class="fa fa-user-plus   fa-lg"></i></a>         
          
  </ol>        
 

	<div class="container-fluid">
		
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				
				<legend>  &nbsp; <i class="fa fa-user fa-1x"></i>&nbsp;<i> Consulter Étudiant</i></legend>
				<div class="panel-body">














                      <div class="form-horizontal"  >



	               
                              <div  id="ImprimDiv">
                              	<!--startprint-->
						<div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-4">
								<em class="pull-right">
								<img src="{{  url('/uploads/'.$etudiant->etudiant_image)}}" height="120" width="100" class="img-thumbnail" alt="Responsive image">
							  </em>
							</div>
						</div>
                        <div class="form-group">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-3">
							<label class=" control-label">{{$etudiant->etudiant_nom }} </label>   
							</div>
						</div>
					    <div class="form-group">
							<label class="col-md-4 control-label">Prenom</label>
							<div class="col-md-3">
							<label class=" control-label">{{ $etudiant->etudiant_prenom }}</label>	    
							</div>
						</div> 
					   
						<div class="form-group">
							<label class="col-md-4 control-label">Numero CIN</label>
							<div class="col-md-3">
								<label class=" control-label">{{$etudiant->etudiant_cin }}</label>	
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Matricule</label>
							<div class="col-md-3">
								<label class=" control-label">{{$etudiant->etudiant_mat }}</label>
							    
							</div>

						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Sexe</label>
							<div class="col-md-2">
						     <label class=" control-label">{{$etudiant->etudiant_sexe}}</label>
						    
                             </div>
						</div> 



						



					
                        <div class="form-group">
							<label class="col-md-4 control-label">Date de nissance</label>
							   <div class="col-md-3">


							   	<label class=" control-label">{{$etudiant->etudiant_date_nissance}}</label>


                     
                            </div>
                        </div>

	                    <div class="form-group">
						<tr>	<label class="col-md-4 control-label">Lieu de naissance</label></tr>
							<div class="col-md-6">
							<tr>	<label class=" control-label">{{ $etudiant->etudiant_lieu_naissance }} </label></tr>
							   
							</div>
						</div>

	                    <div class="form-group">
							<label class="col-md-4 control-label">Adresse</label>
							<div class="col-md-6">
								<label class=" control-label">{{ $etudiant->etudiant_adresse}}</label>
						 
							</div>
						</div>
                        
					    <div class="form-group">
							<label class="col-md-4 control-label"> N° Téléphone </label>
							<div class="col-md-6">
								<label class=" control-label">{{$etudiant->etudiant_tel}}</label>
							</div>
						</div>

						 <div class="form-group">
							<label class="col-md-4 control-label"> E-Mail </label>
							<div class="col-md-6">
								<label class=" control-label">{{ $etudiant->email}}</label>
							    
							</div>
						</div>

					    <div class="form-group">
							<label class="col-md-4 control-label">Redoublent</label>
							<div class="col-md-2">
								<label class=" control-label">{{$etudiant->etudiant_rebouble}}</label>
						     
                             </div>
						</div> 
						
                          
						<div class="form-group">
							<label class="col-md-4 control-label">Filiere</label>
							 <div class="col-md-6">
                                @foreach($Filiere as $user)
                                @if ($user->id==$etudiant->etudiant_filiere_id)
                                
                                <label class="control-label ">{{$user->filiere_nom}}</label>
                               
                                @endif
                                @endforeach
                 
                             </div>
						</div> 
                         <div class="form-group">
							<label class="col-md-4 control-label">Niveau  </label>
							<div class="col-md-6">
								<label class=" control-label">{{$etudiant->etudiant_niveau}}</label>
								    
							</div>
						</div>
						 <div class="form-group">
							<label class="col-md-4 control-label"> Code de group </label>
							<div class="col-md-6">
									<label class=" control-label">{{ $etudiant->etudiant_group_code}} </label>
							   
							</div>
						</div>
						 <div class="form-group">
							<label class="col-md-4 control-label">Nom de group  </label>
							<div class="col-md-6">
								<label class=" control-label">{{ $etudiant->etudiant_group_name}}</label>
							    
							</div>
						</div> 
		

<!--endprint-->				
</div> 
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                <a href="javascript:history.back()" class="btn btn-primary btn-sm">
		                        	<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	                         	</a>
                               <a href="{{ route('etudiant.edit',$etudiant->id) }}" class="btn btn-default btn-sm"   data-toggle="tooltip" data-placement="top" title="Modifier"><span class="glyphicon glyphicon-pencil"></span>Modifier</a>
                        <button type="button"  class="btn btn-default btn-sm" onClick="javascript:CallPrint('ImprimDiv');"><span class="glyphicon glyphicon-print"></span> Imprimer</button>
                           
								
							</div>
						</div>




					</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<div class="container-fluid">
	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				
					
             
				  <legend>  &nbsp;<i class="fa fa-picture-o fa-lg"></i>&nbsp;<i>Modifer Photo Étudiant</i></legend>
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

                      

	                 <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('etudiant/etudiantImage/'.$etudiant->id)}}" >
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         
                      
				
						
                        <div class="form-group">
							<label class="col-md-4 control-label">Photo</label>
							<div class="col-md-5">
							
							<input type="file"  class="filestyle" data-iconName="glyphicon-inbox"  data-buttonText="Choisissez une image" data-buttonBefore="true"  name="image" id="exampleInputFile">	    
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












    
@endsection