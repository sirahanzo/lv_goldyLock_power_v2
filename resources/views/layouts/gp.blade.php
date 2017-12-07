<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="{{asset('/')}}img/favicon_gp.png">
    <!-- Bootstrap -->
    <link href="{{ asset('/') }}css/bootstrap.min.css" rel="stylesheet">
    <!-- slimscroll -->
    <link href="{{ asset('/') }}css/jquery.slimscroll.css" rel="stylesheet">
    <!-- Fontes -->
    <link href="{{ asset('/') }}css/font-awesome.css" rel="stylesheet">
    <!-- all buttons css -->
    <link href="{{ asset('/') }}css/buttons.css" rel="stylesheet">
    <!--  main css -->
    <link href="{{ asset('/') }}css/main.css" rel="stylesheet">
    <!-- darkblue theme css -->
    <link href="{{ asset('/') }}css/darkblue.css" rel="stylesheet">
    <!-- media css for responsive  -->
    <link href="{{ asset('/') }}css/main.media.css" rel="stylesheet">
    <!--sweet alert-->
    <link href="{{asset('/')}}css/sweetalert2.css" rel="stylesheet">
    <!-- loading -->
    <link href="{{asset('/')}}css/loading.css" rel="stylesheet">
    <!--bootstrap toastr-->
    <link href="{{asset('/')}}css/bootstrap-toastr.min.css" rel="stylesheet">


    @yield('css')

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
    <!--[if lt IE 9]>
    <script src="dist/html5shiv.js"></script> <![endif]-->

