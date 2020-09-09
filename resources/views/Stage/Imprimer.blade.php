@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}"style=" font-weight:bold"><i>Stage+</i>  </a></li>
  
  <li class="active">Imprimer liste des stages valide</li>
</ol>

<ol class="breadcrumb">

 <button type="button"  class="btn btn-default btn-sm" onclick="doPrint()"><span class="glyphicon glyphicon-print"></span> Imprimer</button>



                  
</ol>


<hr>



<div class="col-sm-offset-0 col-sm-12">

        
      <div class="panel panel-default">
      
      <legend>  &nbsp;<i class="fa fa-print fa-lg"></i>&nbsp;<i>Imprimer liste des stages valide</i></legend>

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
          <th>Encadreur société</th>
          <th>date début</th>
          <th>Date fin</th>
        
        </tr>
    </thead>

    <tfoot>
        <tr>
          <th>Projet N° </th>
          <th>CIN </th>
          <th>Nom Prénom </th>
          <th>Titre sujet </th>
          <th>Société </th>
          <th>Encadreur société</th>
          <th>date début</th>
          <th>Date fin</th>
        </tr>
    </tfoot>
 
    <tbody>

                      @foreach($Etudiant as $ETU)
                 <tr>
                   

                    <td style="width:20px" align="right">{{$ETU->stage_id}}</td>
                    <td style="width:50px" align="right">{{$ETU->etudiant_cin}}</td>
                    <td style="width:200px">
                       {{$ETU->etudiant_nom}}&nbsp;{{$ETU->etudiant_prenom}}
                    </td>

                    

                     <td style="width:400px">{{$ETU->stage_title}} </td>

                      <td style="width:100px">
                    
                      {{$ETU->ent_nom}} 
                     
                    </td>

                     <td style="width:100px">

                  {{$ETU->stage_encadreur_s}}

                    </td> 
                    <td "width:100px" align="right">
                      <?php echo date("d/m/Y ", strtotime($ETU->stage_dete_debut))?>
                    </td>


                     <td "width:400px" align="right">
                      <?php echo date("d/m/Y ", strtotime($ETU->stage_dete_fin))?>
                     </td>

                  

                      

                   
                </tr>
                 @endforeach

 
    </tbody>    
   </table> 



<!--endprint-->


    </div> 
 



  </div> 


    

  
</div>





@endsection




 