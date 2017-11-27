<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
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
    <link href="{{ asset('/') }}css/skins/all.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
    <!--[if lt IE 9]>
    <script src="dist/html5shiv.js"></script> <![endif]-->
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="gp-bg login">
<!-- Start page sidebar wrapper -->
<!-- End page sidebar wrapper -->
<!-- Start page content wrapper -->
<div class="middle-box text-cente1 loginscreen " style="padding-top: 150px">
    <div class="wrapper-content ">
        <div class="row">
            <!-- Basic Form start -->
            <div class="col-lg-121">
                <div class="ibox float-e-margins">

                    <div class="widgets-container">
                        <div>
                            {{--<h1 class="logo-name"></h1>--}}
                            <img src="{{ asset('/') }}img/goldpower4.png" alt="Goldpower">
                        </div>
                        {{--@if($errors->any())--}}
                        {{--<div class="alert alert-danger no-borde ">--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                        {{--<strong>Error!</strong>--}}
                        {{--@foreach($errors->all() as $error )--}}
                        {{--<li>{{ $error }}</li>--}}
                        {{--@endforeach--}}
                        {{--</div>--}}
                        {{--@endif--}}
                        {{--<h3>{{ config('app.name') }}</h3>--}}
                        {{--<form action="http://adminbag-v1.2.bittyfox.com/default/dark-blue/index.html"  class="top15">--}}
                        <hr>
                        <form class="form-horizontal1 top25" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Username">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input iCheck" type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                </label>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn green block full-width bottom15">
                                    LOGIN
                                </button>

                                {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">--}}
                                {{--Forgot Your Password?--}}
                                {{--</a>--}}
                            </div>
                            <p class="top15 text-center"> <small>{{ config('app.name') }} &copy;2017</small> </p>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Basic Form End -->
            <!-- Horizontal Form start -->
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('/') }}js/vendor/jquery.min.js"></script>
<!-- bootstrap js -->
<script src="{{ asset('/') }}js/vendor/bootstrap.min.js"></script>
<script src="{{ asset('/') }}js/vendor/icheck.js"></script>
<!-- slimscroll js -->
<script type="text/javascript" src="{{ asset('/') }}js/vendor/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="{{ asset('/') }}js/main.js"></script>
<script>

    $(document).ready(function(){
        var callbacks_list = $('.demo-callbacks ul');
        $('input.iCheck').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){
            callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
        }).iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
            increaseArea: '20%'
        });
    });

</script>
</body>

</html>
