@extends('app')

@section('conten')

<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}"style=" font-weight:bold"><i>Stage+</i> </a></li>
  
  <li class="active">Gérer Les Administrateurs</li>
</ol>

<hr>
 @if(Auth::user()->status==1) 
<ol class="breadcrumb">
  <a href="{{ url('/admin/create')}}" class="btn btn-primary btn-sm"> Ajouter un Administrateur&nbsp;<i class="fa fa-user-plus fa-lg"></i></a>
</ol>
  @endif
<div class="col-sm-offset-1 col-sm-11">

        
      <div class="panel panel-default">
      
        
    
<legend>  &nbsp;<i class="fa fa-cog fa-spin fa-lg"></i>&nbsp;<i>Gérer Les Administrateurs</i></legend>

      <br>
    <div>
                     <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmer la suppression</h4>
                </div>
            
                <div class="modal-body">
                    <p>Vous êtes sur le point de supprimer un Administrateur, cette procédure est irréversible.</p>
                    <p>Voulez-vous continuer?</p>
                   
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger btn-ok" data-dismiss="modal" id="delete">Effacer</button>
                </div>
            </div>
        </div>
    </div>



 <table id="adm" class="table table-bordered table-hover table-striped table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
        <th>#</th>
           <th>Nom</th>
           <th>Prénom</th>
           <th>Pseudo</th>
           <th>Téléphone</th>
           <th>E-Mail</th>
           @if(Auth::user()->status==1)  
           <th>Actions</th>
           @endif
        </tr>
    </thead>

    <tfoot>
        <tr>
          <th>#</th>
           <th>Nom</th>
           <th>Prénom</th>
           <th>Pseudo</th>
           <th>Téléphone</th>
           <th>E-Mail</th>
 @if(Auth::user()->status==1) 
           <th>Actions</th>
            @endif
        </tr>


    </tfoot>
 
    <tbody>
                      @foreach($User as $use)
                 <tr>
                   
                    <td>{{$use->id}}</td>
                    <td>{{$use->nom}}</td>
                    <td>{{$use->prenom}}</td>
                    <td>{{$use->name}}</td>
                    <td>{{$use->tel}}</td>  
                    <td>{{$use->email}}</td> 
                    
                    
                    
                    
                 
                     
                 @if(Auth::user()->status==1) 
                    <td style="width:150px">
                         
                      <table><tr>
                        <td>
                         <a href="{{ route('admin.edit',$use->id) }}" class="btn btn-primary btn-xs"   data-toggle="tooltip" data-placement="top" title="Modifier"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                        <td style="width:5px"></td>

                        <td>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/'.$use->id)}}" >
                     <input name="_method" type="hidden" value="DELETE">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                         <button type="submit" class="btn btn-danger btn-xs"  name="remove_levels" data-toggle="tooltip" data-placement="top" title="Supprimer " ><span class="glyphicon glyphicon-trash"></span></button> 
                    </form>
                    </td> 
                 @endif

                        </tr>   
                      </table> 
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



    $('#adm').DataTable( {
      "order": [[ 0, "desc" ]],
    "language": 
    {url: 'frData.json'
     }


} );
} );

  
</script>
 <script>
     $('button[name="remove_levels"]').on('click', function(e){
    var $form=$(this).closest('form');
    e.preventDefault();
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#delete', function (e) {
            $form.trigger('submit');
        });
     });
    </script>




@endsection