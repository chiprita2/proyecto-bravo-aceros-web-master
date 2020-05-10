<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if($seo ?? '')
        <title>{{ $seo['title'] ?? '' }} - {{ config('app.name', 'Laravel') }}</title>
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endif
    <meta name="description" content="construction html5 template">
    <meta name="keywords" content="keywords">

    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CRaleway:100,200,300,400,500,600,700,800%7CDroid+Serif:400,400italic,700,700italic' type='text/css'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/images/favicon/favicon.ico" rel="icon">
    <!--[if lt IE 9]>
          <script src="/assets/js/html5shiv.js"></script>
          <script src="/assets/js/respond.min.js"></script>
        <![endif]-->
  </head>
<body>
  @yield('content')
  <!-- Footer Scripts ============================================= -->
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('scripts')
</body>
</html>