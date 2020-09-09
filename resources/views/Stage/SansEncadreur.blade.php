@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}"style=" font-weight:bold"><i>Stage+</i>  </a></li>
  <li><a href="{{ url('/stage') }}">Gérer Les Stages</a></li>
  <li class="active">Gérer Les Stages Sans Encadreur</li>
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
        <td style="width:220px">
  <select class="form-control  chosen-select-no" data-placeholder="État de stage" data-toggle="tooltip" data-placement="top" title="Recherche par état de stage"  id="etat"  >
               <option value=""></option>
               <option class="label label-warning" value="En attente de vérification de contenue">En attente de vérification de contenue</option>  
               <option class="label label-info" value="En attente d'affectation">En attente d'affectation</option> 
               <option class="label label-primary" value="En attente de validation finale">En attente de validation finale</option> 
               <option class="label label-success" value="Valide">Valide</option>
               
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
      
      <legend>  &nbsp;<i class="fa fa-cog fa-spin fa-lg"></i>&nbsp;<i>Gérer Les Stages Sans Encadreur</i></legend>

<br>


     
    <div>



 <table id="example" class="table table-bordered table-striped table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
           <th>#</th>
           <th>Titre </th>
           <th>Date de début</th>
           <th>Stagiaire</th>
           <th>Entreprise</th>
           <th>Filière</th>
           <th>Stage Type</th>
           <th>Année Universitaire</th>
           <th>État</th>
           <th>Actions</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
           <th>#</th>
           <th>Titre </th>
           <th>Date de début</th>
           <th>Stagiaire</th>
           <th>Entreprise</th>
           <th>Filière</th>
           <th>Stage Type</th>
           <th>Année Universitaire</th>
           <th>État</th>
           <th>Actions</th>
        </tr>
    </tfoot>
 
    <tbody>

                      @foreach($Stage as $Str)
                 <tr>
                   
                    <td style="width:20px" align="right">{{$Str->id}}</td>
                    <td style="width:200px">{{$Str->stage_title}}</td>
                    <td align="right">{{$Str->stage_dete_debut}}</td> 

                    <td>
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
                    <td>
                      @foreach($Entreprise as $Ent)
                       @if($Ent->id==$Str->entreprise_id)
                       <a href="{{ route('entreprise.show',$Ent->id) }}" class="label label-default"   data-toggle="tooltip" data-placement="top" title="Afficher Entreprise">
                      {{$Ent->ent_nom}} </a>
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
                    <td>

                      @foreach($Type_stage as $type)
                       @if($type->id==$Str->type_id)

                      {{$type->type_nom}} 
                       @endif 
                      @endforeach

                    </td> 
                      <td style="width:20px" align="right">
                        {{$Str->stage_annee_universitaire}}
                        </td> 

                    <td align="center">
                     



              @if($Str->stage_status=="En attente de vérification de contenue") 
              <span class="label label-warning" >En attente de vérification de contenue </span> 
      
              @endif


              @if($Str->stage_status=="En attente d'affectation") 
              <span class="label label-info">En attente d'affectation</span> 

              @endif
              @if($Str->stage_status=="En attente de validation finale") 
              <span class="label label-primary">En attente de validation finale</span> 
         
              @endif

              @if($Str->stage_status=="Valide") 
              <span class="label label-success">Valide</span> 
            
              @endif
             @if($Str->stage_status=="Archivé") 
              <span class="label label-danger">Archivé</span> 
          
              @endif




                     </td>  
                  
                    <td style="width:10px">
                         
                       
                         <a href="{{ route('stage.show',$Str->id) }}" class="btn btn-default btn-xs"   data-toggle="tooltip" data-placement="top" title="Afficher"><i class="fa fa-search"></i></span></a>
                         
                         <a href="{{ route('stage.edit',$Str->id) }}" class="btn btn-primary  btn-xs"   data-toggle="tooltip" data-placement="top" title="Modifier"><span class="glyphicon glyphicon-pencil"></span></a>
                        
                
                    </td> 
                   
                 </tr>
                 @endforeach


    </tbody>    
   </table> 





    </div> 
 



  </div> 


    <hr>
    
    <ol class="breadcrumb">
<div><a href="{{ url('/stage/create')}}" class="btn btn-primary "><i class="fa fa-plus-square fa-lg"></i>&nbsp; Ajouter un Stage </a>  </div>
</ol>

  
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
            exclude: [ 0,9 ],
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

 $('select#engines').change( function() { table.column(5).search($(this).val()).draw(); } );
 $('select#engines2').change( function() { table.column(6).search($(this).val()).draw(); } );
$('select#etat').change( function() { table.column(8).search($(this).val()).draw(); } );
$('select#anner').change( function() { table.column(7).search($(this).val()).draw(); } );

} );


  
</script>



@endsection