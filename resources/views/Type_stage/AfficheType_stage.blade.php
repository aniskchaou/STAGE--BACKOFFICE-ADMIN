@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  
  <li class="active">Gérer les types de stages </li>
</ol>



<hr>

<ol class="breadcrumb">
   <a href="{{ url('/type_stage/create')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Ajouter Un Type De Stage </a> 
 
</ol>

        
          
          



<div class="col-sm-offset-0 col-sm-12">

        
      <div class="panel panel-default">
      
       
      <legend>  &nbsp;<i class="fa fa-cog fa-spin fa-lg"></i>&nbsp;<i>Gérer Les Types De Stages</i></legend>

<br>
     
    <div>


 <table id="example" class="table table-bordered table-hover table-striped table-condensed" cellspacing="1" width="100%">
    <thead>
        <tr >
           <th>#</th>
           <th><font size="2">Nom </font></th>
           <th><font size="2">Durée maximal</font></th>
           <th><font size="2">Durée minimal</font></th>
           <th><font size="2">Encadreur</font></th>
           <th><font size="2">Obligatoire</font></th>
           <th><font size="2">Soutenable</font></th>
           <th><font size="2">Nombre maximum</font></th>
           <th><font size="2">Nombre minimum</font></th>
           <th><font size="2">Actions</font></th>
           
        </tr>
    </thead>
    <tfoot>
        <tr>
           <th>#</th>
           <th><font size="2">Nom </font></th>
           <th><font size="2">Durée maximal</font></th>
           <th><font size="2">Durée minimal</font></th>
           <th><font size="2">Encadreur</font></th>
           <th><font size="2">Obligatoire</font></th>
           <th><font size="2">Soutenable</font></th>
           <th><font size="2">Nombre maximum</font></th>
           <th><font size="2">Nombre minimum</font></th>
           <th><font size="2">Actions</font></th>
        </tr>
    </tfoot>
 
    <tbody>
                      @foreach($Type_stage as $TypeS)
                 <tr >
                   
                    <td style="width:20px" align="right">{{$TypeS->id}}</td>
                    <td style="width:100px" >{{$TypeS->type_nom}}</td>
                    <td align="right">{{$TypeS->type_dur_max}} jours</td>
                    <td align="right">{{$TypeS->type_dur_min}} jours</td>
                   
                      @if($TypeS->type_encadreur==1) <td>Oui </td>@else<td> Non</td> @endif
                      @if($TypeS->type_obligatoire==1) <td>Oui </td>@else<td> Non</td> @endif
                      @if($TypeS->type_soutenable==1) <td>Oui </td>@else<td> Non</td> @endif

                       

                    <td align="right">{{$TypeS->type_nb_max}} étudiants</td>
                    <td align="right">{{$TypeS->type_nb_min}} étudiants</td>
                    <td style="width:10px" >
                      <a href="{{ route('type_stage.edit',$TypeS->id) }}" class="btn btn-primary  btn-xs"   data-toggle="tooltip" data-placement="top" title="Modifier"><span class="glyphicon glyphicon-pencil"></span></a>
                    </td> 
                   
                 </tr>
                 @endforeach


    </tbody>    
   </table> 

 



    </div> 



  </div> 


    <hr>
    
    
    
</div>

<script>

$(document).ready(function() {



    $('#example').DataTable( {
      "order": [[ 0, "desc" ]],
    "language": 
    {url: 'frData.json'
     }


} );
} );


  
</script>



@endsection