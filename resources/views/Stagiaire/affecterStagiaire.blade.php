@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i></a></li>
  <li><a href="{{ url('/stage') }}">Gérer Les Stages</a></li>
  <li><a href=" {{ route('stage.show',$Stage->id) }}">Consulter Un Stage</a></li>
  
  <li class="active">Affecter Un Étudiant</li>
</ol>

<hr>

<div class="row">
<div class="col-md-12 col-md-offset-0">
<div class="panel panel-default">
<div class="panel-body">
   <form class="form-horizontal" role="form" >
     <table  class="table table-bordered table-striped table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
    <tr>
           <th>Titre du stage</th>
           <th>Type de stage</th>
           <th>Nombre des étudiants affectés</th>
           <th>Nombre maximum des stagiaires</th>
           <th>Nombre minimum des stagiaires</th>
           <th>Nombre de place restante </th>
           <th>Nombre de réservation</th>

        </tr>
    </thead>
     <tbody>
       <tr>
        <td align="center"><h4><span class="label label-primary">{{$Stage->stage_title}}</span></h4></td>
        <td align="center"><h4><span class="label label-primary">{{$Type_stage->type_nom}}</span></h4></td>
        <td align="center"><h4><span class="label label-success">{{$NBS}}</span><h4></td>
        <td align="center"><h4><span class="label label-default">{{$Type_stage->type_nb_max}}</span><h4></td>
        <td align="center"><h4><span class="label label-default">{{$Type_stage->type_nb_min}}</span><h4></td>
        <td align="center"><h4><span class="label label-danger">{{$Type_stage->type_nb_max-$NBS}}</span><h4></td>
        <td align="center"><h4><span class="label label-warning">{{$NBR}}</span><h4></td>
       <tr> 
     </tbody>
   </table>

         

 </form>

</div></div></div></div>

<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <i class="fa fa-exclamation-circle fa-1x"> Cette liste contient les étudiant qui non pas un stage en coure.</i>
</div>

<hr>


<ol class="breadcrumb">
  <div class="input-group col-md-12 "> 
    <table width="100%">
     <th>
   <td style="width:10px">
   <a href="javascript:history.back()" class="btn btn-default btn-sm"data-toggle="tooltip" data-placement="top" title="Retour" ><i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp;Retour </a>
   </td>
   <td style="width:10px"></td>
   <td style="width:10px"> 
   <a href="{{ url('/stage/create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Ajouter un Stage </a>
   </td>
   <td style="width:10px"></td>
    <td style="width:10px">
   <a href="{{ url('/etudiant/create')}}" class="btn btn-primary btn-sm"><i class="fa fa-user-plus   fa-lg"></i>&nbsp;&nbsp;Ajouter un Étudiant</a>         
 </td>
 <td align="right" >
  <table>
     <th>
 <td style="width:40px" align="center"> <i class="fa fa-search fa-2x"></i></td>
 <td style="width:300px">
    <select class="form-control chosen-select-deselect " data-placeholder="Filière" id="engines"  >
                               <option value=""></option>
                                @foreach($Filiere as $user)

                                <option value="{{$user->filiere_nom}}">{{$user->filiere_nom}}</option>
                                @endforeach

                 
                             </select>
</td>
<td style="width:10px"></td>
<!--
<td style="width:150px" >


    <select class="form-control chosen-select-no" data-placeholder="Réservation" id="engines2"  >
      <option value=""></option>
       <option class="label label-default" value="Non">Non réservé</option>
      <option class="label label-success" value="Oui">Réservé</option>
        <option class="label label-info"  value="">Sélectionné</option>
     
    
    </select>

  

</td>
-->
</th>
 </table>
</td>
</th>
 </table>
</div>

  </ol>        



<div class="col-sm-offset-0 col-sm-12">

        
      <div class="panel panel-default">
     
      <legend>  &nbsp;<i class="fa fa-link fa-lg"></i>&nbsp;<i>Affecter Un Étudiant </i></legend>

