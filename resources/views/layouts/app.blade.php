<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <script src="https://use.fontawesome.com/cd636b65bd.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  <script>
    // window.title = '{{ config('app.name', 'Laravel') }}'
    // Vue.prototype.$appName = 'My App from LARAVEL'
  </script>
  
    <noscript>
      <strong>
		    We're sorry but OAT Tool doesn't work properly without JavaScript enabled. Please enable it to continue.
	    </strong>
    </noscript>
    <div id="app">
      <App
        app-name="{{ config('app.name', 'Laravel') }}"
      ></App>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
