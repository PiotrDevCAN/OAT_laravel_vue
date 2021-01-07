<!DOCTYPE html>
<html lang="en-US">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
<link rel="canonical" href="{{ route('home') }}" />

<meta name="geo.country" value="GB" />
<meta name="dcterms.rights" value="" />
<meta name="dcterms.date" value="2015-12-04" />
<meta name="description" value="" />
<meta name="keywords" value="OAT_laraver" />
<meta name="robots" value="index, follow" />

<title>{{ config('app.name') }}</title>

<link href="https://1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
<link href="https://1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
<link href="https://1.www.s81c.com/common/v18/css/grid-fluid.css" rel="stylesheet">

<style type="text/css">
html, body {
	background: url({{ secure_asset('public/img/logon/think_travel_hero.png') }}) no-repeat
		center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
</style>
</head>
<body>

<div class="ibm-fluid ibm-padding-top-90 ibm-padding-bottom-90" data-always="true" data-items=".ibm-card">
	<div class="ibm-col-12-6">
		<div class="ibm-card">
			<div class="ibm-card__content">
				<p class="ibm-h3 ibm-light ibm-textcolor-blue-60 ibm-padding-bottom-0">{{ config('app.name') }}</p>
			</div>
		</div>
	</div>
	
	<div class="ibm-col-12-9"></div>
	
	<div class="ibm-col-12-6">
		<div class="ibm-card">
			<div class="ibm-card__content">

				<p class="ibm-h3 ibm-light ibm-textcolor-red-60">Sign In</p>
				{{ Form::open(['route' => 'auth.post.authenticate', 'method' => 'post', 'id' => 'signinForm', 'class'  => 'ibm-column-form' ]) }}
				
				<!-- if there are login errors, show them here -->
                <p>
                    {{ $errors->first('email') }}
                    {{ $errors->first('password') }}
                </p>
				
				<p>
					{{ Form::label('email', 'User Name*', ['class' => 'ibm-required']) }}
			 		{{ Form::text('email', old('email'), ['placeholder' => 'Email']) }}
				</p>
				
				<p>
                    {{ Form::label('password', 'Password*', ['class' => 'ibm-required']) }}
                    {{ Form::password('password', ['placeholder' => 'Password']) }}
                </p>
				
				<p>
					{{ Form::label('remember', 'Remember me') }}
					{{ Form::checkbox('remember', true, old('remember')) }}
				</p>
				
				<p>
					{{ Form::submit('OK', ['class' => 'ibm-btn-pri ibm-btn-small ibm-btn-green-50', 'name' => 'submitForm']) }}
					{{ Form::button('Cancel', ['class' => 'ibm-btn-sec ibm-btn-small ibm-btn-green-50', 'name' => 'cancel', 'onclick' => ""]) }}
				</p>
				
				@if($targetPageTitle)
					<p>You will be redirected to: <a href="{{ $targetPageTitle }}">page</a></p>
				@endif
				
				{{ Form::close() }}

			</div>
		</div>
	</div>
</div>