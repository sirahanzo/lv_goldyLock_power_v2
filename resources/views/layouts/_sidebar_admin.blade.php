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