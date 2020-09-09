@extends('app')

@section('conten')


<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/offre_d_emploi') }}">Gérer Les Offres D'emplois</a></li>
  <li class="active">Consulter Une Offre D'emploi</li>
</ol>



<hr>
<ol class="breadcrumb">
  
     <div class="input-group col-md-12 ">                  
<div class="col-md-2">
        <a href="{{ url('/offre_d_emploi/create')}}" class="btn btn-primary "><i class="fa fa-plus-square fa-lg"></i>&nbsp;Ajouter Une Offre D'emploie</a>
</div>

                          

</div>

     </div>       
</ol>
 <div class="row">
    <div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
  

 

  <legend>  &nbsp;<i class="fa fa-search fa-lg"></i>&nbsp;<i>Consulter Une Offre D'emploi</i></legend>
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

                      

 <form class="form-horizontal" role="form" method="POST" action="{{ url('offre_d_emploi/'.$Offre_d_emploi->id)}}">
      
     <input type="hidden" name="_token" value="{{ csrf_token() }}">          

        <fieldset>

<!-- Form Name -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Statut de l'offre</label>  
             <div class="col-md-2">
             <h5>
              @if($Offre_d_emploi->emploi_status=="En attente") 
                 <span class="label label-warning">En attente</span>

              @else
               @if($Offre_d_emploi->emploi_status=="Diffuser") 

                 <span class="label label-success">Diffuser</span>

               @else

                 <span class="label label-danger">Archivé</span>

              @endif
              @endif  </h5>
            </div>


</div>

  
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Titre du poste </label>  
  <div class="col-md-6"><label class="control-label"> {{$Offre_d_emploi->emploi_titre}}</label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre de postes </label>  
  <div class="col-md-3"><label class="control-label">{{$Offre_d_emploi->emploi_nbr}}</label>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Date de fin </label>
  <div class="col-md-4">
    <label class="control-label"> {{$Offre_d_emploi->emploi_date_fin}}</label>
                                   
                    

  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Entreprise </label>
  <div class="col-md-4">


                                @foreach($Entreprise as $Ent)
                                 @if($Ent->id ==$Offre_d_emploi->ent_id)
                               <h4> <a href="{{ route('entreprise.show',$Ent->id) }}" class="label label-default"   data-toggle="tooltip" data-placement="top" title="Afficher Entreprise">{{$Ent->ent_nom}} </a></h4>
                                  @endif
                                @endforeach

                 
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Filière </label>
  <div class="col-md-4">
    
   


                                @foreach($Filiere as $fil)
                                 
                                  @foreach($Emploi_filere as $emp) 
                                  @if($emp->filiere_id ==$fil->id)
                                  <span class="label label-primary">{{$fil->filiere_nom}}</span>
                                    @endif
                                  @endforeach 
                                  
                                @endforeach 
                            



                      
                 
                          




  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Compétence">Compétence </label>
  <div class="col-md-6">  <label class="control-label"> <?php echo $Offre_d_emploi->emploi_competence; ?></label>                   
    
      
                                                          
                            
  </div>
</div>

<!-- Button (Double) -->
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                                <a href="javascript:history.back()" class="btn btn-primary btn-sm">
                              <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                            </a>
                               <a href="{{ route('offre_d_emploi.edit',$Offre_d_emploi->id) }}" class="btn btn-default btn-sm"   data-toggle="tooltip" data-placement="top" title="Modifier"><span class="glyphicon glyphicon-pencil"></span> Modifier l'Offre D'emploie</a>
                        
                           
                
                
              </div>
            </div>

</fieldset>



          </form>
          </div>
        </div>
      </div>
    </div>
</div>
</div>


             
  


@endsection
