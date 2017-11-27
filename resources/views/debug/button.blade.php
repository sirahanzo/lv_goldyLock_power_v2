<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-Bag</title>
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
    <link href="{{asset('/')}}css/loading.css" rel="stylesheet">

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
        <div class="page-logo"><a href="index.html"> <img class="logo-default" alt="Goldpower" src="{{ asset('/') }}images/logo.png1"> </a></div>
        <div class="library-menu"><span class="one">-</span> <span class="two">-</span> <span class="three">-</span></div>
        <!-- END LOGO -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle "> <i class="fa fa-calendar"></i> <span class=""> Wed,20-11-2017 | 00:00:00</span> </a>
                </li>

                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle count-info"> <i class="fa fa-bell"></i> <span class="badge badge-danger">8</span> </a>
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
                                src="{{ asset('/') }}images/teem/a10.jpg" class="img-circle" alt=""> <span class="username username-hide-on-mobile"> Admin</span> <i class="fa fa-angle-down"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        {{--<li> <a href="profile.html"> <i class="icon-user"></i> My Profile </a> </li>--}}
                        {{--<li> <a href="calendar.html"> <i class="icon-calendar"></i> My Calendar </a> </li>--}}
                        {{--<li> <a href="mailbox.html"> <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger"> 3 </span> </a> </li>--}}
                        {{--<li> <a href="dashboard2.html"> <i class="icon-rocket"></i> My Tasks <span class="badge badge-success"> 7 </span> </a> </li>--}}
                        {{--<li class="divider"> </li>--}}
                        {{--<li> <a href="lockscreen.html"> <i class="icon-lock"></i> Lock Screen </a> </li>--}}
                        <br>
                        <li class="divider"></li>
                        <li><a href="login.html"> <i class="icon-key"></i> Log Out </a></li>

                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
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
                <li class="nav-item active"><a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-th-large"></i> <span class="title">Dashboard</span> </a>
                </li>
                <li class="nav-item  "><a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-th-large"></i> <span class="title">Monitoring</span> </a>
                </li>
                <li class="nav-item  "><a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-building"></i> <span class="title">Rectifier</span> </a>
                </li>
                <li class="heading">
                    <h3 class="uppercase">Settings</h3>
                </li>
                <li class="nav-item "><a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-calendar"></i> <span class="title">Date/Time</span> </a>
                </li>
                <li class="nav-item  "><a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-laptop"></i> <span class="title">Network</span> </a>
                </li>
                <li class="nav-item  "><a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-sliders"></i> <span class="title">Controll</span> </a>
                </li>
                <li class="nav-item  "><a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-bell"></i> <span class="title">Alarm</span> </a>
                </li>
                <li class="nav-item  "><a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-user"></i> <span class="title">Administration</span> </a>
                </li>
                <li class="heading">
                    <h3 class="uppercase">Logs</h3>
                </li>
                <li class="nav-item  "><a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-th-large"></i> <span class="title">Datalog</span> </a>
                </li>
                <li class="nav-item  "><a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-th-large"></i> <span class="title">Eventlog</span> </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End page sidebar wrapper -->
    <!-- Start page content wrapper -->
    <div class="page-content-wrapper">

        <div class="page-content">
            <div class="row ">
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-sm btn-default" disabled>Rectifier</a>
                    <a href="#" class="btn btn-sm btn-info">1</a>
                    <a href="#" class="btn btn-sm btn-primary">3</a>
                    <a href="#" class="btn btn-sm btn-info">4</a>
                    <a href="#" class="btn btn-sm btn-info">5</a>
                    <a href="#" class="btn btn-sm btn-info">6</a>
                    {{--<a href="#" class="btn btn-info">7</a>--}}
                    {{--<a href="#" class="btn btn-info">8</a>--}}
                    {{--<a href="#" class="btn btn-info">9</a>--}}
                    {{--<a href="#" class="btn btn-info">10</a>--}}
                    {{--<a href="#" class="btn btn-info">11</a>--}}
                    {{--<a href="#" class="btn btn-info">12</a>--}}
                    {{--<a href="#" class="btn btn-info">13</a>--}}
                    {{--<a href="#" class="btn btn-info">14</a>--}}
                    {{--<a href="#" class="btn btn-info">15</a>--}}
                    {{--<a href="#" class="btn btn-info">16</a>--}}
                </div>

            </div>

            <div class="wrapper-content ">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5> Bordered Table </h5>
                                <div class="ibox-tools">
                                    <a data-target="#demo2" data-toggle="collapse" class="collapse-link"> <i class="fa fa-chevron-up"></i> <i class="fa fa-chevron-down"></i> </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-wrench"></i> </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a></li>
                                        <li><a href="#">Config option 2</a></li>
                                    </ul>
                                    <a class="close-link"> <i class="fa fa-times"></i> </a>
                                </div>
                            </div>
                            <div id="demo2" class="ibox-content collapse in">
                                <div class="borderedTable">
                                    <div class="table-scrollable">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th> #</th>
                                                <th> First Name</th>
                                                <th> Last Name</th>
                                                <th> Username</th>
                                                <th> Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td rowspan="2"> 1</td>
                                                <td> Mark</td>
                                                <td> Otto</td>
                                                <td> makr124</td>
                                                <td><span class="label label-sm label-success"> Approved </span></td>
                                            </tr>
                                            <tr>
                                                <td> Jacob</td>
                                                <td> Nilson</td>
                                                <td> jac123</td>
                                                <td><span class="label label-sm label-info"> Pending </span></td>
                                            </tr>
                                            <tr>
                                                <td> 2</td>
                                                <td> Larry</td>
                                                <td> Cooper</td>
                                                <td> lar</td>
                                                <td><span class="label label-sm label-warning"> Suspended </span></td>
                                            </tr>
                                            <tr>
                                                <td> 3</td>
                                                <td> Sandy</td>
                                                <td> Lim</td>
                                                <td> sanlim</td>
                                                <td><span class="label label-sm label-danger"> Blocked </span></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <button type="button" class="btn btn-info 120" id="store"> Submit</button>

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-m">Modal</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- start footer -->
            <div class="footer">
                <div class="pull-right">
                    <ul class="list-inline">
                        <li><a title="" href="index.html">Dashboard</a></li>
                        <li><a title="" href="mailbox.html"> Inbox </a></li>
                        <li><a title="" href="blog.html">Blog</a></li>
                        <li><a title="" href="contacts.html">Contacts</a></li>
                    </ul>
                </div>
                <div><strong>Copyright</strong> AdminBag Company &copy; 2017</div>
            </div>
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
                <div id="loading-text">SAVING</div>
                <div id="loading-content"></div>
            </div>
        </div>
    </div>
</div>

{{--loading--}}

{{--<link rel="stylesheet" href="{{ asset('/') }}css/loading.css">--}}
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('/') }}js/vendor/jquery.min.js"></script>
<!-- bootstrap js -->
<script src="{{ asset('/') }}js/vendor/bootstrap.min.js"></script>
<!-- slimscroll js -->
<script type="text/javascript" src="{{ asset('/') }}js/vendor/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="{{ asset('/') }}js/main.js"></script>
<script>
    $('#store').click(function (e) {
        console.log('strore+show loading save');
//        $('#loading-wrapper').removeClass('hide');
//        $(this).addClass('show');
        $('#loading-text').html('SAVING');
        show_loading();

    });


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

</script>
</body>

<!-- Documented from adminbag-v1.2.bittyfox.com/default/dark-blue/ui_buttons.html by Hanzo, Tue, 10 Oct 2017 11:33:53 GMT -->
</html>
