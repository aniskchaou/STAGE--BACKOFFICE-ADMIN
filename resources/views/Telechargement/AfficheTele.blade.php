@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  
  <li class="active">Gérer Les Téléchargements</li>
</ol>



<hr>


<ol class="breadcrumb">
          
   <a href="{{ url('/telecharger/create')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Ajouter Téléchargement</a>         
          
</ol>
    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmer la suppression</h4>
                </div>
            
                <div class="modal-body">
                    <p>Vous êtes sur le point de supprimer un téléchargement, cette procédure est irréversible.</p>
                    <p>Voulez-vous continuer?</p>
                   
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger btn-ok" data-dismiss="modal" id="delete">Effacer</button>
                </div>
            </div>
        </div>
    </div>

<div class="col-sm-offset-1 col-sm-10">

        
      <div class="panel panel-default">
      
      
       <legend>  &nbsp;<i class="fa fa-cog fa-spin fa-lg"></i>&nbsp;<i>Gérer Les Téléchargements</i></legend>

<br>
     
    <div>


 <table id="Tel" class="table table-striped table-hover table-condensed" cellspacing="1" width="100%">
    <thead>
        <tr >
           <th>#</th>
           <th>Nom</th>
           <th>Utilisateur</th>
           <th>Actions</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
           <th>#</th>
           <th>Nom</th>
           <th>Utilisateur</th>
           <th>Actions</th>
        </tr>
    </tfoot>
 
    <tbody>

                      @foreach($Telecharger as $Tele)
                 <tr  >
                   
                    <td style="width:30px">{{$Tele->id}}</td>
                    <td style="width:250px"> {{$Tele->tele_nom}}</td>

                    <td >
                     @foreach($Tele_utilisateur as $TeleU)
                      @if($Tele->id== $TeleU->tele_id)
                      <span class="label label-default"> {{$TeleU->utilisa_type}}</span>
                        

                      @endif
                     @endforeach
                    </td>

                     
                  
                    <td style="width:30px" >
                       <table>
                       <tr>
                        <td>
                    <a href=" {{ url('/uploads/'.$Tele->tele_ficher) }} " class="btn btn-default btn-xs"   data-toggle="tooltip" data-placement="top" title="Télécharger"><i class="fa fa-download fa-lg"></i> </a>
                      </td> <td style="width:8px"></td>
                      <td>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('telecharger/'.$Tele->id)}}" >
                     <input name="_method" type="hidden" value="DELETE">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">   


                         <button type="submit" class="btn btn-danger btn-xs"  name="remove_levels" data-toggle="tooltip" data-placement="top" title="Supprimer Téléchargement" ><span class="glyphicon glyphicon-trash"></span></button> 
                    </form> 
                    </td>  
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



    $('#Tel').DataTable( {
      "order": [[ 0, "desc" ]],
    "language": 
    {url: 'frData.json'
     },



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