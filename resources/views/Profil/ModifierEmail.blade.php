
@extends('app')
@section('conten')

<div id="non-printable">

<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i> </a></li>
  
  <li class="active">Modifier Email</li>
</ol>



<hr>

      
 
 </div>
	<div class="container-fluid">
		
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				
				<legend>  &nbsp; <i class="fa fa-pencil-square-o fa-1x"></i>&nbsp;<i> Modifier Email</i></legend>
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

		

	              
                         <form class="form-horizontal" role="form" name="ff" method="POST" action="{{ route('user.ModifierEmail',Auth::user()->id)}}">
                        
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         
                         <div class="form-group">
							<label class="col-md-4 control-label">Ancien Email</label>
							<div class="col-md-4">
							  
							<input type="text" class="form-control" name="Ancien_Email" value="{{$User->email}}">	
							</div>
						</div> 
					
                        <div class="form-group">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-4">
							  
							<input type="text" class="form-control" name="Email" value="{{old('Email')}}">	
							</div>
						</div>
					    <div class="form-group">
							<label class="col-md-4 control-label">Vérification email</label>
							<div class="col-md-4">
							
							<input type="text" class="form-control" name="Verification_Email" value="{{old('Verification_email')}}">		    
							</div>
						</div> 
						


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                <a href="javascript:history.back()" class="btn btn-default btn-sm">
		                        	<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	                         	</a>

								<button type="submit" class="btn btn-primary btn-sm">
									<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;&nbsp;
									Modifier
								</button>
							    <button type="reset" class="btn btn-danger btn-sm">
                                   <span class="glyphicon glyphicon-remove"></span>
                                    Annuler
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