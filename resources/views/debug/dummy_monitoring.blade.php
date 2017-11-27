<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="Yy9V4vY9THMW7e43fvmQTcV6ceanaeJLeo4SV3mV">

    <title>Goldpower</title>
    <!-- morris -->
    <link href="http://goldpower-v2.dev/css/morris.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="http://goldpower-v2.dev/css/bootstrap.min.css" rel="stylesheet">
    <!-- slimscroll -->
    <link href="http://goldpower-v2.dev/css/jquery.slimscroll.css" rel="stylesheet">
    <!-- Fontes -->
    <link href="http://goldpower-v2.dev/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://goldpower-v2.dev/css/simple-line-icons.css" rel="stylesheet">
    <!-- all buttons css -->
    <link href="http://goldpower-v2.dev/css/buttons.css" rel="stylesheet">
    <!-- adminbag main css -->
    <link href="http://goldpower-v2.dev/css/main.css" rel="stylesheet">
    <!-- darkblue theme css -->
    <link href="http://goldpower-v2.dev/css/darkblue.css" rel="stylesheet">
    <!-- media css for responsive  -->
    <link href="http://goldpower-v2.dev/css/main.media.css" rel="stylesheet">

    <link href="http://goldpower-v2.dev/css/sweetalert2.css" rel="stylesheet">

    <link href="http://goldpower-v2.dev/css/loading.css" rel="stylesheet">


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
        <div class="page-logo"><a href="index.html"> <img class="logo-default" alt="Goldpower" src="http://goldpower-v2.dev/img/logo3.png"> </a></div>
        <div class="library-menu"><span class="one">-</span> <span class="two">-</span> <span class="three">-</span></div>
        <!-- END LOGO -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle "> <i class="fa fa-calendar"></i> <span> Thu , 19 Oct 2017</span> | <span
                                id="clockDisplay"> 14:34:32 &nbsp;</span> </a>
                </li>

                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle count-info"> <i class="fa fa-bell"></i> <span class="badge badge-danger">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts menuBig">
                        <li><a href="mailbox.html">
                                <div><i class="fa fa-envelope fa-fw"></i> You have 16 messages <span class="pull-right text-muted small">4 minutes ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="profile.html">
                                <div><i class="fa fa-twitter fa-fw"></i> 3 New Followers <span class="pull-right text-muted small">12 minutes ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="grid_options.html">
                                <div><i class="fa fa-upload fa-fw"></i> Server Rebooted <span class="pull-right text-muted small">4 minutes ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block"><a href="mailbox.html"> <strong>See All Alerts</strong> <i class="fa fa-angle-right"></i> </a></div>
                        </li>
                    </ul>
                </li>

                <!-- START USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user"><a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="javascript:;"> <img
                                src="http://goldpower-v2.dev/images/teem/a10.jpg" class="img-circle" alt=""> <span class="username username-hide-on-mobile"> Admin</span> <i
                                class="fa fa-angle-down"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <br>
                        <li class="divider"></li>
                        <li><a href="login.html"> <i class="icon-key"></i> Log Out </a></li>

                    </ul>
                </li>
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
                <li class="nav-item  "><a class="nav-link nav-toggle" href="http://goldpower-v2.dev/dashboard"> <i
                                class="fa fa-th-large"></i> <span class="title">Dashboard</span> </a>
                </li>
                <li class="nav-item active "><a class="nav-link nav-toggle" href="http://goldpower-v2.dev/monitoring"> <i
                                class="fa fa-laptop"></i> <span class="title">Monitoring</span> </a>
                </li>
                <li class="nav-item   "><a class="nav-link nav-toggle" href="http://goldpower-v2.dev/rectifier"> <i
                                class="fa fa-building"></i> <span class="title">Rectifier</span> </a>
                </li>
                <li class="heading">
                    <h3 class="uppercase">Settings</h3>
                </li>
                <li class="nav-item  "><a class="nav-link nav-toggle" href="http://goldpower-v2.dev/setting-date"> <i
                                class="fa fa-calendar"></i> <span class="title">Date/Time</span> </a>
                </li>
                <li class="nav-item  "><a class="nav-link nav-toggle" href="http://goldpower-v2.dev/setting-network"> <i
                                class="fa fa-laptop"></i> <span class="title">Network</span> </a>
                </li>
                <li class="nav-item   "><a class="nav-link nav-toggle" href="http://goldpower-v2.dev/setting-controll"> <i
                                class="fa fa-sliders"></i> <span class="title">Controll</span> </a>
                </li>
                <li class="nav-item   "><a class="nav-link nav-toggle" href="http://goldpower-v2.dev/setting-alarm"> <i
                                class="fa fa-bell"></i> <span class="title">Alarm</span> </a>
                </li>
                <li class="nav-item   "><a class="nav-link nav-toggle" href="http://goldpower-v2.dev/user-administration"> <i
                                class="fa fa-user"></i> <span class="title">Administration</span> </a>
                </li>
                <li class="heading">
                    <h3 class="uppercase">Logs</h3>
                </li>
                <li class="nav-item   "><a class="nav-link nav-toggle" href=" http://goldpower-v2.dev/datalog"> <i
                                class="fa fa-server"></i> <span class="title">Datalog</span> </a>
                </li>
                <li class="nav-item   "><a class="nav-link nav-toggle" href=" http://goldpower-v2.dev/eventlog"> <i class="fa fa-paw"></i>
                        <span class="title">Eventlog</span> </a>
                </li>
            </ul>
        </div>

    </div>

    <!-- End page sidebar wrapper -->
    <!-- Start page content wrapper -->
    <div class="page-content-wrapper">

        <div class="page-content">
            <div class="row navbar-static-top" style="overflow: auto;position: fixed;background-color: #fff;">
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-sm btn-default" disabled>Rectifier</a>

                    <a href="#" class="rect btn btn-sm blue active" id="rect1" onclick="get_rect(1)">1</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect2" onclick="get_rect(2)">2</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect3" onclick="get_rect(3)">3</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect4" onclick="get_rect(4)">4</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect5" onclick="get_rect(5)">5</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect6" onclick="get_rect(6)">6</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect7" onclick="get_rect(7)">7</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect8" onclick="get_rect(8)">8</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect9" onclick="get_rect(9)">9</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect10" onclick="get_rect(10)">10</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect11" onclick="get_rect(11)">11</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect12" onclick="get_rect(12)">12</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect13" onclick="get_rect(13)">13</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect14" onclick="get_rect(14)">14</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect15" onclick="get_rect(15)">15</a>
                    <a href="#" class="rect btn btn-sm blue " id="rect16" onclick="get_rect(16)">16</a>
                    <input type="hidden" id="rectifier_id">
                </div>

            </div>


            <div class="wrapper-content ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins" style="padding-top: 30px">
                            <div class="ibox-title">
                                <h5 class="text-capitalize">monitoring </h5>
                            </div>
                            <div id="demo2" class="ibox-content collapse in">
                                <div class="widgets-container" id="data">
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="col-md-4">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading"> Rectifier Module 1</div>
                                                        <div class="panel-body1">
                                                            <table class="table table-hover table-condensed">
                                                                <tbody>

                                                                <tr>
                                                                    <td>Volt</td>
                                                                    <td class="text-right">0 V</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Curr.</td>
                                                                    <td class="text-right">0 A</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Temp.</td>
                                                                    <td class="text-right">0 &deg;C</td>
                                                                </tr>


                                                                </tbody>
                                                            </table>


                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading"> Rectifier Module 1</div>
                                                        <div class="panel-body1">
                                                            <table class="table table-hover table-condensed">
                                                                <tbody>

                                                                <tr>
                                                                    <td>Volt</td>
                                                                    <td class="text-right">0 V</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Curr.</td>
                                                                    <td class="text-right">0 A</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Temp.</td>
                                                                    <td class="text-right">0 &deg;C</td>
                                                                </tr>


                                                                </tbody>
                                                            </table>


                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading"> Rectifier Module 1</div>
                                                        <div class="panel-body1">
                                                            <table class="table table-hover table-condensed">
                                                                <tbody>

                                                                <tr>
                                                                    <td>Volt</td>
                                                                    <td class="text-right">0 V</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Curr.</td>
                                                                    <td class="text-right">0 A</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Temp.</td>
                                                                    <td class="text-right">0 &deg;C</td>
                                                                </tr>


                                                                </tbody>
                                                            </table>


                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading"> Rectifier System</div>
                                                        <div class="panel-body1">
                                                            <table class="table table-hover table-condensed table-bordered1">
                                                                <tbody>
                                                                <tr>
                                                                    <td>Bus voltage</td>
                                                                    <td class="text-right"> 0 V</td>
                                                                    <td>Ambient temperature</td>
                                                                    <td class="text-right"> 0 &deg;C</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Battery current</td>
                                                                    <td class="text-right"> 0 A</td>
                                                                    <td>Ambient temperature</td>
                                                                    <td class="text-right"> 0 &deg;C</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Load current</td>
                                                                    <td class="text-right"> 0 A</td>
                                                                    <td>Ambient temperature</td>
                                                                    <td class="text-right"> 0 &deg;C</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Battery temperature</td>
                                                                    <td class="text-right"> 0 &deg;C</td>
                                                                    <td>Ambient temperature</td>
                                                                    <td class="text-right"> 0 &deg;C</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Ambient temperature</td>
                                                                    <td class="text-right"> 0 &deg;C</td>
                                                                    <td>Ambient temperature</td>
                                                                    <td class="text-right"> 0 &deg;C</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Ambient humidity</td>
                                                                    <td class="text-right"> 0 %</td>
                                                                    <td>Ambient temperature</td>
                                                                    <td class="text-right"> 0 &deg;C</td>
                                                                </tr>

                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading"> Relay Status</div>
                                                        <div class="panel-body1">
                                                            <table class="table table-hover table-condensed">
                                                                <tbody>
                                                                <tr>
                                                                    <td>Rly 1</td>
                                                                    <td>
                                                                        Conct
                                                                    </td>
                                                                    <td>Rly 4</td>
                                                                    <td>
                                                                        Conct
                                                                    </td>
                                                                    <td>Rly 1</td>
                                                                    <td>
                                                                        Conct
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Rly 2</td>
                                                                    <td>
                                                                        Conct
                                                                    </td>
                                                                    <td>Rly 5</td>
                                                                    <td>
                                                                        Conct
                                                                    </td>
                                                                    <td>Rly 1</td>
                                                                    <td>
                                                                        Conct
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Rly 3</td>
                                                                    <td>
                                                                        Conct
                                                                    </td>
                                                                    <td>Rly 1</td>
                                                                    <td>
                                                                        Conct
                                                                    </td>
                                                                    <td>Rly 1</td>
                                                                    <td>
                                                                        Conct
                                                                    </td>
                                                                </tr>

                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-lg-6">
                                                <div class="panel panel-danger ">
                                                    <div class="panel-heading"> Rectifier Alarm</div>
                                                    <div class="panel-body1">
                                                        <table class="table table-hover table-condensed">
                                                            <tbody>
                                                            <tr class="">
                                                                <td>RM Connect</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>RM Connect</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>RM Connect</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>Comm. Lost</td>
                                                                <td>
                                                                    <b class="text-danger">Alarm</b>
                                                                </td>
                                                                <td>Protection</td>
                                                                <td>
                                                                    <b class="text-danger">Alarm</b>
                                                                </td>
                                                                <td>RM Connect</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>Protection</td>
                                                                <td>
                                                                    <b class="text-danger">Alarm</b>
                                                                </td>
                                                                <td>Rect. Hi-Temp.</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>RM Connect</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>


                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading"> Alarm</div>
                                                    <div class="panel-body1">
                                                        <table class="table table-hover table-condensed">
                                                            <tbody>
                                                            <tr class="">
                                                                <td>Mains Fail</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>Equalizing Charge</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>

                                                            </tr>
                                                            <tr class="">
                                                                <td>High Load DC Voltage</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>Equalizing Charge</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>High Float DC Voltage</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>Equalizing Charge</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>Low Float DC Voltage</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>Equalizing Charge</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>Low Load DC Voltage</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>Equalizing Charge</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>System Load Current High</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>Equalizing Charge</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>Ambient Temperature High</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>Equalizing Charge</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>Battery Temp High</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>Equalizing Charge</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>Load Fuse</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>Equalizing Charge</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>Battery Fuse</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>Equalizing Charge</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>Equalizing Charge</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                                <td>Equalizing Charge</td>
                                                                <td>
                                                                    <b class="text-success">Nrml</b>
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>

                                            </div>


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


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://goldpower-v2.dev/js/vendor/jquery.min.js"></script>
    <!-- bootstrap js -->
    <script src="http://goldpower-v2.dev/js/vendor/bootstrap.min.js"></script>
    <!-- slimscroll js -->
    <script src="http://goldpower-v2.dev/js/vendor/jquery.slimscroll.js"></script>
    <script src="http://goldpower-v2.dev/js/sweetalert2.js"></script>
    <!-- main js -->
    <script src="http://goldpower-v2.dev/js/main.js"></script>

    <script>
        //init

    </script>

    <script>
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


        var d = new Date(Date.UTC(2017, 10, 19, 7, 34, 32));
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
