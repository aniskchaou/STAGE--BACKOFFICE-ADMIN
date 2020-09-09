@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  
  <li class="active">Gérer les Salles </li>
</ol>



<hr>

<ol class="breadcrumb">
   <a href="{{ url('/soutenance_salle/create')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Ajouter Une Salle </a> 
 
</ol>

        
          
          



<div class="col-sm-offset-2 col-sm-8">

        
      <div class="panel panel-default">
      
       
      <legend>  &nbsp;<i class="fa fa-cog fa-spin fa-lg"></i>&nbsp;<i>Gérer Les Salles</i></legend>

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
                   
                 
                    <td   >
                      <a href="{{ route('soutenance_salle.edit',$Salle->id) }}" class="btn btn-primary  btn-xs"   data-toggle="tooltip" data-placement="top" title="Modifier"><span class="glyphicon glyphicon-pencil"></span></a>
                   
                        @if ($Salle->salle_status == '1')
                                
                          <a href="{{ route('soutenance_salle.desactiver', $Salle->id) }}" class="btn btn-danger btn-xs"data-toggle="tooltip" data-placement="top" title="Désactiver"><span class="glyphicon glyphicon-remove"></span></a>      

                         
                         @else
                         <a href="{{ route('soutenance_salle.activer', $Salle->id) }}" class="btn btn-success btn-xs"data-toggle="tooltip" data-placement="top" title="Activer"><span class="glyphicon glyphicon-ok"></span></a>      
                         
                         @endif



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