</head>
<body class="page-header-fixed page-sidebar-fixed">
<div class="page-header navbar-fixed-top  navbar">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo"><a href="index.html"> <img class="logo-default" alt="Goldpower" src="{{ asset('/') }}img/logo3.png"> </a></div>
        <div class="library-menu"><span class="one">-</span> <span class="two">-</span> <span class="three">-</span></div>
        <!-- END LOGO -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle "> <i class="fa fa-calendar"></i> <span> {{ date('D , d M Y') }}</span> | <span
                                id="clockDisplay"> {{ date('H:i:s') }} &nbsp;</span> </a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle count-info" id="bell"> <i class="fa fa-bell"></i> <span
                                class="badge badge-danger">{{ $happening_alarm->count() }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts menuBig">
                        @for($i=0;$i<3;$i++)
                            @if(isset($happening_alarm[$i]))
                                <li><a href="#">
                                        <div><i class="fa fa-bell"></i> {{  $happening_alarm[$i]->name }} <span class="pull-right text-muted small"></span></div>
                                    </a>
                                </li>
                            @endif

                            <li class="divider"></li>
                        @endfor
                        <li>
                            <div class="text-center link-block"><a href="{{ route('eventlog') }}"> <strong>See All Alarm</strong> <i class="fa fa-angle-right"></i> </a></div>
                        </li>
                    </ul>
                </li>

                <!-- START USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user"><a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="javascript:"> <img
                                src="{{ asset('/') }}images/teem/user.png" class="img-circle" alt=""> <span class="username username-hide-on-mobile">
                           {{ Auth::user()->name }}
                        </span> <i
                                class="fa fa-angle-down"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li class="divider"></li>
                        <li>
                            {{--<a href="login.html"> <i class="icon-key"></i> Log Out </a>--}}
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="icon-key"></i>Log Out
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </li>
                <!-- END USER  DROPDOWN -->
            </ul>
        </div>


        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>


<div class="page-container">
    <!-- Start page sidebar wrapper -->
    <div class="page-sidebar-wrapper">

        <div class="page-sidebar">
            <ul class="page-sidebar-menu  page-header-fixed ">
                <li class="heading">
                    <h3 class="uppercase">Status</h3>
                </li>
                <li class="nav-item {{ (Request::segment(1) == 'dashboard')?'active':'' }} "><a class="nav-link nav-toggle" href="{{ url('dashboard') }}"> <i
                                class="fa fa-th-large"></i> <span class="title">Dashboard</span> </a>
                </li>
                <li class="nav-item  {{ (Request::segment(1) == 'monitoring')?'active':'' }} "><a class="nav-link nav-toggle" href="{{ url('monitoring') }}"> <i
                                class="fa fa-laptop"></i> <span class="title">Monitoring</span> </a>
                </li>
                <li class="nav-item {{ (Request::segment(1) == 'rectifier')?'active':'' }}  "><a class="nav-link nav-toggle" href="{{ url('rectifier') }}"> <i
                                class="fa fa-building"></i> <span class="title">Rectifier</span> </a>
                </li>

                @if(Auth::user()->level == 'user')

                    <li class="nav-item {{ (Route::currentRouteName()== 'reboot system')?'active':'' }}  "><a class="nav-link nav-toggle" href="{{ route('reboot system') }}"> <i
                                    class="fa fa-power-off"></i> <span class="title">Reboot</span> </a>
                    </li>
                @else
                    <li class="heading">
                        <h3 class="uppercase">Settings</h3>
                    </li>
                    <li class="nav-item {{ (Route::currentRouteName()== 'setting date')?'active':'' }} "><a class="nav-link nav-toggle" href="{{ route('setting date') }}"> <i
                                    class="fa fa-calendar"></i> <span class="title">Date/Time</span> </a>
                    </li>
                    <li class="nav-item {{ (Route::currentRouteName()== 'site info')?'active':'' }} "><a class="nav-link nav-toggle" href="{{ url('site-info') }}"> <i
                                    class="fa fa-globe"></i> <span class="title">Site Information</span> </a>
                    </li>
                    <li class="nav-item {{ (Route::currentRouteName()== 'setting network')?'active':'' }} "><a class="nav-link nav-toggle" href="{{ route('setting network') }}"> <i
                                    class="fa fa-laptop"></i> <span class="title">Network</span> </a>
                    </li>
                    <li class="nav-item {{ (Route::currentRouteName()== 'setting controll')?'active':'' }}  "><a class="nav-link nav-toggle" href="{{ route('setting controll') }}"> <i
                                    class="fa fa-sliders"></i> <span class="title">Controll</span> </a>
                    </li>
                    <li class="nav-item {{ (Route::currentRouteName()== 'setting alarm')?'active':'' }}  "><a class="nav-link nav-toggle" href="{{ route('setting alarm') }}"> <i
                                    class="fa fa-bell"></i> <span class="title">Alarm</span> </a>
                    </li>
                    <li class="nav-item {{ (Route::currentRouteName()== 'user administration')?'active':'' }}  "><a class="nav-link nav-toggle" href="{{ route('user administration') }}"> <i
                                    class="fa fa-user"></i> <span class="title">Administration</span> </a>
                    </li>

                    <li class="nav-item {{ (Route::currentRouteName()== 'reboot system')?'active':'' }}  "><a class="nav-link nav-toggle" href="{{ route('reboot system') }}"> <i
                                    class="fa fa-power-off"></i> <span class="title">Reboot</span> </a>
                    </li>

                @endif

                <li class="heading">
                    <h3 class="uppercase">Logs </h3>
                </li>
                <li class="nav-item {{ (Request::segment(1) == 'datalog')?'active':'' }}  "><a class="nav-link nav-toggle" href=" {{ url('datalog') }}"> <i
                                class="fa fa-server"></i> <span class="title">Datalog</span> </a>
                </li>
                <li class="nav-item {{ (Request::segment(1) == 'eventlog')?'active':'' }}  "><a class="nav-link nav-toggle" href=" {{ url('eventlog') }}"> <i class="fa fa-paw"></i>
                        <span class="title">Eventlog</span> </a>
                </li>
                <li class="heading">
                </li>
            </ul>
        </div>

    </div>
    <!-- End page sidebar wrapper -->

    <!-- Start page content wrapper -->
    <div class="page-content-wrapper">

        <div class="page-content">
            {{--@if( Request::segment(1) == 'monitoring')--}}
            {{--@include('gp._menu_list_rectifier')--}}
            {{--@endif--}}

            <div class="wrapper-content ">
                <div class="row">
                    <div class="col-lg-12">
                        @if( Request::segment(1) == 'monitoring1')
                            <div class="ibox float-e-margins" style="padding-top: 30px">
                                @else
                                    <div class="ibox float-e-margins">
                                        @endif
                                        <div class="ibox-title">
                                            {{--<h5 class="text-capitalize">{{ Route::currentRouteName()}} <span id="rect"></span> </h5>--}}
                                            <h5 class="text-capitalize" id="page">{{ Route::currentRouteName()}}</h5>
                                        </div>
                                        <div id="demo2" class="ibox-content collapse in">
                                            <div class="widgets-container" id="data">
                                                <section>
                                                    @yield('content')
                                                </section>
                                            </div>
                                        </div>
                                    </div>

                            </div>

                    </div>

                    <!-- start footer -->

                </div>
            </div>
        </div>
        <!-- Go top -->
        <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
        <!-- Go top -->

        {{--loading--}}

        <div class="modal fade modal-m" tabindex="-1" role="dialog" id="progress">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div id="loading-wrapper" class="" style="margin-top: 50%">
                        <div id="loading-text" class="text-uppercase">SAVING</div>
                        <div id="loading-content"></div>
                    </div>
                </div>
            </div>
        </div>

        {{--loading--}}

    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('/') }}js/vendor/jquery.min.js"></script>
{{--<script src="{{ asset('/') }}js/jquery-1.12.3.min.js"></script>--}}
<!-- bootstrap js -->
<script src="{{ asset('/') }}js/vendor/bootstrap.min.js"></script>
<!-- slimscroll js -->
<script src="{{ asset('/') }}js/vendor/jquery.slimscroll.js"></script>
<!-- sweet alert js -->
<script src="{{ asset('/') }}js/sweetalert2.js"></script>
<!-- boostrap toastr -->
<script src="{{ asset('/') }}js/bootstrap-toastr.js"></script>
<!-- main js -->
<script src="{{ asset('/') }}js/main.js"></script>


