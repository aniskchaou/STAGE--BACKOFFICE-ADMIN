@extends('app')

@section('conten')


	<div class="row ">
		<div class="col-md-12">
			<div class="row ">
				<div class="col-md-3 column">
					
                  
						<div class="list-group">
						  <a href="#" class="list-group-item active">
						 <strong> Aujourd'hui</strong>  <span class="badge"><strong><?php echo date('d/m/y h:i');?></strong> </span>
						  </a>
						  <a href="{{ route('soutenance.souteNonPlanifie')}}" class="list-group-item">
						            	
										Soutenance(s) en attente 
										</a>
						  <a href="{{ url('stage/stageEnAttente')}}" class="list-group-item">Stage(s) en attente</a>
						  <a href="{{ url('/offre_d_emploi/emploiEnAttente')}}" class="list-group-item">Emploie(s) en attente</a>
						 
						</div>
		
						<div class="list-group">

  <a class="list-group-item" href="{{ url('/home') }}"><i class="fa fa-home fa-fw"></i>&nbsp; Acceuil</a>
  <a class="list-group-item" href="{{ url('/filiere') }}" ><i class="fa fa-tags fa-fw"></i>&nbsp; Filière</a>
  <a class="list-group-item" href="{{ url('/soutenance_salle') }}"><i class="fa fa-university fa-fw"></i>&nbsp; Gérer les salles</a>
  <a class="list-group-item" href="{{ url('/type_stage') }}"><i class="fa fa-sitemap fa-fw"></i>&nbsp; Types de stage</a>
  <a class="list-group-item" href="{{ route('configuration.edit',1) }}"><i class="fa fa-wrench fa-fw"></i>&nbsp; Configuration</a>

</div>
				
				</div>
				<div class="col-md-9 column">
					
					<h2>
						Qui est <i>Stage+</i>
					</h2>
					<p> 
						<?php // echo $Cnf->introdu ;?>
				   </p>
					
					
                 
			<div class="media well">
					<div class="page-header">
						<h1>
							Tâches en attente <small> </small>
						</h1>
					</div>
					<div class="row">
						
						<div class="col-md-4">
							<div class="thumbnail">
								<img alt="300x200" src="{{ asset('/images/stage.jpg')}}">
								<div class="caption">
									<h3>
									<i class="fa fa-book fa-x4"></i> Stages en attente
									</h3>
									<h4></h4>
									<p>
										
										<a href="{{ url('stage/stageEnAttente')}}" class="btn btn-default btn-xs"><i class="fa fa-book fa-lg"></i> Découvrir</a>
									</p>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="thumbnail">
								<img alt="300x200" src="{{ asset('/images/images.jpg')}}">
								<div class="caption">
									<h3>
									<i class="fa fa-graduation-cap fa-x4"></i>	Soutenances Non Organisées 
									</h3>
									<h4></h4>
									<p>
										<a href="{{ route('soutenance.souteNonPlanifie')}}" class="btn btn-default btn-xs"><i class="fa fa-graduation-cap fa-lg"></i> Découvrir</a>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="thumbnail">
								<img alt="300x200" src="{{ asset('/images/emploi.jpg')}}">
								<div class="caption">
									<h3>
										<i class="fa fa-briefcase fa-x4"></i> Offres d'emplois en attente 
									</h3>
								<h4></h4>	
									<p>
                                    	<a href="{{ url('/offre_d_emploi/emploiEnAttente')}}" class="btn btn-default btn-xs"><i class="fa fa-briefcase fa-lg"></i> Découvrir</a>
									</p>
								</div>
							</div>
						</div>
						
					</div>
				</div>




<div class="form-horizontal" >


				    <h2>
						Stages
						<hr>
					</h2>
					<p></p>

@foreach($Stage as $Str)
<div class="thumbnail">					
<div class="row">
  <div class="col-sm-6 col-md-12">
    
    
      <div class="caption">
      	<label class="col-md-2 control-label"><i class="fa fa-book fa-5x"></i></label>
							<div class="col-md-10">
        
        <p>
