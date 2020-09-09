@extends('app')

@section('content')
<br><br><br><br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				
				  <legend>  &nbsp;<i class="fa fa-sign-in fa-1x"></i>&nbsp;<i>Se Connecter</i></legend>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Oups! </strong> Il y avait quelques problèmes avec votre entrée.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									
                                    @if($error=='These credentials do not match our records.')
                                    <li>Le mot de passe ou l'adresse électronique que vous avez saisi est incorrect.</li>
                                    @else
									<li>{{ $error }}</li>
									@endif
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Adresse électronique</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Mot de passe</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember">Garder ma session active
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary btn-sm">Connexion</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Mot de passe oublié ?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
