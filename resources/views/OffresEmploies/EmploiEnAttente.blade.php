
@extends('app')

@section('conten')
 





 <ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  <li><a href="{{ url('/offre_d_emploi') }}">Gérer Les Offres D'emploie</a></li>
  <li class="active">Emploie En Attente</li>
</ol>




<hr>


<ol class="breadcrumb">

       <div class="input-group col-md-12 "> 
  <table  width="100%">
    <th>

    <td style="width:40px" align="center"> <i class="fa fa-search fa-2x"></i></td>
     
       
   
     <td style="width:10px"></td>
   <td width="20%" >
       <select class="form-control chosen-select-deselect " data-placeholder="Rechercher par Filière" id="engines"  >
        <option value=""></option>
        @foreach($Filiere as $user)
        <option value="{{$user->filiere_nom}}">{{$user->filiere_nom}}</option>
        @endforeach
       </select>
     </td> 
       <td style="width:10px"></td>
     <td width="10%">

    <select class="form-control  chosen-select-deselect " data-placeholder="Rechercher par Secteur" id="engines2"  >
     <option value=""></option>
     @foreach($Secteur as $Sec)
     <option value="{{$Sec->secteur_nom}}">{{$Sec->secteur_nom}}</option>
      @endforeach
    </select>      
      </td>
        <td style="width:10px"></td>
        
          
    </td> 
      <td style="width:10px"></td>
 <td>     
<div id="inf"></div>
</td>
</th>
</table>
     </div>       
</ol>

<hr>
 <div class="row">
    <div class="col-md-12 col-md-offset-0">
<div class="panel panel-default">
  

 

  <legend>  &nbsp;<i class="fa fa-circle-o-notch fa-spin"></i> &nbsp;<i>Emploie En Attente</i></legend>
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




 <table id="exampleOF" class="table table-striped table-hover table-bordered table-condensed" cellspacing="0" width="100%">

    <thead>
        <tr>
           <th>#</th>
           <th>Titre du poste</th>
           <th>Date de fin</th>
           <th>Filière</th>
           <th>Nombre de postes</th>
           <th>Entreprise</th>
           <th>Secteur d'activité</th>
           <th>État</th>
           <th>Actions</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
           <th>#</th>
           <th>Titre du poste</th>
           <th>Date de fin</th>
           <th>Filière</th>
           <th>Nombre de postes</th>
           <th>Entreprise</th>
           <th>Secteur d'activité</th>
           <th>État</th>
           <th>Actions</th>
        </tr>
    </tfoot>
 
    <tbody>

                      @foreach($Offre_d_emploi as $Of)
                 <tr>
                   
                    <td align="right">{{$Of->id}}</td>
                    <td>{{$Of->emploi_titre}}</td>
                    <td align="right">{{$Of->emploi_date_fin}}</td> 
                    <td style="width:100px">
                    @foreach($Emploi_filere as $StFil)
                     @if($StFil->emploi_id==$Of->id)
                     @foreach($Filiere as $Fil)
                      @if($Fil->id==$StFil->filiere_id)
                      <span class="label label-primary">{{$Fil->filiere_nom}}</span>
                      @endif 
                     @endforeach
                      @endif
                     @endforeach
                    </td> 

                    <td align="right"><span class="badge">{{$Of->emploi_nbr}}</span></td>
                    <td>
                      @foreach($Entreprise as $Ent)
                       @if($Ent->id==$Of->ent_id)
                       <a href="{{ route('entreprise.show',$Ent->id) }}" class="label label-default"   data-toggle="tooltip" data-placement="top" title="Afficher Entreprise">
                      {{$Ent->ent_nom}} </a>
                       @endif 
                      @endforeach
                    </td> 

                    <td>
                      @foreach($Entreprise as $Ent)
                       @if($Ent->id==$Of->ent_id)
                        @foreach($Secteur as $Sec)
                          @if($Sec->id==$Ent->secteur_id)
                            {{$Sec->secteur_nom}}

                          @endif
                        @endforeach
                       @endif 
                      @endforeach



                    </td> 



                    <td>
                       @if($Of->emploi_status=="Diffuser")
                      <span class="label label-success">{{$Of->emploi_status}}</span> 
                        @else
                         @if($Of->emploi_status=="En attente")
                          <span class="label label-warning">{{$Of->emploi_status}}</span> 
                          @else
                           <span class="label label-danger">{{$Of->emploi_status}}</span> 
                           @endif 
                           @endif
                         

                      </td>  
                  
                    <td style="width:10px">
                         
                       
                         <a href="{{ route('offre_d_emploi.show',$Of->id) }}" class="btn btn-default btn-xs"   data-toggle="tooltip" data-placement="top" title="Afficher"><i class="fa fa-search"></i></span></a>
                         
                         <a href="{{ route('offre_d_emploi.edit',$Of->id) }}" class="btn btn-primary  btn-xs"   data-toggle="tooltip" data-placement="top" title="Modifier"><span class="glyphicon glyphicon-pencil"></span></a>
                        
                
                    </td> 
                   
                 </tr>
                 @endforeach


    </tbody>    
  </table> 
<script>

$(document).ready(function() {



   var table = $('#exampleOF').DataTable( {"order": [[ 0, "desc" ]],
   "language": 
    {url: 'frData.json'
     },


    } );

   var colvis = new $.fn.dataTable.ColVis( table ,{
            exclude: [ 0,8 ],
        } );
 
 
    $( colvis.button() ).insertAfter('div#inf');

 $('#engines').change( function() { table.column(3).search($(this).val()).draw(); } );

 $('#engines2').change( function() { table.column(6).search($(this).val()).draw(); } );
$('#date').on( 'keyup change', function () {
            table
                .column(2)
                .search(this.value)
                .draw();
        } );

} );


  
</script>
          </div>
        </div>
      </div>
    </div>
    <hr>

</div>
</div>

@endsection