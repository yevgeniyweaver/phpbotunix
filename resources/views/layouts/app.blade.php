<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') AdExchange</title>

    <link rel="shortcut icon" href="{{ asset(config('app.favicon')) }}" />

<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
{{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
</head>

<body class="page-container-bg-solid page-boxed">


<!-- BEGIN HEADER -->
{{--<div class="page-header">--}}

{{--    @if (!in_array(Route::currentRouteName(), []))--}}
{{--        @include('includes.top')--}}
{{--    @endif--}}

{{--    @include('includes.menu')--}}

{{--</div>--}}
<!-- END HEADER -->


@yield('content')
<div id="app"></div>

</body>
</html>
