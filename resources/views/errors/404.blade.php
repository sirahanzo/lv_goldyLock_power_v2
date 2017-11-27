<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <!-- morris -->
    <link href="{{ asset('/') }}css/morris.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('/') }}css/bootstrap.min.css" rel="stylesheet">
    <!-- slimscroll -->
    <link href="{{ asset('/') }}css/jquery.slimscroll.css" rel="stylesheet">
    <!-- Fontes -->
    <link href="{{ asset('/') }}css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}css/simple-line-icons.css" rel="stylesheet">
    <!-- all buttons css -->
    <link href="{{ asset('/') }}css/buttons.css" rel="stylesheet">
    <!-- adminbag main css -->
    <link href="{{ asset('/') }}css/main.css" rel="stylesheet">
    <!-- darkblue theme css -->
    <link href="{{ asset('/') }}css/darkblue.css" rel="stylesheet">
    <!-- media css for responsive  -->
    <link href="{{ asset('/') }}css/main.media.css" rel="stylesheet">

    <link href="{{asset('/')}}css/sweetalert2.css" rel="stylesheet">

    <link href="{{asset('/')}}css/loading.css" rel="stylesheet">

    @yield('css')

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
    <!--[if lt IE 9]>
    <script src="dist/html5shiv.js"></script> <![endif]-->

</head>
<body class="gray-bg ">
<div class="middle-box text-center  error-wrapper">
    <h1 class="head">404</h1>
    <h3 class="font-bold">Page Not Found</h3>
    <div class="error-desc"> Sorry, but the page you are looking for has note been found. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our app.
        <form  class="top15">
            <a href="{{ route('dashboard') }}" class="btn green bottom0 btn120" type="submit">BACK</a>
        </form>

    </div>
</div>
<!-- /error-wrapper -->
<div class="error-page-footer">
    <div class="error-container">
        <br>
        <br>
        <div class="copyright"> All work <strong>Copyright</strong> P.T Sinergi Teknologi Utama © 2017 </div>
    </div>
</div>
<!-- /error-page-footer -->
</body>

</html>
