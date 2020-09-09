@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}"style=" font-weight:bold"><i>Stage+</i>  </a></li>
  
  <li class="active">Imprimer liste des soutenances</li>
</ol>

<ol class="breadcrumb">

 <button type="button"  class="btn btn-default btn-sm" onclick="doPrint()"><span class="glyphicon glyphicon-print"></span> Imprimer</button>



                  
</ol>


<hr>



<div class="col-sm-offset-0 col-sm-12">

        
      <div class="panel panel-default">
      
      <legend>  &nbsp;<i class="fa fa-print fa-lg"></i>&nbsp;<i>Imprimer liste des soutenances</i></legend>

<br>


     

<div>

      <!--startprint-->
<h4  align="center">Liste {{$Type_stage->type_nom}}&nbsp;{{$Filiere->filiere_nom}}&nbsp;A.U.{{$Ianner}}</h4></td>



<hr>

 <table id="example" class="table table-bordered table-striped table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th>Projet N° </th>
          <th>CIN </th>
          <th>Nom Prénom Fr </th>
          <th>Titre sujet </th>
          <th>Société </th>
          <th>Encadreur(s)<br> établissement</th>
          <th>Encadreur société</th>
          <th>Jurys</th>
          <th>Date soutenance</th>
          <th>Salle</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
          <th>Projet N° </th>
          <th>CIN </th>
          <th>Nom Prénom Fr </th>
          <th>Titre sujet </th>
          <th>Société </th>
          <th>Encadreur(s)<br> établissement</th>
          <th>Encadreur société</th>
          <th>Jurys</th>
          <th>Date soutenance</th>
          <th>Salle</th>
        </tr>
    </tfoot>
 
    <tbody>

                      @foreach($Etudiant as $ETU)
                 <tr>
                   

                    <td style="width:20px" align="right">{{$ETU->stage_id}}</td>
                    <td style="width:20px" >{{$ETU->etudiant_cin}}</td>
                    <td style="width:120px">
                       {{$ETU->etudiant_nom}}&nbsp;{{$ETU->etudiant_prenom}}
                    </td>

                      @foreach($Stage as $Str)                 
                      @if($ETU->stage_id == $Str->id)

                     <td style="width:150px">{{$Str->stage_title}} </td>

                      <td style="width:100px">
                      @foreach($Entreprise  as $Entrep)                 
                      @if($Entrep->id== $Str->entreprise_id)
                      {{$Entrep->ent_nom}} 
                      @endif 
                      @endforeach
                    </td>
                     <td style="width:100px">

                      @foreach($Encadreur as $Enc)
                      @if($Enc->stage_id == $Str->id)
                        @foreach($Enseignant as $Ens)
                         @if($Enc->enseig_id == $Ens->id)
              {{$Ens->enseig_prenom}}&nbsp;{{$Ens->enseig_nom}}
                         <br>
                         @endif
                          @endforeach

                        @endif
                      @endforeach

                    </td> 
                    <td "width:100px">
                      {{$Str->stage_encadreur_s}}


                    </td>


                     <td "width:400px"> 
                    @foreach($jury  as $jr)
                    @if($jr->soutenance_id ==$Str->idSout)
                      
                   {{$jr->enseig_prenom}}&nbsp;{{$jr->enseig_nom}}&nbsp;/&nbsp;{{$jr->qualite_id}}
                         <br>
                    @endif 
                    @endforeach

                     </td>

                        <td>
                      
                      <?php echo date("d/m/Y h:i", strtotime($Str->soute_date_debut))?>
                     </td>
                     <td>
                       {{$Str->salle_nom}}
                      </td>

                      @endif
                      @endforeach

                   
                </tr>
                 @endforeach

 
    </tbody>    
   </table> 



<!--endprint-->


    </div> 
 



  </div> 


    

  
</div>





@endsection




 