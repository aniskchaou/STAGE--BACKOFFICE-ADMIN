@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i></a></li>
  
  <li class="active">Ajuter Les Résultats </li>
</ol>



<hr>


<ol class="breadcrumb">
  
     <div class="input-group col-md-12 ">    
     <table width="100%">
      <tr>
     <td style="width:40px" align="center"> <i class="fa fa-search fa-2x"></i></td>
        <td style="width:300px">
    <select class="form-control chosen-select-deselect " data-placeholder="Filière" data-toggle="tooltip" data-placement="top" title="Recherche par Filière" id="filiere"  >
                    <option value=""></option>
                    @foreach($Filiere as $user)
                    <option value="{{$user->filiere_nom}}">{{$user->filiere_nom}}</option>
                    @endforeach
                  </select>

        </td> 
        <td style="width:10px"></td>
        <td style="width:180px">
              <select class="form-control  chosen-select-deselect " data-placeholder="Type de Stage" data-toggle="tooltip" data-placement="top" title="Recherche par Type"  id="type"  >
                     <option value=""></option>
                      @foreach($Type_stage as $type)
                      <option value="{{$type->type_nom}}">{{$type->type_nom}}</option>
                      @endforeach
                  </select>  


        </td> 
   
        <td style="width:10px"></td>
        <td style="width:100px">
             <select class="form-control  chosen-select-no" data-placeholder="Niveau"  id="niveau" class="label label-info"   data-toggle="tooltip" data-placement="top" title="Recherche par Niveau" >  
               <option value=""></option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
             </select> 

        </td>
<td><div id="inf"></div></td>
      </tr>
     </table>              


     </div> 



</ol> 



<div class="col-sm-offset-0 col-sm-12">

        
      <div class="panel panel-default">
     
      <legend>  &nbsp;<i class="fa fa-plus-square-o fa-lg"></i>&nbsp;<i>Ajuter Les Résultats</i></legend>

<br>
     
    <div>
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/stagiaire')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">


 <table id="resultat" class="table table-bordered table-striped table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
           <th>#</th>
           <th>CIN</th>
           <th>Nom</th>
           <th>Prénom</th>
           <th>Filiere</th>
           <th>Niveau</th>
           <th>Titre de stage</th>
           <th>Type de stage</th>
           <th>Note </th>
           <th>Appreciation</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
           <th>#</th>
           <th>CIN</th>
           <th>Nom</th>
           <th>Prénom</th>
           <th>Filiere</th>
           <th>Niveau</th>
           <th>Titre de stage</th>
           <th>Type de stage</th>
           <th>Note </th>
           <th>Appreciation</th>
        </tr>
    </tfoot>
 
    <tbody>
                      @foreach($Etudiant as $user)
                 <tr>
                   
                    <td>{{$user->id}}</td>
                    <td>{{$user->etudiant_cin}}</td>
                    <td>{{$user->etudiant_nom}}</td>
                    <td>{{$user->etudiant_prenom}}</td>  
                    
                  
                    <td>
                                @foreach($Filiere as $fi)
                                @if ($fi->id==$user->etudiant_filiere_id)
                                <span class="label label-primary">{{$fi->filiere_nom}}</span>
                                @endif
                                @endforeach


                    </td> 
                    
                    
                    
                    
                    <td>{{$user->etudiant_niveau}}</td> 
                     <td>{{$user->stage_title}}</td>
                     <td>{{$user->type_nom}}</td>
                  
                    <td style="width:100px">
                         
                      <input type="number" class="form-control" name="not{{$user->id}}" min="0" max="20"  step="any"> 
                 
                    </td style="width:100px"> 
                    <td><textarea class="form-control" rows="3"  LANG="fr" name="appreciation{{$user->id}}" >{{old('appreciation$user->id') }}</textarea>
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


  
   var table = $('#resultat').DataTable( {
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
    "scrollX": true,
    } );
    

 $('select#filiere').change( function() { table.column(4).search($(this).val()).draw(); } );
 $('select#type').change( function() { table.column(7).search($(this).val()).draw(); } );
 $('select#niveau').change( function() { table.column(5).search($(this).val()).draw(); } );
 
    var colvis = new $.fn.dataTable.ColVis( table ,{
            exclude: [ 0,8 ],
        } );
 
 
    $( colvis.button() ).insertAfter('div#inf');
    


} );


  
</script>



@endsection