<br>
     
    <div>

  <form class="form-horizontal" role="form" method="POST" action="{{ url('stagiaire/affecterEt/'.$Stage->id)}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
 <table id="exampleAFF" class="table table-bordered table-striped table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
    <tr>
           <th>#</th>
           <th><i class="fa fa-search fa-lg"></i></th>
           <th>Nom</th>
           <th>Prénom</th>
           <th>CIN</th>
           <th>Filiere</th>
           <th>Niveau</th>
           <th>Réservation</th>
           <th>Status</th>
          
           <th>Affecter</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
           <th>#</th>
           <th><i class="fa fa-search fa-lg"></i></th>
           <th>Nom</th>
           <th>Prénom</th>
           <th>CIN</th>
           <th>Filiere</th>
           <th>Niveau</th>
           <th>Réservation</th>
           <th>Status</th>
          
           <th>Affecter</th>
        </tr>
    </tfoot>
 
    <tbody>
                      @foreach($Etudiant as $user)
                 <tr>
                   
                    <td>{{$user->id}}</td>
                     <td style="width:10px">
                         <a href="{{ route('etudiant.show',$user->id) }}" class="btn btn-default btn-xs"   data-toggle="tooltip" data-placement="top" title="Afficher"><i class="fa fa-search"></i></a>
                      </td> 
                    <td>{{$user->etudiant_nom}}</td>
                    <td>{{$user->etudiant_prenom}}</td>  
                    <td>{{$user->etudiant_cin}}</td>
                     
                    <td>
                                @foreach($Filiere as $fi)
                                @if ($fi->id==$user->etudiant_filiere_id)
                                {{$fi->filiere_nom}}
                                @endif
                                @endforeach


                    </td> 
                    
                    
                    
                    
                    <td>{{$user->etudiant_niveau}}</td> 
                    <td >
                      <?php $res ='0'?> 
                      @foreach($etudiantR as $ER)
                     @if($ER->etudiant_id== $user->id) 
                       @if($ER->pre_affecte=='1') 
                       
                       
                        <span class="label label-info" value="" data-toggle="tooltip" data-placement="top" title="Sélectionnée par l'entreprise" >Sélectionné</span>
                       

                      @else
                      <span class="label label-success" value="Oui">Réservé</span>
                      
                     

                     @endif
<?php $res ='1'?>
                      @endif
                      @endforeach

                       @if($res =='0') 
                      <span class="label label-default" value="Non">Non réservé</span>
                      
                      @endif
                    </td>

                    <td align="center"> @if ($user->etudiant_status== '1') <span class="label label-success">actif(ve)</span> @else <span class="label label-danger">inactif(ve)</span> @endif </td>
                  
                    <td align="center">
                      <input class="col-md-4  single-checkbox" type="checkbox" name="CB{{$user->id}}" value="1" data-toggle="tooltip" data-placement="top" title="Affecter">
                    </td> 
                  
                   
                   
                 </tr>
                 @endforeach


    </tbody>    
</table> 
    <div class="form-group">
              <div class="col-md-4 col-md-offset-1">
                <button type="submit" class="btn btn-primary btn-sm">
                 <span class="glyphicon glyphicon-floppy-open"></span>
                 Enregistrer
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


    <hr>
    
    
    
</div>

    <script >
              $(document).ready(function () {
                    
                  if(0==<?php  echo $Type_stage->type_nb_max - $NBS; ?>){
                  $("input:checkbox").attr("disabled", true);
                  }

                $.fn.limit = function(n) {
                var self = this;
                 this.click(function(){
                  (self.filter(":checked").length==n)?
                  self.not(":checked").attr("disabled",true).addClass("alt"):
                  self.not(":checked").attr("disabled",false).removeClass("alt");
 });
}

$("input:checkbox").limit(<?php  echo $Type_stage->type_nb_max - $NBS; ?>);



                });

               </script>

<script>

$(document).ready(function() {


  
   var table = $('#exampleAFF').DataTable( {
    "language": 
    {
    "sProcessing":     "Traitement en cours...",
    "sSearch":         "Rechercher&nbsp;:",
    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
    "sInfo":           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
    "sInfoEmpty":      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
    "sInfoPostFix":    "",
    "sLoadingRecords": "Chargement en cours...",
    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
    "oPaginate": {
        "sFirst":      "Premier",
        "sPrevious":   "Pr&eacute;c&eacute;dent",
        "sNext":       "Suivant",
        "sLast":       "Dernier" },
    "oAria": {
        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant" }
     },
    "order": [[ 0, "desc" ]],

    } );
    

 $('select#engines').change( function() { table.column(5).search($(this).val()).draw(); } );
 
 $('select#engines2').change( function() { table.column(7).search($(this).val()).draw(); } );
  
 
  
    


} );


  
</script>



@endsection