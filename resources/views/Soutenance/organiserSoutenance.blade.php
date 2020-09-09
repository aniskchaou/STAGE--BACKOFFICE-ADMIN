@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}"style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ route('soutenance.souteNonPlanifie')}}">Les Soutenances Non Organiser</a></li>
  <li class="active">Organiser Une Soutenance</li>
</ol>
<hr>



<div class="container-fluid">
	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
			
        <legend>  &nbsp;<i class="fa fa-clock-o fa-lg"></i>&nbsp;<i>Organiser Une Soutenance</i></legend>
				<div class="panel-body">

calendrier
  <div class="panel panel-default">
      
        <legend>  &nbsp;<i class="fa fa-info fa-lg"></i>&nbsp;<i>Informations Stage</i></legend>                    

	                 <div class="form-horizontal"  >
                       
                         

						
            <div class="form-group">
							<label class="col-md-4 control-label">Titre du stage </label>
							<div class="col-md-6"><label class="control-label">{{$Stage->stage_title}}</label>
								    
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

   

 




						 
			
  
  <div class="modal fade" id="confirm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><strong>Oups!</strong> Il y avait quelques problèmes avec votre entrée.</h4>
                </div>
            
                <div class="modal-body">
                    <p>Il faut sélectionner au moins un jury.</p>
                  
                   
                </div>
                
                <div class="modal-footer">
                   
                    <button type="button" class="btn btn-danger btn-ok" data-dismiss="modal" id="delete">ok</button>
                </div>
            </div>
        </div>
    </div>

      <div class="modal fade" id="confirm3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><strong>Oups!</strong> Il y avait quelques problèmes avec votre entrée.</h4>
                </div>
            
                <div class="modal-body">
                    <p>Il faut sélectionner au moins un président de jury.</p>
                  
                   
                </div>
                
                <div class="modal-footer">
                   
                    <button type="button" class="btn btn-danger btn-ok" data-dismiss="modal" id="delete">ok</button>
                </div>
            </div>
        </div>
    </div>

      <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><strong>Oups!</strong> Il y avait quelques problèmes avec votre entrée.</h4>
                </div>
            
                <div class="modal-body">
                    <p>Il faut sélectionner une salle.</p>
                  
                   
                </div>
                
                <div class="modal-footer">
                   
                    <button type="button" class="btn btn-danger btn-ok" data-dismiss="modal" id="delete">ok</button>
                </div>
            </div>
        </div>
    </div>








             <div class="form-group">
              <label class="col-md-4 control-label">Encadré par </label>
              <div class="col-md-6">
                @foreach($Enseignant as $Ens)
                     <h4>
                     <a href="{{ route('enseignant.show',$Ens->id) }}" class="label label-success"   data-toggle="tooltip" data-placement="top" title="Afficher Encadreur"> {{$Ens->enseig_prenom}} {{$Ens->enseig_nom}}</a>
                     </h4> 
                @endforeach    
              </div>
            </div>





             <div class="form-group">
              <label class="col-md-4 control-label">Candidat(s) </label>
              <div class="col-md-6">
                     @foreach($Stagiaire as $Stager)
                     @if($Stager->stage_id==$Stage->id)
                     @foreach($Etudiant as $Et)
                     @if($Et->id==$Stager->etudiant_id)
                     <h4>    
                     <a href="{{ route('etudiant.show',$Et->id) }}" class="label label-info"   data-toggle="tooltip" data-placement="top" title="Afficher Stagiaire">{{$Et->etudiant_prenom}} {{$Et->etudiant_nom}}</a>
                     </h4> 
                     @endif 
                     @endforeach
                     @endif
                     @endforeach   
              </div>
            </div>


           
          </div>
            </div>
            <hr>
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

<div class="panel panel-default">
  <legend>  &nbsp;<i class="fa fa-calendar fa-lg"></i>&nbsp;<i>Date Et Heure De Soutenance</i></legend> 
  @if($res==0) 
 <form class="form-horizontal" role="form" method="POST" action="{{ route('soutenance.dateSoutenance',$Stage->id) }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
@else
<div class="form-horizontal">
@endif
           <div class="form-group">
             <label class="col-md-4 control-label" for="passwordinput">Date et heure de début </label>
             <div class="col-md-4">
              @if($res==0) 
                                  <div class='input-group date' id='datetimepicker6' >
                                 <input type='text' class="form-control" name="datet" id="date" value="{{old('datet')}}"/>
                                 <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                                   </div>
                 <script type="text/javascript">
                     $(document).ready(function () {
                         $('#datetimepicker6').datetimepicker({
                            locale: 'fr',
                          
                           format: 'YYYY-MM-DD HH:mm'
                           });
                         
                       });
                   </script>
              @else
           <label class="control-label" >{{$datet}}</label>  

              @endif
             </div>
           </div>

             <div class="form-group">
             <label class="col-md-4 control-label" for="passwordinput">Durée</label>
             <div class="col-md-4">
               @if($res==0)
                                  <div class='input-group date' id='datetimepicker7'>
                                 <input type='text' class="form-control" name="duree" id="duree" value="@if(old('duree')=='') 00:00 @else {{old('duree')}} @endif"/>
                                 <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                                   </div>
                 <script type="text/javascript">
                     $(document).ready(function () {
                         $('#datetimepicker7').datetimepicker({
                            locale: 'fr',
                          
                           format: 'HH:mm',

                           });
                         
                       });
                   </script>
              @else
              <label class="control-label" >{{$duree}}</label>  
             
              @endif                   
             </div>
           </div>
@if($res==0)
 
             
<div class="form-group">
  <div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-success btn-xs"><i class="fa fa-share-square-o fa-lg"></i> Envoyer</button>

  </div>
