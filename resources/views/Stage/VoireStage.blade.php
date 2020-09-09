@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}"style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/stage') }}">Gérer Les Stages</a></li>
  <li class="active">Consulter Un Stage</li>
</ol>
<hr>
<ol class="breadcrumb">
 <a href="javascript:history.back()" class="btn btn-default btn-xs"data-toggle="tooltip" data-placement="top" title="Retour" ><span class="glyphicon glyphicon-circle-arrow-left"></span> Retour</a>
                
       <a href="{{ url('/stage/create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus-square fa-lg"></i>&nbsp; Ajouter un Stage </a>

</ol>


<div class="container-fluid">
	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
			
        <legend>  &nbsp;<i class="fa fa-search fa-lg"></i>&nbsp;<i>Consulter Un Stage</i></legend>
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

                      

	                 <div class="form-horizontal"  >
                       
                         

						
            <div class="form-group">
							<label class="col-md-4 control-label">Titre du stage </label>
							<div class="col-md-6"><label class="control-label">{{$Stage->stage_title}}</label>
								    
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Type de stage</label>
							<div class="col-md-5">
						     
                               

                                  <label class="control-label"> {{$Type_stage->type_nom}}</label>
                               
                                  
                             
                             </div>
						</div> 
					    <div class="form-group">
							<label class="col-md-4 control-label">Nombre de candidat</label>
							<div class="col-md-6"><label class="control-label">{{$Stage->stage_nbr_etudiant }}</label>    
							</div>
						</div>
                         <div class="form-group">
                         	<label class="col-md-4 control-label">Date de début</label>
 						                 <div class='col-md-6'>
                              <label class="control-label">{{$Stage->stage_dete_debut}}</label>
                                
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label">Date de fin </label>
                            <div class='col-md-6'><label class="control-label">{{$Stage->stage_dete_fin}}</label>
                                
                                  
                            </div>
                           </div>
            
            <div class="form-group">
							<label class="col-md-4 control-label">Année universitaire </label>
							<div class="col-md-6">
                <label class="control-label">{{$Stage->stage_annee_universitaire}}</label>
							    
							</div>
						</div>
            <div class="form-group">
              <label class="col-md-4 control-label">Sujet </label>
              <div class="col-md-7">
                <label class="control-label"><?php  echo $Stage->stage_sujet; ?> </label>

              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Filiere </label>
                <div class="col-md-5">
               @foreach($Filiere as $fil)
                 @foreach($Stage_filiere as $emp) 
                   @if($emp->filiere_id ==$fil->id)
                     <span class="label label-primary" >{{$fil->filiere_nom}}</span>
                   @endif
                 @endforeach 
               @endforeach 
              </div>
            </div> 

          <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">État de stage </label>  
           <div class="col-md-4">
            <h5> 
              @if($Stage->stage_status=="En attente de vérification de contenue") 
              
               <span class="label label-warning" value="En attente de vérification de contenue">En attente de vérification de contenue</span>  
              @endif


              @if($Stage->stage_status=="En attente d'affectation") 
             
               <span class="label label-info">En attente d'affectation</span> 
              @endif
              @if($Stage->stage_status=="En attente de validation finale") 
              
               <span class="label label-primary">En attente de validation finale</span> 
              @endif

              @if($Stage->stage_status=="Valide") 
              
              <span class="label label-success" >Valide</span>
              @endif
             @if($Stage->stage_status=="Archivé") 
              
               <span class="label label-danger" >Archivé</span>  
              @endif
              </h5>   
            </div>
          </div>

            <div class="form-group">
							<label class="col-md-4 control-label">Entreprise </label>
							<div class="col-md-5">
						              @foreach($Entreprise as $Ent)
                            @if($Ent->id ==$Stage->entreprise_id)
                   <h4> <a href="{{ route('entreprise.show',$Ent->id) }}" class="label label-default"   data-toggle="tooltip" data-placement="top" title="Afficher Entreprise">{{$Ent->ent_nom}}  @if($Ent->ent_status == 0)&nbsp;&nbsp;<span class="label label-danger">Archivé</span>@endif</a></h4>
                            
                              

                            @endif
                          @endforeach
               </div>
						</div> 




						 
						<div class="form-group">
							<label class="col-md-4 control-label">Encadreur entreprise </label>
							<div class="col-md-6">
                <label class="control-label">{{$Stage->stage_encadreur_s}} </label>
							    
							</div>
						</div>
  <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
               <a href="{{ route('stage.edit',$Stage->id) }}" class="btn btn-default btn-xs"   data-toggle="tooltip" data-placement="top" title="Modifier l'Offre de Stage"><i class="fa fa-pencil-square-o fa-lg"></i> Modifier Stage</a>
               <button type="button"  class="btn btn-default btn-xs" OnClick="imprimer();"><span class="glyphicon glyphicon-print"></span> Imprimer</button>    
                
                
              </div>
            </div>
               <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmer la suppression</h4>
                </div>
            
                <div class="modal-body">
                    <p>Vous êtes sur le point de supprimer une affectation, cette procédure est irréversible.</p>
                    <p>Voulez-vous continuer?</p>
                   
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger btn-ok" data-dismiss="modal" id="delete">Effacer</button>
                </div>
            </div>
        </div>
    </div>

            <hr>
 <div class="panel panel-default">

