@extends('app')

@section('conten')

<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i></a></li>
  <li><a href="{{ url('/stage') }}">Gérer Les Stages</a></li>
  <li><a href=" {{ route('stage.show',$Stage->id) }}">Consulter Un Stage</a></li>
  
  <li class="active">Affecter Un Encadreur</li>
</ol>
<hr>
<ol class="breadcrumb">

  <table >
      <tr>
        <td style="width:50px">
          <a href="javascript:history.back()" class="btn btn-default btn-sm"data-toggle="tooltip" data-placement="top" title="Retour" ><i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp;Retour </a>
 
        </td>
        <td style="width:10px"></td>
        <td style="width:50px">
          <a href="{{ url('/enseignant/create')}}" class="btn btn-primary btn-sm"> Ajouter  Un Encadreur  <i class="fa fa-user-plus fa-lg"></i></a> 
        </td>
        <td style="width:20px" align="center">|</td>
     <td style="width:40px" align="center"> <i class="fa fa-search fa-2x"></i></td>
  <td style="width:10px"></td>
  <td style="width:200px">
          <select class="form-control chosen-select-deselect " data-placeholder="spécialité" data-toggle="tooltip" data-placement="top" title="Recherche par spécialité" id="specialite"  >
                    <option value=""></option>
                    @foreach($specialite as $SP)
                    <option value="{{$SP->enseig_specialite_nom}}">{{$SP->enseig_specialite_nom}}</option>
                    @endforeach
                  </select>
  </td>
  </tr>
</table>





  
   </ol>
<div class="col-xs-offset-0 col-sm-12">

        
      <div class="panel panel-default">
      
        
    
<legend>  &nbsp;<i class="fa fa-link fa-lg"></i>&nbsp;<i>Affecter Un Encadreur</i></legend>

      <br>
    <div>
  <form class="form-horizontal" role="form" method="POST" action="{{ url('encadreur/affecterEn/'.$Stage->id)}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

 <table id="exampleAFFE" class="table table-bordered table-hover table-striped table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th>#</th>
          <th><i class="fa fa-search fa-lg"></i></th>
           <th>Nom</th>
           <th>Prénom</th>
           <th>Code</th>
           <th>Qualité</th>
           <th>Spécialité</th>
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
           <th>Code</th>
           <th>Qualité</th>
           <th>Spécialité</th>
           <th>Status</th>
           <th>Affecter</th>
        </tr>
    </tfoot>
 
    <tbody>
                      @foreach($Enseignant as $user)
                 <tr>
                   
                    <td>{{$user->id}}</td>
                    <td style="width:10px">
                   <a href="{{ route('enseignant.show',$user->id) }}" class="btn btn-default btn-xs"   data-toggle="tooltip" data-placement="top" title="Afficher"><i class="fa fa-search fa-lg"></i></a>
                     </td> 
                    <td>{{$user->enseig_nom}}</td>
                    <td>{{$user->enseig_prenom}}</td>  
                    <td>{{$user->enseig_code}}</td>
                    <td>{{$user->enseig_grade_nom}}</td> 
                    <td>{{$user->enseig_specialite_nom}}</td> 
                    
                    
                    
                     <td align="center"> @if ($user->enseig_status == '1') <span class="label label-success">actif(ve)</span> @else <span class="label label-danger">inactif(ve)</span> @endif </td>
                  
                    <td align="center">
                      <input class="col-md-4  single-checkbox" type="checkbox" name="CBE{{$user->id}}" value="1" data-toggle="tooltip" data-placement="top" title="Affecter">
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

<script>

$(document).ready(function() {


  
   var table = $('#exampleAFFE').DataTable( {
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
    

 $('select#specialite').change( function() { table.column(6).search($(this).val()).draw(); } );
 
// $('select#engines2').change( function() { table.column(7).search($(this).val()).draw(); } );
  
 
  
    


} );


  
</script>




@endsection