</div>
 
 
</form>
@else
</div>
@endif  



</div>





<!-- soutenance========================================================-->
<!-- soutenance========================================================-->
<!-- soutenance========================================================-->














                                                                                                                  
@if($res== 1)
  
<form class="form-horizontal" role="form" name="test" method="POST" onsubmit="return validateForm()" action="{{route('soutenance.enregSoutenance',$Stage->id) }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">


    
      <div class="panel panel-default">
        <input type="hidden" name="datedebut" value="{{$datet}}"/>
      <input type="hidden" name="datefin" value="{{$datefin}}"/>
      
    <input type="hidden" name="datefinEn" value="{{$datefinEn}}"/>
       
      <legend>  &nbsp;<i class="fa fa-hand-o-up fa-lg"></i>&nbsp;<i> Sélectionner Une Salle</i></legend>

<br>
     
    <div>


 <table id="example"  class="table table-bordered table-hover table-striped table-condensed" cellspacing="1" width="100%">
    <thead>
        <tr>
           <th style="width:20px">#</th>
           <th><font size="2">Nom</font></th> 
           <th align="right" style="width:150px"><font size="2">Nombre de place</font></th>
            <th style="width:20px"><font size="2">Actions</font></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
           <th>#</th>
           <th><font size="2">Nom </font></th>
           <th><font size="2">Nombre de place</font></th>
            <th><font size="2">Actions</font></th>
        </tr>
    </tfoot>
 
    <tbody>
                  @foreach($Soutenance_salle as $Salle)
                    <tr >
                   
                    <td >{{$Salle->id}}</td>
                    <td >{{$Salle->salle_nom}}</td>
                   
                    <td >{{$Salle->salle_nb_plase}}</td>
                   
                 
                   <td>
                   <input class="col-md-4  single-checkbox" type="checkbox" name="CBS{{$Salle->id}}" value="1" data-toggle="tooltip" data-placement="top" title="Sélectionner une salle">
                    
                   </td> 
                   
                  </tr>
                 @endforeach


    </tbody>    
   </table> 

 



 



  </div> 


   
    
    
    
</div>

<script>

$(document).ready(function() {



    $('#example').DataTable( {
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
    <script >
              $(document).ready(function () {
                    
               

                $.fn.limit = function(n) {
                var self = this;
                 this.click(function(){
                  (self.filter(":checked").length==n)?
                  self.not(":checked").attr("disabled",true).addClass("alt"):
                  self.not(":checked").attr("disabled",false).removeClass("alt");
                   });
                  }
                  
                  $("input:checkbox").limit(1);



                });

    </script>





        
      <div class="panel panel-default">
      
        
    
<legend>&nbsp;<i class="fa fa-hand-o-up fa-lg"></i>&nbsp;<i>Sélectionner les jurys</i></legend>

<ol class="breadcrumb col-md-8 col-md-offset-2">
       <table >
      <tr>
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


      
    <div>

 <?php $co=0; ?>
 <table id="examplePrf" class="table table-bordered table-hover table-striped table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th>#</th>
           <th>Nom</th>
           <th>Prénom</th>
           <th>Grade</th>
           <th>Spécialité</th>
           <th>Actions</th>
          
        </tr>
    </thead>

    <tfoot>
        <tr>
          <th>#</th>
           <th>Nom</th>
           <th>Prénom</th>
           <th>Grade</th>
           <th>Spécialité</th>
           <th>Actions</th>
        </tr>
    </tfoot>
 
    <tbody>
                      @foreach($jury as $jur)
                      <?php  $co=$co+1; ?>
                 <tr>
                   
                    <td>{{$jur->id}}</td>
                    <td>{{$jur->enseig_nom}}</td>
                    <td>{{$jur->enseig_prenom}}</td>  
                    <td>{{$jur->enseig_grade_nom}}</td> 
                    <td>{{$jur->enseig_specialite_nom}}</td> 
                    
                    
                    
                    
     
           
                     
                  
             <td style="width:200px">
             <select class="form-control  chosen-select-no" id="select<?php echo $co ?>" data-placeholder="Sélectionner jury"  name="JR{{$jur->id}}" class="label label-info"   data-toggle="tooltip" data-placement="top" title="Sélectionner jury" >  
               <option value=""></option>
               <option value="Président">Président</option>
               <option value="Rapporteur">Rapporteur</option>
               <option value="Membre">Membre</option>
             </select>   
                       
                  
                    </td> 
                   
                 </tr>
                 @endforeach
                 


    </tbody>    
   </table> 

 


    </div> 



  </div>

<script>



function validateForm() {
    
        
       
if($("input:checkbox").filter(":checked").length==0)
{//alert(" Il faut sélectionner une salle");
$('#confirm').modal('show');
return false;
}
var j=<?php echo $co ?>;
var x=0;
for(var i=1;i<=j;i++)
{
  if($('#select'+i).val()=="Président" || $('#select'+i).val()=="Rapporteur" || $('#select'+i).val()=="Rapporteur"  )
    x++;
}
if(x==0)
{
$('#confirm2').modal('show');
return false;
}
x=0;
for(var i=1;i<=j;i++)
{
  if($('#select'+i).val()=="Président")
    x++;
}
if(x==0)
{
$('#confirm3').modal('show');
return false;
}




return true;

        
    
}



   </script>

<script>

$(document).ready(function() {



   var table = $('#examplePrf').DataTable( {
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


 $('select#specialite').change( function() { table.column(4).search($(this).val()).draw(); } );
} );


  
</script>
    
    
<div class="form-group">
              <div class="col-md-6 col-md-offset-4">
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

    


<!-- soutenance========================================================-->
<!-- soutenance========================================================-->
<!-- soutenance========================================================-->
<!-- soutenance========================================================-->
















@endif


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