@yield('js')

<script>

    var d = new Date(Date.UTC(<?php  echo $today['year'] . "," . $today['mon'] . "," . $today['mday'] . "," . ($today['hours'] - 7) . "," . $today['minutes'] . "," . $today['seconds']; ?>));
    setInterval(function () {
        d.setSeconds(d.getSeconds() + 1);
        var h = d.getHours();
        var i = d.getMinutes();
        var s = d.getSeconds();
        if (h == 0) {
            h = 00;
        }
        if (h < 10) {
            h = "0" + h;
        }
        if (i < 10) {
            i = "0" + i;
        }
        if (s < 10) {
            s = "0" + s;
        }

        $('#clockDisplay').text((h + ':' + i + ':' + s ));

    }, 1000);

    function ajaxPushAlarmNotification() {
        //console.log('ajax Push Alarm Notification ');
        $.ajax({
            url: "{{ url('push-alarm') }}",
            dataType: 'html',
            type: 'get',
            success: function (data) {
                $.each(JSON.parse(data), function (index, value) {
                    toastr.error('<a href=" {{ route('eventlog') }} ">' + value.name + '</a>', "", {
                        closeButton: true,
                        positionClass: "toast-bottom-right",
                        preventDuplicates: true,
                        preventOpenDuplicates: true,
                        timeOut: 5000
                    });
                });
            }
        });
    }

    function ajaxSumOfAlarm() {
        //console.log('ajax dashboard');

        $.ajax({
            url: "{{ route('push bell') }}",
            dataType: 'html',

            success: function (data) {
                $('#bell').find('span').empty().append(data);
                //setTimeout(refreshTable, 1000);
            }
        });
    }

    function ajaxDashboard() {
        //console.log('ajax dashboard');

        $.ajax({
            url: "{{ route('ajax dashboard') }}",
            dataType: 'html',

            success: function (data) {
                $('#dashboard').find('div').empty().append(data);
            }
        });
    }

    function ajaxMonitoring() {
        //console.log('ajax monitoring');

        $.ajax({
            url: "{{ url('show-monitoring') }}",
            dataType: 'html',

            success: function (data) {
                $('#data').find('div').empty().append(data);
            }
        });
    }

    function ajaxRectifier() {
        //console.log('ajax rectifier');

        $.ajax({
            url: "{{ route('ajax rectifier') }}",
            dataType: 'html',

            success: function (data) {
                $('#data').find('section').empty().append(data);
            }
        });
    }

    var page = $('#page').html();

    function initiateJob() {
        switch (page) {
            case 'dashboard':
                ajaxDashboard();
                break;
            case 'monitoring':
                ajaxMonitoring();
                break;
            case 'rectifier':
                ajaxRectifier();
                break
        }

        ajaxPushAlarmNotification();
        ajaxSumOfAlarm();

    }


    window.onload = function () {
        setTimeout(function refreshTable() {
            setTimeout(refreshTable, 1000);

            initiateJob();

        }, 1000);
    }


</script>

</body>

</html>
