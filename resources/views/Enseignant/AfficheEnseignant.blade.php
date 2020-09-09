@extends('app')

@section('conten')

<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}"style=" font-weight:bold"><i>Stage+</i> </a></li>
  
  <li class="active">Gérer Les Enseignants</li>
</ol>

<hr>
<ol class="breadcrumb">
  <a href="{{ url('/enseignant/create')}}" class="btn btn-primary btn-sm"> Ajouter un Enseignant  <i class="fa fa-user-plus fa-lg"></i></a>
</ol>
<div class="col-sm-offset-1 col-sm-11">

        
      <div class="panel panel-default">
      
        
    
<legend>  &nbsp;<i class="fa fa-cog fa-spin fa-lg"></i>&nbsp;<i>Gérer Les Enseignants</i></legend>

      <br>
    <div>


 <table id="exampleEN" class="table table-bordered table-hover table-striped table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
           <th>#</th>
           <th>Nom</th>
           <th>Prénom</th>
           <th>Code</th>
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
           <th>Code</th>
           <th>Grade</th>
           <th>Spécialité</th>
           <th>Actions</th>
        </tr>
    </tfoot>
 
    <tbody>
                      @foreach($Enseignant as $user)
                 <tr>
                   
                    <td>{{$user->id}}</td>
                    <td>{{$user->enseig_nom}}</td>
                    <td>{{$user->enseig_prenom}}</td>  
                    <td>{{$user->enseig_code}}</td>
                    <td>{{$user->enseig_grade_nom}}</td> 
                    <td>{{$user->enseig_specialite_nom}}</td> 
                    
                    
                    
                    
                 
                     
                  
                    <td style="width:100px">
                         
                       
                         <a href="{{ route('enseignant.show',$user->id) }}" class="btn btn-default btn-xs"   data-toggle="tooltip" data-placement="top" title="Afficher"><span class="glyphicon glyphicon-user"></span></a>
                         
                         <a href="{{ route('enseignant.edit',$user->id) }}" class="btn btn-primary btn-xs"   data-toggle="tooltip" data-placement="top" title="Modifier"><span class="glyphicon glyphicon-pencil"></span></a>
                        
                           
                          @if ($user->enseig_status == '1')
                                
                          <a href="{{ route('enseignant.desactiver', $user->id) }}" class="btn btn-danger btn-xs"data-toggle="tooltip" data-placement="top" title="Désactiver">
                          <i class="fa fa-user-times"></i></a>      

                         
                         @else
                         <a href="{{ route('enseignant.activer', $user->id) }}" class="btn btn-success btn-xs"data-toggle="tooltip" data-placement="top" title="Activer"><span class="glyphicon glyphicon-ok"></span></a>      
                         
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

   $('#exampleEN tfoot th').each( function () {
        var title = $('#exampleEN thead th').eq( $(this).index() ).text();
      
           

        if( title == 'Code'|| title == 'Spécialité')
        $(this).html( '<input type="text" size="5" class="form-control input-sm" placeholder="'+title+'" />' );
    } );

   var table = $('#exampleEN').DataTable( {"order": [[ 0, "desc" ]],
    "language": 
    {url: 'frData.json'
     },

        initComplete: function () {
            var api = this.api();
 
            api.columns().indexes().flatten().each( function ( i ) {
                var column = api.column( 4 );
                var select = $('<select  class="form-control chosen-select input-sm" style="width:280px"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );


 
 
  
 
    table.columns().eq( 0 ).each( function ( colIdx ) {
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );


} );


  
</script>




@endsection