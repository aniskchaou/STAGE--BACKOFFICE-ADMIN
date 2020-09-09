@extends('app')

@section('content')

<br><br><br><br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				
				<legend>  &nbsp;<i class="fa fa-refresh fa-spin"></i>&nbsp;<i>Réinitialiser Le Mot De Passe</i></legend>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
						<li>Consultez votre courrier électronique. Nous vous avons envoyé un message avec un lien de réinitialisation de votre mot de passe.</li>
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Oups! </strong> Il y avait quelques problèmes avec votre entrée.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									  @if($error=='passwords.user')
                                    <li> L'adresse électronique que vous avez saisi est incorrect.</li>
                                    @else
									<li>{{ $error }}</li>
									@endif
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Adresse électronique</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Envoyer un lien de réinitialisation
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
