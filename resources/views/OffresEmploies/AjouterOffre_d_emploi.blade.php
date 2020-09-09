@extends('app')

@section('conten')


<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/offre_d_emploi') }}">Gérer Les Offres D'emplois</a></li>
  <li class="active">Ajouter Une Offre D'emploi</li>
</ol>



<hr>
 <div class="row">
    <div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
  

 

  <legend>  &nbsp;<i class="fa fa-plus-square fa-lg"></i>&nbsp;<i>Ajouter Une Offre D'emploi</i></legend>
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

                      

  <form class="form-horizontal" role="form" method="POST" action="{{ url('/offre_d_emploi')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         

        <fieldset>

<!-- Form Name -->

  
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Titre du poste <font color="red">*</font></label>  
  <div class="col-md-6">
  <input id="textinput" name="emploi_titre" value="{{old('emploi_titre') }}" type="text" placeholder="Titre du poste" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre de postes <font color="red">*</font></label>  
  <div class="col-md-3">
  
   <div class="input-group spinner">
             <input type="text" class="form-control" name="emploi_nbr"  id="emploi_nbr" value="@if(old('emploi_nbr')=='') 1 @else {{old('emploi_nbr')}} @endif">
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
                                        <input type='text' class="form-control" name="emploi_date_fin" value="{{old('emploi_date_fin') }}"/>
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
                                 @if($Entre->id ==old('ent_id'))
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
                                @foreach($Filiere as $user)

                                <option value="{{$user->id}}">{{$user->filiere_nom}}</option>
                                @endforeach

                 
                             </select>

  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Compétence">Compétence <font color="red">*</font></label>
  <div class="col-md-6">                     
    <textarea class="form-control" rows="7" id="some-textarea" LANG="fr" data-placeholder="Compétence" name="emploi_competence">{{old('emploi_competence')}}</textarea>
      
                                                          
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
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-6">

                 
                <button type="submit" class="btn btn-primary ">
                 <span class="glyphicon glyphicon-floppy-open"></span>
                 Enregistrer
                </button>
                
                <button type="reset" class="btn btn-danger ">
                  <span class="glyphicon glyphicon-remove"></span>
                   Annuler
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
