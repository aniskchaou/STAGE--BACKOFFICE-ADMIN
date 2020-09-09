@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}"style=" font-weight:bold"><i>Stage+</i>  </a></li>
  
  <li class="active">Historique Des Soutenances </li>
</ol>




<hr>
<ol class="breadcrumb">
  
     <div class="input-group col-md-12 ">    
     <table width="100%">
      <tr>
     <td style="width:40px" align="center"> <i class="fa fa-search fa-2x"></i></td>
        <td style="width:300px">
    <select class="form-control chosen-select-deselect " data-placeholder="Filière" data-toggle="tooltip" data-placement="top" title="Recherche par Filière" id="engines"  >
                    <option value=""></option>
                    @foreach($Filiere as $user)
                    <option value="{{$user->filiere_nom}}">{{$user->filiere_nom}}</option>
                    @endforeach
                  </select>

        </td> 
        <td style="width:10px"></td>
        <td style="width:180px">
              <select class="form-control  chosen-select-deselect " data-placeholder="Type de Stage" data-toggle="tooltip" data-placement="top" title="Recherche par Type"  id="engines2"  >
                     <option value=""></option>
                      @foreach($Type_stage as $type)
                      <option value="{{$type->type_nom}}">{{$type->type_nom}}</option>
                      @endforeach
                  </select>  


        </td> 

        <td style="width:10px"></td>
        <td style="width:100px">
             <select class="form-control  chosen-select-no" data-placeholder="Année Universitaire"  id="anner" class="label label-info"   data-toggle="tooltip" data-placement="top" title="Recherche par année universitaire" >  
               
               <option value=""></option>
               
             @foreach($Anner as $an)
             <option value="{{$an}}">{{$an}}</option>
             @endforeach
             </select> 

        </td>


      <td><div id="inf"></div></td>
      </tr>
     </table>              


     </div> 



</ol>


<div class="col-sm-offset-0 col-sm-12">

        
      <div class="panel panel-default">
      
      <legend>  &nbsp;<i class="fa fa-folder-open fa-lg"></i>&nbsp;<i>Historique Des Soutenances</i></legend>

<br>


     

<div>



 <table id="example" class="table table-bordered table-striped table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
        <th>#</th>     
        <th>Titre</th>
        <th>Encadreur(s)</th>  
        <th>Stagiaire</th>
        <th>Encadreur Entreprise</th>
        <th>jury(s) </th>
        <th>Filière </th>
        <th>Stage Type </th> 
        <th>Date et heure </th>
        <th>salle </th>
        <th>Année Universitaire</th>
        <th>Actions</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
        <th>#</th>     
        <th>Titre</th>
        <th>Encadreur(s)</th>  
        <th>Stagiaire</th>
        <th>Encadreur Entreprise</th>
        <th>jury(s) </th>
        <th>Filière </th>
        <th>Stage Type </th> 
        <th>Date et heure </th>
        <th>salle </th>
        <th>Année Universitaire</th>
        <th>Actions</th>
        </tr>
    </tfoot>
 
    <tbody>

                      @foreach($Stage as $Str)
                 <tr>
                   
                    <td style="width:20px" align="right">{{$Str->id}}</td>
                    <td style="width:200px">{{$Str->stage_title}}</td>
                    <td style="width:170px">

                      @foreach($Encadreur as $Enc)
                      @if($Enc->stage_id == $Str->id)
                        @foreach($Enseignant as $Ens)
                         @if($Enc->enseig_id == $Ens->id)
                          <a href="{{ route('enseignant.show',$Ens->id) }}" class="label label-success"   data-toggle="tooltip" data-placement="top" title="Afficher Encadreur"> {{$Ens->enseig_prenom}} {{$Ens->enseig_nom}}</a>
                         <br>
                         @endif
                          @endforeach

                        @endif
                      @endforeach

                      


                    </td> 

                    <td style="width:170px">
                     @foreach($Stagiaire as $Stager)
                     @if($Stager->stage_id==$Str->id)
                     @foreach($Etudiant as $Et)
                      @if($Et->id==$Stager->etudiant_id)
                      <a href="{{ route('etudiant.show',$Et->id) }}" class="label label-info"   data-toggle="tooltip" data-placement="top" title="Afficher Stagiaire">
                      {{$Et->etudiant_prenom}} {{$Et->etudiant_nom}}</a>
                      @endif 
                     @endforeach
                      @endif
                     @endforeach
                    </td>
                    <td style="width:90px">
                      {{$Str->stage_encadreur_s}}
                    </td> 

                     <td> 
                    @foreach($jury  as $jr)
                    @if($jr->soutenance_id ==$Str->idSout)
                      
                   <a href="{{ route('enseignant.show',$jr->id) }}" class="label label-success"   data-toggle="tooltip" data-placement="top" title=" {{$jr->qualite_id}} "> {{$jr->enseig_prenom}} {{$jr->enseig_nom}}</a>
                         <br>
                    @endif 
                    @endforeach

                     </td>


                  
                    <td style="width:100px">
                    
                    @foreach($Stage_filiere as $StFil)
                     @if($StFil->stage_id==$Str->id)
                     @foreach($Filiere as $Fil)
                      @if($Fil->id==$StFil->filiere_id)
                      <span class="label label-primary">{{$Fil->filiere_nom}}</span>
                      @endif 
                     @endforeach
                      @endif
                     @endforeach


                    </td> 
                    <td style="width:90px">

                      @foreach($Type_stage as $type)
                       @if($type->id==$Str->type_id)
                       
                      {{$type->type_nom}} 
                       @endif 
                      @endforeach

                    </td> 
                     <td>
                      {{$Str->soute_date_debut}}
                     </td>
                     <td>
                       {{$Str->salle_nom}}
                      </td>
                      <td style="width:20px" align="right">
                       {{$Str->stage_annee_universitaire}}
                      </td>

         
                  
                    <td style="width:10px">
                         
                       
                         <a href="{{ route('stage.show',$Str->id) }}" class="btn btn-default btn-xs"   data-toggle="tooltip" data-placement="top" title="Afficher"><i class="fa fa-search"></i></span></a>
                         
                         <a href="{{ route('soutenance.organiserSoutenanc',$Str->id) }}" class="btn btn-success btn-xs"   data-toggle="tooltip" data-placement="top" title="Organiser Soutenance"><i class="fa fa-plus-square-o fa-lg"></i></a>
                        
                
                    </td> 
                   
                 </tr>
                 @endforeach


    </tbody>    
   </table> 





    </div> 
 



  </div> 


    

  
</div>

<script>

$(document).ready(function() {

   $('#example tfoot th').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();

        if( title == 'Entreprise')
        $(this).html( '<input type="text" size="5" class="form-control input-sm" placeholder="'+title+'" />' );
    } );

   var table = $('#example').DataTable( {
    "order": [[ 0, "desc" ]],
    "scrollX": true,


   
     columnDefs: [
            { visible: false, targets: 7 }
        ],

    
 
  

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



  var colvis = new $.fn.dataTable.ColVis( table ,{
            exclude: [ 0,8 ],
        } );
 
 
    $( colvis.button() ).insertAfter('div#inf');
    

 
    table.columns().eq( 0 ).each( function ( colIdx ) {
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );

 $('select#engines').change( function() { table.column(6).search($(this).val()).draw(); } );
 $('select#engines2').change( function() { table.column(7).search($(this).val()).draw(); } );
 $('select#anner').change( function() { table.column(10).search($(this).val()).draw(); } );




} );


  
</script>



@endsection




 