ajouté le <?php echo date("d/m/Y h:i", strtotime($Str->created_at))?>, date fin <?php echo date("d/m/Y ", strtotime($Str->stage_dete_fin))?> , 

  @if($Str->stage_status=="En attente d'affectation") 
              <span class="label label-info">En attente d'affectation</span> 

              @endif
              @if($Str->stage_status=="En attente de validation finale") 
              <span class="label label-primary">En attente de validation finale</span> 
         
              @endif

              @if($Str->stage_status=="Valide") 
              <span class="label label-success">Valide</span> 
            
              @endif <br>
<b>Titre :</b> {{$Str->stage_title}}<br>
 <b>Type : </b>                      @foreach($Type_stage as $type)
                       @if($type->id==$Str->type_id)

                      {{$type->type_nom}} <br>
                       @endif 
                      @endforeach

<b>Entreprise :</b> 
 @foreach($Entreprise as $Ent)
                       @if($Ent->id==$Str->entreprise_id)
                       <a href="{{ route('entreprise.show',$Ent->id) }}" class="btn"   data-toggle="tooltip" data-placement="top" title="Afficher Entreprise">{{$Ent->ent_nom}} </a>
                       @endif 
                      @endforeach

<br>

        </p>
    </div>
       
         <p> <em class="pull-right">
              <a href="{{ route('stage.show',$Str->id) }}" class="btn btn-default btn-xs"   data-toggle="tooltip" data-placement="top" title="Afficher"><i class="fa fa-search fa-lg"></i>Détails</a> 
          </em></p>
          <br>
      </div>
    </div>
  </div>
</div>
 @endforeach
 <?php echo $Stage->render() ?>

    

				   	    <h2>
						Offres d'emploies
						<hr>
					</h2>

					<p> 
						
				   </p>

 @foreach($Offre_d_emploi as $Of)
 <div class="thumbnail">				   
<div class="row">
  <div class="col-sm-6 col-md-12">
    
    
      <div class="caption">
      	<label class="col-md-2 control-label"><i class="fa fa-briefcase fa-5x"></i></label>
							<div class="col-md-10">
        
        <p>

<b>Date d'expiration :</b> <?php echo date("d/m/Y", strtotime($Of->emploi_date_fin))?><br>
<b>Titre :</b>{{$Of->emploi_titre}}<br>
<b>Nombre de postes :</b>{{$Of->emploi_nbr}}<br>

        </p>
    </div>
       
         <p> <em class="pull-right">
           <a href="{{ route('offre_d_emploi.show',$Of->id) }}" class="btn btn-default btn-xs"   data-toggle="tooltip" data-placement="top" title="Afficher"><i class="fa fa-search fa-lg"></i> Détails</a>
                        
          </em></p>
          <br>
      </div>
    </div>
  </div>
</div>
 @endforeach
 <?php echo $Offre_d_emploi->render() ?>


 <div class="media well">
 
                 		<h2>
						Téléchargements
						<hr>
					</h2>

					<p> 
					
				   </p>
@foreach($Telecharger as $Tele)		   
<div class="thumbnail">
 <div class="row">

  <div class="col-sm-6 col-md-12">
   
    
      <div class="caption">
      	<label class="col-md-2 control-label"><i class="fa fa-download fa-5x"></i></label>
							<div class="col-md-10">
    <p>     
  ajouté le <?php echo date("d/m/Y", strtotime($Tele->created_at ))?><br>

 <b> Titre :</b>  {{$Tele->tele_nom}}  <br>
 </p>
</div>
 <p>  <em class="pull-right">
           <a href=" {{ url('/uploads/'.$Tele->tele_ficher) }} " class="btn btn-default btn-xs"   data-toggle="tooltip" data-placement="top" title="Télécharger"><i class="fa fa-download fa-lg"></i> Télécharger</a>           
          </em></p> <!--asset(-->
<br>     
  </div>
    </div>
  </div>
</div>
 @endforeach               
 <?php echo $Telecharger->render() ?>

</div>
</div>

				</div>
			</div>
		</div>
	</div>



@endsection
