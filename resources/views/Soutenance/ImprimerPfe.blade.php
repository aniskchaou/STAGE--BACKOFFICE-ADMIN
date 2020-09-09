



@extends('app')

@section('conten')
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  
  <li class="active">Imprimer liste des soutenances</li>
</ol>



<hr>
<div class="container-fluid">
	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				
					
             
				  <legend>&nbsp;<i class="fa fa-print fa-lg"></i>&nbsp;<i>Imprimer liste des soutenances</i></legend>
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

                      

	                 <form class="form-horizontal" role="form" method="POST" action="{{ url('soutenance/imprimer')}}">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         

						
                        <div class="form-group">
							<label class="col-md-4 control-label">Filière</label>
							<div class="col-md-4">
					        <select class="form-control chosen-select-deselect" name="filiere" data-placeholder="Filière" data-toggle="tooltip" data-placement="top" title=" Filière"   >
                               <option value=""></option>
                               @foreach($Filiere as $fil)
                               <option value="{{$fil->id}}">{{$fil->filiere_nom}}</option>
                               @endforeach
                            </select>
							    
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Type de Stage</label>
							<div class="col-md-4">
                              <select class="form-control  chosen-select-deselect " name="types"  data-placeholder="Type de Stage" data-toggle="tooltip" data-placement="top" title=" Type"   >
                              <option value=""></option>
                               @foreach($Type_stage as $type)
                              <option value="{{$type->id}}">{{$type->type_nom}}</option>
                               @endforeach
                              </select>  
							</div>
						</div>
					    <div class="form-group">
							<label class="col-md-4 control-label">Année Universitaire</label>
							<div class="col-md-4">
								 <select class="form-control  chosen-select-no" data-placeholder="Année Universitaire"  name="anner" class="label label-info"   data-toggle="tooltip" data-placement="top" title=" année universitaire" >  
                                   <option value=""></option>
                                   @foreach($Anner as $an)
                                   <option value="{{$an}}">{{$an}}</option>
                                   @endforeach
                                 </select>   
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Niveau</label>
							<div class="col-md-4">
								<select class="form-control  chosen-select-no" data-placeholder="Niveau"  name="niveau" class="label label-info"   data-toggle="tooltip" data-placement="top" title="Recherche par Niveau" >  
                                  <option value=""></option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>                    
							    
							</div>
						</div>








						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary btn-sm">
								 <i class="fa fa-external-link fa-lg"></i>
								 Envoyer
								</button>
								
								
								
							</div>
						</div>




					</form>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
	
@endsection