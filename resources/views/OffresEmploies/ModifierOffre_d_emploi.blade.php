@extends('app')

@section('conten')


<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/offre_d_emploi') }}">Gérer Les Offres D'emplois</a></li>
  <li class="active">Modifier Une Offre D'emploi</li>
</ol>



<hr>
 <div class="row">
    <div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
  

 

  <legend>  &nbsp;<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;<i>Modifier Un Offre D'emploi</i></legend>
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
       <input name="_method" type="hidden" value="PUT">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">          

        <fieldset>

<!-- Form Name -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Statut de l'offre<font color="red">*</font></label>  
             <div class="col-md-2">
             <select class="form-control  chosen-select-no-single" data-placeholder="Statut de l'offre" name="emploi_status" >
              @if($Offre_d_emploi->emploi_status=="En attente") 
              <option class="label label-warning" value="En attente" selected="selected">En attente</option> 
              @else
              <option class="label label-warning" value="En attente">En attente</option> 
              @endif
              @if($Offre_d_emploi->emploi_status=="Diffuser") 
              <option class="label label-success" value="Diffuser" selected="selected">Diffuser</option>
               @else
              <option class="label label-success" value="Diffuser">Diffuser</option>
              @endif
              @if($Offre_d_emploi->emploi_status=="Archivé")
              <option class="label label-danger"value="Archivé" selected="selected">Archivé</option>
              @else
              <option class="label label-danger"value="Archivé">Archivé</option>
              @endif
             </select>      
            </div>


</div>

  
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Titre du poste <font color="red">*</font></label>  
  <div class="col-md-6">
  <input id="textinput" name="emploi_titre" value="{{$Offre_d_emploi->emploi_titre}}" type="text" placeholder="Titre du poste" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre de postes <font color="red">*</font></label>  
  <div class="col-md-3">
  
   <div class="input-group spinner">
             <input type="text" class="form-control" name="emploi_nbr"  id="emploi_nbr" value="{{$Offre_d_emploi->emploi_nbr}}">
               <div class="input-group-btn-vertical">
            <button type="button" id="uemploi_nbr" class="btn btn-default"><i class="fa fa-caret-up"></i></button>
             <button type="button" id="demploi_nbr" class="btn btn-default"><i class="fa fa-caret-down"></i></button>
             </div>
            </div> 
             <script type="text/javascript">
                       $(document).ready(function ($) {
                $('.spinner .btn#uemploi_nbr:first-of-type').on('click', function() {
                  $('.spinner input#emploi_nbr').val( parseInt($('.spinner input#emploi_nbr').val(), 10) + 1);
                });
                $('.spinner .btn#demploi_nbr:last-of-type').on('click', function() {
                   if($('.spinner input#emploi_nbr').val()>1)
                  $('.spinner input#emploi_nbr').val( parseInt($('.spinner input#emploi_nbr').val(), 10) - 1);
                });
                })(jQuery);

               </script>


  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Date de fin <font color="red">*</font></label>
  <div class="col-md-4">
                                        <div class='input-group date' id='datetimepicker6'>
                                        <input type='text' class="form-control" name="emploi_date_fin" value="{{$Offre_d_emploi->emploi_date_fin}}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                        </div>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#datetimepicker6').datetimepicker({
                                   locale: 'fr',
                                 
                                  format: 'YYYY-MM-DD'

                                });
                              
                            });
                        </script>

  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Entreprise <font color="red">*</font></label>
  <div class="col-md-4">
               <select class="form-control chosen-select-deselect" data-placeholder="Sélectionner Entreprise" name="ent_id"  >
                               <option value=""></option>
                                @foreach($Entreprise as $Entre)
                                 @if($Entre->id ==$Offre_d_emploi->ent_id)
                                  <option value="{{$Entre->id}}" selected="selected">{{$Entre->ent_nom}}</option>
                                  @else
                                  <option value="{{$Entre->id}}">{{$Entre->ent_nom}}</option>
                                  @endif
                                @endforeach

                 
                             </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Filière <font color="red">*</font></label>
  <div class="col-md-4">
   
      <select class="form-control chosen-select" data-placeholder="Sélectionner les Filières" name="filiere_id[]" multiple >
                               <option value=""></option>

                                @foreach($Filiere as $fil)
                                <option value="{{$fil->id}}" 
                                  "@foreach($Emploi_filere as $emp) 
                                  @if($emp->filiere_id ==$fil->id)
                                     ' selected="selected"'
                                    @endif
                                  @endforeach "
                                  >{{$fil->filiere_nom}}</option>
                                @endforeach 
                            




                 
                             </select>




  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Compétence">Compétence <font color="red">*</font></label>
  <div class="col-md-6">                     
    <textarea class="form-control" rows="7" id="some-textarea" LANG="fr" data-placeholder="Compétence" name="emploi_competence">{{$Offre_d_emploi->emploi_competence}}</textarea>
      
                                                          
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

<!-- Button (Double) -->
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
                              
                            });
                        </script>
  


@endsection