@if($Type_stage->type_encadreur =='1')
             <div class="form-group">
              <label class="col-md-4 control-label">Encadré par </label>
              <div class="col-md-6">
                
                @foreach($Enseignant as $Ens)
                   
                  <h4>
                    <table>
                      <th>
                        <td>
                     <a href="{{ route('enseignant.show',$Ens->id) }}" class="label label-success"   data-toggle="tooltip" data-placement="top" title="Afficher Encadreur"> {{$Ens->enseig_prenom}} {{$Ens->enseig_nom}}</a>
                    
                        </td>
                       @foreach($Encadreur as $Enc)
                         @if($Enc->enseig_id == $Ens->id)
                        <td>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('encadreur/'.$Enc->id)}}" >
                     <input name="_method" type="hidden" value="DELETE">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">   


                         <button type="submit" class="btn btn-danger btn-xs"  name="remove_levels" data-toggle="tooltip" data-placement="top" title="Supprimer l'affectation" ><span class="glyphicon glyphicon-trash"></span></button> 
                    </form> 
                    </td>     
                       @endif
                      @endforeach             
                   </th>
                    </table>
                      </h4> 



                @endforeach
                
                  
              </div>
            </div>

@endif




             <div class="form-group">
              <label class="col-md-4 control-label">Candidat(s) </label>
              <div class="col-md-6">
              

                     @foreach($Stagiaire as $Stager)
                     @if($Stager->stage_id==$Stage->id)
                     @foreach($Etudiant as $Et)
                      @if($Et->id==$Stager->etudiant_id)
                <h4>     <table>
                      <th>
                        <td>
                     <a href="{{ route('etudiant.show',$Et->id) }}" class="label label-info"   data-toggle="tooltip" data-placement="top" title="Afficher Stagiaire">{{$Et->etudiant_prenom}} {{$Et->etudiant_nom}}</a>
                      
                        </td>
                        <td>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('stagiaire/'.$Stager->id)}}" >
                     <input name="_method" type="hidden" value="DELETE">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                         <button type="submit" class="btn btn-danger btn-xs"  name="remove_levels" data-toggle="tooltip" data-placement="top" title="Supprimer l'affectation" ><span class="glyphicon glyphicon-trash"></span></button> 
                    </form> 
                    </td>                     <!--  data-confirm="Etes-vous certain de vouloir supprimer ?"-->
                   </th>
                    </table>
                      </h4> 
                      @endif 
                     @endforeach
                      @endif
                     @endforeach

               
                  
              </div>
            </div>


                  <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                @if($Type_stage->type_encadreur =='1')
               <a href="{{ route('encadreur.affecter',$Stage->id) }}" class="btn btn-success btn-xs"   data-toggle="tooltip" data-placement="top" title="Affecter un encadreur "><i class="fa fa-plus-square fa-lg"></i> Affecter Un Encadreur</a>
                @endif 
               <a href="{{ route('stagiaire.affecter',$Stage->id) }}" class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top" title="Affecter un étudiant"><i class="fa fa-plus-square fa-lg"></i> Affecter Un Étudiant </a>      
                           
                
                
              </div>
            </div> </div>


            
             @if($Type_stage->type_soutenable =='1')
            
             @foreach($Soutenance as $Str)

             <hr>
            <div class="panel panel-default">

            <div class="form-group">
              <label class="col-md-4 control-label">Soutenance </label>
              <div class="col-md-6">
                <label class="control-label"> le  <?php echo date("d/m/Y ", strtotime($Str->soute_date_debut)).' à '.date("H:i", strtotime($Str->soute_date_debut))?>  au salle {{$Str->salle_nom}}  </label>
                  
              </div>

            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Jury(s) </label>
              <div class="col-md-6">
            <div class="form-group">
              <label class="col-md-4 control-label">Président :</label>
              <div class="col-md-6">
                  @foreach($jury  as $jr)
                    @if($jr->soutenance_id ==$Str->idSout)
                      @if($jr->qualite_id=="Président")
                <h4>   <a href="{{ route('enseignant.show',$jr->id) }}" class="label label-primary"   data-toggle="tooltip" data-placement="top" title=" {{$jr->qualite_id}} "> {{$jr->enseig_prenom}} {{$jr->enseig_nom}}</a>
                    </h4>     <br>
                      @endif
                  @endif 
                  @endforeach
                
              </div>
            </div>

               <div class="form-group">
              <label class="col-md-4 control-label">Rapporteur(s) : </label>
              <div class="col-md-6">
                
                @foreach($jury  as $jr)
                    @if($jr->soutenance_id ==$Str->idSout)
                      @if($jr->qualite_id=="Rapporteur")
                <h4>   <a href="{{ route('enseignant.show',$jr->id) }}" class="label label-success"   data-toggle="tooltip" data-placement="top" title=" {{$jr->qualite_id}} "> {{$jr->enseig_prenom}} {{$jr->enseig_nom}}</a>
                  </h4>        <br>
                      @endif
                  @endif 
                  @endforeach
              </div>
            </div>

               <div class="form-group">
              <label class="col-md-4 control-label">Membre(s) : </label>
              <div class="col-md-6">
                @foreach($jury  as $jr)
                    @if($jr->soutenance_id ==$Str->idSout)
                      @if($jr->qualite_id=="Membre")
                 <h4>  <a href="{{ route('enseignant.show',$jr->id) }}" class="label label-default "   data-toggle="tooltip" data-placement="top" title=" {{$jr->qualite_id}} "> {{$jr->enseig_prenom}} {{$jr->enseig_nom}}</a>
                     </h4>     <br>
                      @endif
                  @endif 
                  @endforeach
              </div>
            </div>
          </div>
             </div>
            </div>
           @endforeach
          @endif

 


                
            


