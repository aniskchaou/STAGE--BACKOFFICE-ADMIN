@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  
  <li class="active">Gérer Les Secteurs D'activité</li>
</ol>



<hr>


<ol class="breadcrumb">
          
   <a href="{{ url('/secteur/create')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Ajouter Un Secteur D'activité</a>         
          
</ol>


<div class="col-sm-offset-1 col-sm-10">

        
      <div class="panel panel-default">
      
      
       <legend>  &nbsp;<i class="fa fa-cog fa-spin fa-lg"></i>&nbsp;<i>Gérer Les Secteurs D'activité</i></legend>

<br>
     
    <div>


 <table id="example" class="table table-striped table-hover table-condensed" cellspacing="1" width="100%">
    <thead>
        <tr >
           <th>#</th>
           <th>Nom</th>
           <th>Actions</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
           <th>#</th>
           <th>Nom</th>

           <th>Actions</th>
        </tr>
    </tfoot>
 
    <tbody>
                      @foreach($Secteur as $Sec)
                 <tr class="selected" >
                   
                    <td style="width:30px">{{$Sec->id}}</td>
                    <td >{{$Sec->secteur_nom}}</td>

                     
                  
                    <td style="width:30px" >
                         
                       

                         <a href="{{ route('secteur.edit',$Sec->id) }}" class="btn btn-primary  btn-xs"   data-toggle="tooltip" data-placement="top" title="Modifier"><span class="glyphicon glyphicon-pencil"></span></a>
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
     },



} );
    $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
} );


  
</script>



@endsection