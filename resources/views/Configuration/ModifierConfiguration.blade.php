

@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li class="active">Configuration</li>
</ol>



<hr>
<div class="container-fluid">
	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				
					
             
				  <legend>  &nbsp;<i class="fa fa-wrench fa-lg"></i>&nbsp;<i>Configuration</i></legend>
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

                      
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('configuration/1')}}">
                         <input name="_method" type="hidden" value="PUT">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
             
                 <div class="form-group">

							<label class="col-md-4 control-label">Durée minimal d'une soutenance ( en minutes )</label>
					      <div class="col-md-4">
					 
                          <div class="input-group spinner">
                             <input type="text" class="form-control" id="type_dur_min" name="soutenance_dur_max" value="10">
                            <div class="input-group-btn-vertical">
                             <button type="button" id="utype_dur_min" class="btn btn-default"><i class="fa fa-caret-up"></i></button>
                             <button type="button" id="dtype_dur_min" class="btn btn-default"><i class="fa fa-caret-down"></i></button>
                            </div>
                          </div>
                      
                          </div>

                           <div >
                        <a  class="btn btn-link btn-lg" data-toggle="popover" title="informations" data-content="c'est la durée minimal qui sépare deux soutenances pour un même jury "><span class="glyphicon glyphicon-info-sign"></span></a>
                            </div>

                         </div>
                         
                   
                     

                    <script type="text/javascript">
							   $(document).ready(function ($) {
							  $('.spinner .btn#utype_dur_min:first-of-type').on('click', function() {
							    $('.spinner input#type_dur_min').val( parseInt($('.spinner input#type_dur_min').val(), 10) + 1);
							  });
							  $('.spinner .btn#dtype_dur_min:last-of-type').on('click', function() {
							     if($('.spinner input#type_dur_min').val()>1)
							    $('.spinner input#type_dur_min').val( parseInt($('.spinner input#type_dur_min').val(), 10) - 1);
							  });
							  })(jQuery);

							 </script>
						
                       
                 
                        <div class="form-group">
							<label class="col-md-4 control-label">Nombre de dernier éléments</label>
							<div class="col-md-4">									
						      <div class="input-group spinner">
						       <input type="text" class="form-control" name="nbr_elemont"   id="type_dur_max" value="6">
						         <div class="input-group-btn-vertical">
						          <button type="button"  id="utype_dur_max" class="btn btn-default"><i class="fa fa-caret-up"></i></button>
						          <button type="button"  id="dtype_dur_max" class="btn btn-default"><i class="fa fa-caret-down"></i></button>
						         </div>
						          
						       </div>
						      
							</div>
							      <script type="text/javascript">
							         $(document).ready(function ($) {
							  $('.spinner .btn#utype_dur_max:first-of-type').on('click', function() {
							    $('.spinner input#type_dur_max').val( parseInt($('.spinner input#type_dur_max').val(), 10) + 1);
							  });
							  $('.spinner .btn#dtype_dur_max:last-of-type').on('click', function() {
							     if($('.spinner input#type_dur_max').val()>1)
							    $('.spinner input#type_dur_max').val( parseInt($('.spinner input#type_dur_max').val(), 10) - 1);
							  });
							  })(jQuery);
							 </script>
							 <div> <a  class="btn btn-link btn-lg" data-toggle="popover" title="informations" data-content="c'est le nombre de dernier n éléments affichier dans la page d'acceuil.<br> <em>exemple</em><br> si cette valeur est égale à 5, on affiche les 5 derniers stages, 5 offres d'emploies," ><span class="glyphicon glyphicon-info-sign"></span></a>
                          </div>
						</div>
						


                        <div class="form-group">
                           <label class="col-md-2 control-label" for="Compétence">Texte introductif dans la page d'acceuil</label>
                           <div class="col-md-8">                     
                             <textarea class="form-control" rows="9" id="some-textarea" LANG="fr" data-placeholder="Compétence" name="introdu">{{""}}</textarea>                             
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
								<button type="submit" class="btn btn-primary btn-sm">
								<i class="fa fa-pencil-square-o fa-lg"></i>
								Modifier
								</button>
								
								<button type="reset" class="btn btn-danger btn-sm">
									<i class="fa fa-times-circle-o fa-lg"></i>
									 Annuler
							    </button>
								
							</div>
						</div>




					</form>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
	
@endsection