<div class=" form-horizontal">
@foreach($Reservation as $Res)





  
    <div class="col-md-6 ">
      <div class="media well">
         <a href="{{ route('etudiant.show',$Res->id) }}" class="pull-left"> 
                         <img src="{{url('/uploads/'.$Res->etudiant_image)}}" height="80" width="64" class="media-object" alt='' />
         </a>
        <div class="media-body">
          <h4 class="media-heading">
            {{ $Res->etudiant_prenom }} {{$Res->etudiant_nom }} <br> CIN : {{$Res->etudiant_cin }}
          </h4> 
           <h5>
            {{ $Res->motivation}}
           </h5>
           <h5>
           @if($Res->pre_affecte==1 )
            <span class="label label-info">Sélectionner par l'entreprise</span>
           @endif 
           </h5>
           <em class="pull-right">
            Le  <?php echo date("d/m/Y ", strtotime($Res->created_at)).' à '.date("H:i", strtotime($Res->created_at))?>
           </em>

           

          
        
      </div>
    </div>
  </div>


@endforeach
 </div>













           

					</div>
					</div>
				</div>
			</div>
		</div>
</div>
</div>




 <script>
     $('button[name="remove_levels"]').on('click', function(e){
    var $form=$(this).closest('form');
    e.preventDefault();
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#delete', function (e) {
            $form.trigger('submit');
        });
     });
    </script>
    
	
@endsection