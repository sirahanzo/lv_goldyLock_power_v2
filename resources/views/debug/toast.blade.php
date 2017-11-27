<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <!-- morris -->
{{--<link href="{{ asset('/') }}css/morris.css" rel="stylesheet">--}}
<!-- Bootstrap -->
    <link href="{{ asset('/') }}css/bootstrap.min.css" rel="stylesheet">

    <!-- slimscroll -->
    <link href="{{ asset('/') }}css/jquery.slimscroll.css" rel="stylesheet">
    <!-- Fontes -->
    <link href="{{ asset('/') }}css/font-awesome.css" rel="stylesheet">
{{--<link href="{{ asset('/') }}css/simple-line-icons.css" rel="stylesheet">--}}
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
    <link href="{{asset('/')}}css/bootstrap-toastr.min.css" rel="stylesheet">
    <style>
        /** bootstrap-toaster*/
        /*.toast-title{font-weight:bold}.toast-message{-ms-word-wrap:break-word;word-wrap:break-word}.toast-message a,.toast-message label{color:#fff}.toast-message a:hover{color:#ccc;text-decoration:none}.toast-close-button{position:relative;right:-0.3em;top:-0.3em;float:right;font-size:20px;font-weight:bold;color:#fff;-webkit-text-shadow:0 1px 0 #fff;text-shadow:0 1px 0 #fff;opacity:.8;-ms-filter:alpha(opacity=80);filter:alpha(opacity=80)}.toast-close-button:hover,.toast-close-button:focus{color:#000;text-decoration:none;cursor:pointer;opacity:.4;-ms-filter:alpha(opacity=40);filter:alpha(opacity=40)}button.toast-close-button{padding:0;cursor:pointer;background:transparent;border:0;-webkit-appearance:none}.toast-top-center{top:0;right:0;width:100%}.toast-bottom-center{bottom:0;right:0;width:100%}.toast-top-full-width{top:0;right:0;width:100%}.toast-bottom-full-width{bottom:0;right:0;width:100%}.toast-top-left{top:12px;left:12px}.toast-top-right{top:12px;right:12px}.toast-bottom-right{right:12px;bottom:12px}.toast-bottom-left{bottom:12px;left:12px}#toast-container{position:fixed;z-index:999999}#toast-container *{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}#toast-container>div{margin:0 0 6px;padding:15px 15px 15px 50px;width:300px;-moz-border-radius:3px 3px 3px 3px;-webkit-border-radius:3px 3px 3px 3px;border-radius:3px 3px 3px 3px;background-position:15px center;background-repeat:no-repeat;-moz-box-shadow:0 0 12px #999;-webkit-box-shadow:0 0 12px #999;box-shadow:0 0 12px #999;color:#fff;opacity:.8;-ms-filter:alpha(opacity=80);filter:alpha(opacity=80)}#toast-container>:hover{-moz-box-shadow:0 0 12px #000;-webkit-box-shadow:0 0 12px #000;box-shadow:0 0 12px #000;opacity:1;-ms-filter:alpha(opacity=100);filter:alpha(opacity=100);cursor:pointer}#toast-container>.toast-info{background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGwSURBVEhLtZa9SgNBEMc9sUxxRcoUKSzSWIhXpFMhhYWFhaBg4yPYiWCXZxBLERsLRS3EQkEfwCKdjWJAwSKCgoKCcudv4O5YLrt7EzgXhiU3/4+b2ckmwVjJSpKkQ6wAi4gwhT+z3wRBcEz0yjSseUTrcRyfsHsXmD0AmbHOC9Ii8VImnuXBPglHpQ5wwSVM7sNnTG7Za4JwDdCjxyAiH3nyA2mtaTJufiDZ5dCaqlItILh1NHatfN5skvjx9Z38m69CgzuXmZgVrPIGE763Jx9qKsRozWYw6xOHdER+nn2KkO+Bb+UV5CBN6WC6QtBgbRVozrahAbmm6HtUsgtPC19tFdxXZYBOfkbmFJ1VaHA1VAHjd0pp70oTZzvR+EVrx2Ygfdsq6eu55BHYR8hlcki+n+kERUFG8BrA0BwjeAv2M8WLQBtcy+SD6fNsmnB3AlBLrgTtVW1c2QN4bVWLATaIS60J2Du5y1TiJgjSBvFVZgTmwCU+dAZFoPxGEEs8nyHC9Bwe2GvEJv2WXZb0vjdyFT4Cxk3e/kIqlOGoVLwwPevpYHT+00T+hWwXDf4AJAOUqWcDhbwAAAAASUVORK5CYII=") !important}#toast-container>.toast-error{background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHOSURBVEhLrZa/SgNBEMZzh0WKCClSCKaIYOED+AAKeQQLG8HWztLCImBrYadgIdY+gIKNYkBFSwu7CAoqCgkkoGBI/E28PdbLZmeDLgzZzcx83/zZ2SSXC1j9fr+I1Hq93g2yxH4iwM1vkoBWAdxCmpzTxfkN2RcyZNaHFIkSo10+8kgxkXIURV5HGxTmFuc75B2RfQkpxHG8aAgaAFa0tAHqYFfQ7Iwe2yhODk8+J4C7yAoRTWI3w/4klGRgR4lO7Rpn9+gvMyWp+uxFh8+H+ARlgN1nJuJuQAYvNkEnwGFck18Er4q3egEc/oO+mhLdKgRyhdNFiacC0rlOCbhNVz4H9FnAYgDBvU3QIioZlJFLJtsoHYRDfiZoUyIxqCtRpVlANq0EU4dApjrtgezPFad5S19Wgjkc0hNVnuF4HjVA6C7QrSIbylB+oZe3aHgBsqlNqKYH48jXyJKMuAbiyVJ8KzaB3eRc0pg9VwQ4niFryI68qiOi3AbjwdsfnAtk0bCjTLJKr6mrD9g8iq/S/B81hguOMlQTnVyG40wAcjnmgsCNESDrjme7wfftP4P7SP4N3CJZdvzoNyGq2c/HWOXJGsvVg+RA/k2MC/wN6I2YA2Pt8GkAAAAASUVORK5CYII=") !important}#toast-container>.toast-success{background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADsSURBVEhLY2AYBfQMgf///3P8+/evAIgvA/FsIF+BavYDDWMBGroaSMMBiE8VC7AZDrIFaMFnii3AZTjUgsUUWUDA8OdAH6iQbQEhw4HyGsPEcKBXBIC4ARhex4G4BsjmweU1soIFaGg/WtoFZRIZdEvIMhxkCCjXIVsATV6gFGACs4Rsw0EGgIIH3QJYJgHSARQZDrWAB+jawzgs+Q2UO49D7jnRSRGoEFRILcdmEMWGI0cm0JJ2QpYA1RDvcmzJEWhABhD/pqrL0S0CWuABKgnRki9lLseS7g2AlqwHWQSKH4oKLrILpRGhEQCw2LiRUIa4lwAAAABJRU5ErkJggg==") !important}#toast-container>.toast-warning{background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGYSURBVEhL5ZSvTsNQFMbXZGICMYGYmJhAQIJAICYQPAACiSDB8AiICQQJT4CqQEwgJvYASAQCiZiYmJhAIBATCARJy+9rTsldd8sKu1M0+dLb057v6/lbq/2rK0mS/TRNj9cWNAKPYIJII7gIxCcQ51cvqID+GIEX8ASG4B1bK5gIZFeQfoJdEXOfgX4QAQg7kH2A65yQ87lyxb27sggkAzAuFhbbg1K2kgCkB1bVwyIR9m2L7PRPIhDUIXgGtyKw575yz3lTNs6X4JXnjV+LKM/m3MydnTbtOKIjtz6VhCBq4vSm3ncdrD2lk0VgUXSVKjVDJXJzijW1RQdsU7F77He8u68koNZTz8Oz5yGa6J3H3lZ0xYgXBK2QymlWWA+RWnYhskLBv2vmE+hBMCtbA7KX5drWyRT/2JsqZ2IvfB9Y4bWDNMFbJRFmC9E74SoS0CqulwjkC0+5bpcV1CZ8NMej4pjy0U+doDQsGyo1hzVJttIjhQ7GnBtRFN1UarUlH8F3xict+HY07rEzoUGPlWcjRFRr4/gChZgc3ZL2d8oAAAAASUVORK5CYII=") !important}#toast-container.toast-top-center>div,#toast-container.toast-bottom-center>div{width:300px;margin:auto}#toast-container.toast-top-full-width>div,#toast-container.toast-bottom-full-width>div{width:96%;margin:auto}.toast{background-color:#030303}.toast-success{background-color:#51a351}.toast-error{background-color:#bd362f}.toast-info{background-color:#2f96b4}.toast-warning{background-color:#f89406}@media all and (max-width:240px){#toast-container>div{padding:8px 8px 8px 50px;width:11em}#toast-container .toast-close-button{right:-0.2em;top:-0.2em}}@media all and (min-width:241px) and (max-width:480px){#toast-container>div{padding:8px 8px 8px 50px;width:18em}#toast-container .toast-close-button{right:-0.2em;top:-0.2em}}@media all and (min-width:481px) and (max-width:768px){#toast-container>div{padding:15px 15px 15px 50px;width:25em}}*/
    </style>

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
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle "> <i class="fa fa-calendar"></i> <span> {{ date('D , d M Y') }}</span> | <span
                                id="clockDisplay"> {{ date('H:i:s') }} &nbsp;</span>
                    </a>
                </li>


                <!-- START USER LOGIN DROPDOWN -->
                <!-- END USER  DROPDOWN -->
            </ul>
        </div>


        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>

