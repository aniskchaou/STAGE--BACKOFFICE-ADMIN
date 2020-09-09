
@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/entreprise') }}">Gérer Les Entreprises</a></li>
  <li class="active">Consulter Entreprise</li>
</ol>



<hr>
<ol class="breadcrumb">
<a href="{{ url('/entreprise/create')}}" class="btn btn-primary btn-sm"> Ajouter une Entreprise  <span class="glyphicon glyphicon-plus-sign"></span></a>
</ol>
	<div class="container-fluid">
		
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
			
				<legend>&nbsp;<i class="fa fa-university"></i>&nbsp;<i>Consulter Entreprise</i></legend>
				<div class="panel-body">

                      

	                 <form class="form-horizontal" role="form" method="POST" action="{{ url('entreprise/'.$Entreprise->id)}}">
	                 	 
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						
					
						
						
						
					
						
						
                        <div class="form-group">
							<label class="col-md-4 control-label">Nom de l'établissement</label>
							<div class="col-md-6">
								<label class="control-label">{{$Entreprise->ent_nom}}</label>
							    
							</div>
						</div>
					    <div class="form-group">
							<label class="col-md-4 control-label">Statut juridique</label>
							<div class="col-md-6">
								<label class="control-label">{{$Entreprise->ent_statut_juridique}}</label>
							    
							</div>
						</div> 
					   
						
                        
                         <div class="form-group">
							<label class="col-md-4 control-label">Secteur d'activité</label>
							<div class="col-md-6">
								<label class="control-label">{{$Secteur->secteur_nom}}</label>
						     
                             </div>
						</div> 
                      
						<div class="form-group">
							<label class="col-md-4 control-label">Effectif</label>
							<div class="col-md-6">
								<label class="control-label">{{$Entreprise->ent_nbr}}</label>
								    
							</div>
						</div>
					
                        

	                    <div class="form-group">
							<label class="col-md-4 control-label">Pays</label>
							<div class="col-md-6">
								<label class="control-label">{{$Entreprise->ent_pays}}</label>	    
							</div>
						</div>

					    <div class="form-group">
							<label class="col-md-4 control-label">Ville</label>
							<div class="col-md-6">
								<label class="control-label">{{$Entreprise->ent_ville}}</label>    
							</div>
						</div>

	                    <div class="form-group">
							<label class="col-md-4 control-label">Adresse</label>
							<div class="col-md-6">
								<label class="control-label">{{$Entreprise->ent_adresse}}</label>
								    
							</div>
						</div>
							
						
						
						
					
						<div class="form-group">
							<label class="col-md-4 control-label"> Fax</label>
							<div class="col-md-6">
								<label class="control-label">{{$Entreprise->ent_fax}}</label>
							</div>
						</div>
                        
					    <div class="form-group">
							<label class="col-md-4 control-label"> Téléphone </label>
							<div class="col-md-6">
								<label class="control-label">{{$Entreprise->ent_tel}}</label>
							</div>
						</div>

					     <div class="form-group">
							<label class="col-md-4 control-label"> Site Web </label>
							<div class="col-md-6">
								<label class="control-label">{{$Entreprise->ent_web}}</label>
								</div>
						 </div>

                        <div class="form-group">
							<label class="col-md-4 control-label"> E-Mail </label>
							<div class="col-md-6">
								<label class="control-label">{{$Entreprise->email}}</label>
							
						    </div>
					    </div>
 

                 
	                     <div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                <a href="javascript:history.back()" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Retour">
		                        	<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	                         	</a>
                               <a href="{{ route('entreprise.edit',$Entreprise->id) }}" class="btn btn-default btn-sm"   data-toggle="tooltip" data-placement="top" title="Modifier {{$Entreprise->ent_nom}}"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>
                        
                                   @if ($Entreprise->ent_status == '1')    
                                    <a href="{{ route('entreprise.desactiver', $Entreprise->id) }}" data-confirm="Etes-vous certain de vouloir archivé?" class="btn btn-danger btn-sm "data-toggle="tooltip" data-placement="top" title="Archivé {{$Entreprise->ent_nom}}"><span class="glyphicon glyphicon-remove"></span>  Archivé</a>      
                                    @else
                                    <a href="{{ route('entreprise.activer', $Entreprise->id) }}" class="btn btn-success btn-sm"data-toggle="tooltip" data-placement="top" title="Activer {{$Entreprise->ent_nom}}"><span class="glyphicon glyphicon-ok"></span>  Activer</a>      
                                   @endif


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