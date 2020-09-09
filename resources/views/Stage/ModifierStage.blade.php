@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}"style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/stage') }}">Gérer Les Stages</a></li>
  <li class="active">Modifier Un Stage</li>
</ol>



<hr>
<div class="container-fluid">
	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
			
        <legend>  &nbsp;<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;<i>Modifier Un Stage</i></legend>
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

                      

	                 <form class="form-horizontal" role="form" method="POST" action="{{ url('stage/'.$Stage->id)}}">
                          <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                         
                         <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Statut de stage <font color="red">*</font></label>  
           <div class="col-md-4">
             <select class="form-control  chosen-select-no-single" data-placeholder="Statut de l'offre" name="stage_status" >
              @if($Stage->stage_status=="En attente de vérification de contenue") 
              <option class="label label-warning" value="En attente de vérification de contenue" selected="selected">En attente de vérification de contenue</option> 
              @else
               <option class="label label-warning" value="En attente de vérification de contenue">En attente de vérification de contenue</option>  
              @endif


              @if($Stage->stage_status=="En attente d'affectation") 
              <option class="label label-info" value="En attente d'affectation" selected="selected">En attente d'affectation</option> 
              @else
               <option class="label label-info" value="En attente d'affectation">En attente d'affectation</option> 
              @endif
              @if($Stage->stage_status=="En attente de validation finale") 
              <option class="label label-primary" value="En attente de validation finale" selected="selected">En attente de validation finale</option> 
              @else
               <option class="label label-primary" value="En attente de validation finale">En attente de validation finale</option> 
              @endif

              @if($Stage->stage_status=="Valide") 
              <option class="label label-success" value="Valide" selected="selected">Valide</option>
               @else
              <option class="label label-success" value="Valide">Valide</option>
              @endif
             @if($Stage->stage_status=="Archivé") 
              <option class="label label-danger" value="Archivé" selected="selected">Archivé</option> 
              @else
               <option class="label label-danger" value="Archivé">Archivé</option>  
              @endif
             </select>      
            </div>
          </div>
						
            <div class="form-group">
							<label class="col-md-4 control-label">Titre du stage <font color="red">*</font></label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="stage_title" value="{{$Stage->stage_title}}">	    
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Type de stage<font color="red">*</font></label>
							<div class="col-md-5">
						     <select class="form-control chosen-select" data-placeholder="sélectionner" name="type_id"  >
                               <option value=""></option>
                                @foreach($Type_stage as $Type)
                                
                                  @if($Type->id ==$Stage->type_id)
                                <option value="{{$Type->id}} "selected="selected">{{$Type->type_nom}}</option>
                                 @else 
                                 <option value="{{$Type->id}} ">{{$Type->type_nom}}</option>
                                   @endif
                                @endforeach
                             </select>
                             </div>
						            </div> 
              <div class="form-group">
              <label class="col-md-4 control-label">Nombre de candidat <font color="red">*</font></label>
              <div class="col-md-5">
                    
              
                 

            <div class="input-group spinner">
             <input type="text" class="form-control" name="stage_nbr_etudiant" id="stage_nbr_etudiant" value="{{$Stage->stage_nbr_etudiant}}">
               <div class="input-group-btn-vertical">
            <button type="button"  id="ustage_nbr_etudiant" class="btn btn-default"><i class="fa fa-caret-up"></i></button>
             <button type="button" id="dstage_nbr_etudiant"  class="btn btn-default"><i class="fa fa-caret-down"></i></button>
             </div>
            </div>
                  <script type="text/javascript">
                       $(document).ready(function ($) {
                $('.spinner .btn#ustage_nbr_etudiant:first-of-type').on('click', function() {
                  $('.spinner input#stage_nbr_etudiant').val( parseInt($('.spinner input#stage_nbr_etudiant').val(), 10) + 1);
                });
                $('.spinner .btn#dstage_nbr_etudiant:last-of-type').on('click', function() {
                   if($('.spinner input#stage_nbr_etudiant').val()>1)
                  $('.spinner input#stage_nbr_etudiant').val( parseInt($('.spinner input#stage_nbr_etudiant').val(), 10) - 1);
                });
                })(jQuery);

               </script>



              </div>
            </div>
                         <div class="form-group">
                         	<label class="col-md-4 control-label">Date de début <font color="red">*</font></label>
 						                 <div class='col-md-6'>
                                
                                    <div class='input-group date' id='datetimepicker6'>
                                        <input type='text' class="form-control" name="stage_dete_debut" value="{{$Stage->stage_dete_debut}}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                   
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label">Date de fin <font color="red">*</font></label>
                            <div class='col-md-6'>
                                
                                    <div class='input-group date' id='datetimepicker7'>
                                        <input type='text' class="form-control"  name="stage_dete_fin" value="{{$Stage->stage_dete_fin}}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                  
                                </div>
                            </div>
                           </div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Entreprise <font color="red">*</font></label>
							<div class="col-md-5">
						     <select class="form-control chosen-select-deselect" data-placeholder="sélectionner" name="entreprise_id"  >
                               <option value=""></option>
                                @foreach($Entreprise as $Entre)
                                 @if($Entre->id ==$Stage->entreprise_id)
                                <option value="{{$Entre->id}}" selected="selected">{{$Entre->ent_nom}}</option>
                                  @else
                                    <option value="{{$Entre->id}}">{{$Entre->ent_nom}}</option>
                                  @endif
                                @endforeach

                 
                             </select>
                             </div>
						</div> 



					    <div class="form-group">
							<label class="col-md-4 control-label">Filiere <font color="red">*</font></label>
							<div class="col-md-5">
						     <select class="form-control chosen-select" data-placeholder="sélectionner" name="filiere_id[]" multiple >
                               

                                @foreach($Filiere as $fil)
                                <option value="{{$fil->id}}" 
                                  "@foreach($Stage_filiere as $emp) 
                                  @if($emp->filiere_id ==$fil->id)
                                     ' selected="selected"'
                                    @endif
                                  @endforeach "
                                  >{{$fil->filiere_nom}}</option>
                                @endforeach 
                 
                             </select>
                             </div>
						</div> 
						 
						<div class="form-group">
							<label class="col-md-4 control-label">Encadreur entreprise <font color="red">*</font></label>
							<div class="col-md-6">
							<input type="text" class="form-control" name="stage_encadreur_s" value="{{$Stage->stage_encadreur_s}}">	    
							</div>
						</div>
                          
                        <div class="form-group">
							<label class="col-md-4 control-label">Sujet <font color="red">*</font></label>
							<div class="col-md-7">
							    
							<textarea class="form-control" rows="7" id="some-textarea" LANG="fr" name="stage_sujet" >{{$Stage->stage_sujet}}</textarea>
                                                          
                              <script type="text/javascript">
                              $(document).ready(function () {  $('#some-textarea').wysihtml5({

                              	locale: "fr-FR",
                                   toolbar: {
                                               "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
                                               "emphasis": true, //Italics, bold, etc. Default true
                                               "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                                               "html": false, //Button which allows you to edit the generated HTML. Default false
                                               "link": true, //Button to insert a link. Default true
                                               "image": false, //Button to insert an image. Default true,
                                               "color": false, //Button to change color of font  
                                               "blockquote": true, //Blockquote  
                                               
                                             }

                               

                              });
                              });
                              </script>
                            


							</div>
						</div>
                          

			<div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                                <a href="javascript:history.back()" class="btn btn-info">
                              <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                            </a>

                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;&nbsp;
                  Modifier
                </button>
                
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
                         <script type="text/javascript">
                            $(document).ready(function () {


                            

                                $('#datetimepicker6').datetimepicker({
                                	 locale: 'fr',
                                 
                                  format: 'YYYY-MM-DD'

                                });
                                $('#datetimepicker7').datetimepicker({
                                	 locale: 'fr',
                                  
                                  format: 'YYYY-MM-DD'
                                });
                                $("#datetimepicker6").on("dp.change", function (e) {
                                    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                                });
                                $("#datetimepicker7").on("dp.change", function (e) {
                                    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                                });
                            });
                        </script>
	
@endsection