<div class="clearfix"></div>

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
                <li class="nav-item {{ (Request::segment(1) == 'monitoring')?'active':'' }} "><a class="nav-link nav-toggle" href="{{ url('monitoring') }}"> <i
                                class="fa fa-laptop"></i> <span class="title">Monitoring</span> </a>
                </li>
                <li class="nav-item {{ (Request::segment(1) == 'rectifier')?'active':'' }}  "><a class="nav-link nav-toggle" href="{{ url('rectifier') }}"> <i
                                class="fa fa-building"></i> <span class="title">Rectifier</span> </a>
                </li>
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

                <li class="heading">
                    <h3 class="uppercase">Logs </h3>
                </li>
                <li class="nav-item {{ (Request::segment(1) == 'datalog')?'active':'' }}  "><a class="nav-link nav-toggle" href=" {{ url('datalog') }}"> <i
                                class="fa fa-server"></i> <span class="title">Datalog</span> </a>
                </li>
                <li class="nav-item {{ (Request::segment(1) == 'eventlog')?'active':'' }}  "><a class="nav-link nav-toggle" href=" {{ url('eventlog') }}"> <i class="fa fa-paw"></i>
                        <span class="title">Eventlog</span> </a>
                </li>
            </ul>
        </div>

    </div>

    <!-- End page sidebar wrapper -->
    <!-- Start page content wrapper -->
    <div class="page-content-wrapper">

        <div class="page-content">
            @if( Request::segment(1) == 'monitoring')
                @include('gp._menu_list_rectifier')
            @endif

            <div class="wrapper-content ">
                <div class="row">
                    <div class="col-lg-12">
                        @if( Request::segment(1) == 'monitoring')
                            <div class="ibox float-e-margins" style="padding-top: 30px">
                                @else
                                    <div class="ibox float-e-margins">
                                        @endif
                                        <div class="ibox-title">
                                            <h5 class="text-capitalize" id="page">{{ Route::currentRouteName()}} </h5>
                                        </div>
                                        <div id="demo2" class="ibox-content collapse in">
                                            <div class="widgets-container" id="data">
                                                <section>

                                                    <div class="row">
                                                    </div>


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


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ asset('/') }}js/vendor/jquery.min.js"></script>
        {{--<script src="{{ asset('/') }}js/jquery-1.12.3.min.js"></script>--}}
    <!-- bootstrap js -->
        <script src="{{ asset('/') }}js/vendor/bootstrap.min.js"></script>
        <!-- slimscroll js -->
        <script src="{{ asset('/') }}js/vendor/jquery.slimscroll.js"></script>
        <script src="{{ asset('/') }}js/sweetalert2.js"></script>
        <script src="{{ asset('/') }}js/bootstrap-toastr.js"></script>
        <?php
        $today = getdate(); ?>
        <script>

            var page = $('#page').html();

            function initiateJob() {
                if (page == 'monitoring'){
                    console.log('Call Monitoring');
                    console.log('Call Alarm Notification');
                }else{
                    console.log('Call Alarm Notification');
                }

            }

            function ajaxPushAlarmNotification() {

                $.ajax({
                    url: "{{ url('ajax-dummy') }}",
                    dataType: 'html',
                    type: 'get',
                    success: function (data) {
                        $.each(JSON.parse(data), function (index, value) {
                            toastr.error('<a href=" {{ route('eventlog') }} ">' + value.name + '</a>', "", {
                                closeButton: true,
                                positionClass: "toast-bottom-right",
                                preventDuplicates: true,
                                preventOpenDuplicates: true,
                                //timeOut: 5000
                            });
                        });
                    },

                });
            }


            setTimeout(function refreshTable() {
                //console.log('Get Request Ajax Rectifier:');
                setTimeout(refreshTable, 1000);

                //ajax push alarm
//                ajaxPushAlarmNotification();

                initiateJob();


            }, 1000);


            function callingToasts(data) {
                toastr.error(data, "", {
                    closeButton: true,
                    positionClass: "toast-bottom-right",
//                    preventDuplicates: false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true,
//                    timeOut: 5000
                });
            }


            function reloadPage() {
                window.location.reload();

            }

            function show_loading() {
                $('#progress').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
            }

            function hide_loading() {
                $('#progress').modal('hide');
            }


            var d = new Date(Date.UTC(<?php date_default_timezone_set('Asia/Jakarta'); echo $today['year'] . "," . $today['mon'] . "," . $today['mday'] . "," . ($today['hours'] - 7) . "," . $today['minutes'] . "," . $today['seconds']; ?>));
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
        </script>


</body>

</html>
