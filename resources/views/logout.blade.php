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
				
				<p class="ibm-h3 ibm-light ibm-textcolor-red-60">Logged off</p>
				<h3 class="ibm-h3">You are now signed off.</h3>
				<p>To sign in again, click the link below</p>
				<p class="ibm-ind-link"><a class="ibm-forward-link" href="{{ route('auth.login') }}">Sign in</a></p>
			
			</div>
		</div>
	</div>	
</div>