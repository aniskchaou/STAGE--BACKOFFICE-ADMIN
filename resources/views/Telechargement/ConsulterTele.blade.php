@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/telecharger') }}">Gérer Les Téléchargements</a></li>
  <li class="active">Consulter Les Téléchargements</li>
</ol>



<hr>



<div class="col-sm-offset-1 col-sm-10">

        
      <div class="panel panel-default">
      
      
       <legend>  &nbsp;<i class="fa fa-search fa-lg"></i>&nbsp;<i>Consulter Les Téléchargements</i></legend>

<br>
     
    <div>


 <table id="Tel" class="table table-striped table-hover table-condensed" cellspacing="1" width="100%">
    <thead>
        <tr >
           <th>#</th>
           <th>Nom</th>
           <th>Actions</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
           <th>#</th>
           <th>Nom</th>
           
           <th>Actions</th>
        </tr>
    </tfoot>
 
    <tbody>

                      @foreach($Telecharger as $Tele)
                 <tr  >
                   
                    <td style="width:30px">{{$Tele->id}}</td>
                    <td > {{$Tele->tele_nom}}</td>

                    

                     
                  
                    <td style="width:30px" >
                     
                    <a href=" {{ url('/uploads/'.$Tele->tele_ficher) }} " class="btn btn-default btn-xs"   data-toggle="tooltip" data-placement="top" title="Télécharger"><i class="fa fa-download fa-lg"></i> </a>
                    
                  </td> 
                   
                 </tr>
                 @endforeach


    </tbody>    
   </table> 

 



    </div> 



  </div> 


    <hr>
    
    
  
</div>

<script>

$(document).ready(function() {



    $('#Tel').DataTable( {
      "order": [[ 0, "desc" ]],
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


} );
  
} );


  
</script>




@endsection