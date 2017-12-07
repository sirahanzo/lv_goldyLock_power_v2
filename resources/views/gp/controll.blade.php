@extends('layouts.gp')

@section('css')
    <style>
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
        .nav-tabs > li > a { border: none; color: #666; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #5bc0de !important; background: transparent; }
        .nav-tabs > li > a::after { content: ""; background: #5bc0de; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
        .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
        .tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
    </style>
@endsection

@section('content')
    <div class="tabs-container ">
        <ul class="nav nav-tabs  text-uppercase">
            <li class="active"><a href="#tab-1" data-toggle="tab" aria-expanded="true"> AC</a></li>
            <li class=""><a href="#tab-2" data-toggle="tab" aria-expanded="true"> Rectifier Module</a></li>
            <li class=""><a href="#tab-3" data-toggle="tab" aria-expanded="false">DC-1 </a></li>
            <li class=""><a href="#tab-4" data-toggle="tab" aria-expanded="false">DC-2 </a></li>
            <li class=""><a href="#tab-5" data-toggle="tab" aria-expanded="false">Relays </a></li>
            <li class=""><a href="#tab-6" data-toggle="tab" aria-expanded="false">Other </a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active  " id="tab-1">
                <div class="panel-body">
                    {{--<strong>AC</strong>--}}

                    <div class="col-lg-8">

                        <table class="table table-bordered table-condensed table-hover">
                            <tbody>
                            @for ($i = 0; $i < 2; $i++)
                                <form action="#" method="post" role="form" id="ac_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}</td>
                                        <td>
                                            <input type="text" name="id[{{$ctrl_setting[$i]->id }}][value]" class="form-control input-sm" value="{{$ctrl_setting[$i]->value}}">
                                        </td>
                                        <td class="text-center col-sm-3">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_ac({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-2">
                <div class="panel-body">
                    {{--<strong>RECTIFIER MODULE</strong>--}}
                    <div class="col-lg-8">
                        <table class="table table-bordered table-hover table-condensed">
                            <tbody>
                            @for ($i = 2; $i < 3; $i++)
                                <form action="#" method="post" role="form" id="rect_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}</td>
                                        <td>
                                            <input type="text" name="id[{{$ctrl_setting[$i]->id }}][value]" class="form-control input-sm" value="{{$ctrl_setting[$i]->value}}">
                                        </td>
                                        <td class="text-center col-sm-3">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_rect({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <div class="tab-pane  " id="tab-3">
                <div class="panel-body">
                    {{--<strong>DC-1</strong>--}}

                    <div class="col-lg-6">
                        <table class="table table-bordered table-condensed table-hover ">
                            <tbody>
                            {{--Temperature Compensation Enable	--}}
                            @for ($i = 3; $i < 4; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}</td>
                                        <td class="">
                                            <select name="id[{{$ctrl_setting[$i]->id }}][value]" id="inputID" class="form-control">
                                                <option value="{{ $ctrl_setting[$i]->value }}">{{ ($ctrl_setting[$i]->value == 1)?'Enable':'Disable' }}</option>
                                                @if($ctrl_setting[$i]->value == 1)

                                                    <option value="0">Disable</option>
                                                @else
                                                    <option value="1">Enable</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td class="text-center col-sm-4">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor

                            {{--Temperature Compensation Coefficien--}}
                            @for ($i = 4; $i < 6; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}  {{ ($ctrl_setting[$i]->unit == '')?'' : '('.$ctrl_setting[$i]->unit.')' }}</td>
                                        <td>
                                            <input type="text" name="id[{{$ctrl_setting[$i]->id }}][value]" class="form-control input-sm" value="{{$ctrl_setting[$i]->value}}">
                                        </td>
                                        <td class="text-center col-sm-4">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor

                            {{--Periodical equalizing charge enable	--}}
                            @for ($i = 6; $i < 7; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}</td>
                                        <td class="col-sm-3">
                                            <select name="id[{{$ctrl_setting[$i]->id }}][value]" id="inputID" class="form-control">
                                                <option value="{{ $ctrl_setting[$i]->value }}">{{ ($ctrl_setting[$i]->value == 1)?'Enable':'Disable' }}</option>
                                                @if($ctrl_setting[$i]->value == 1)

                                                    <option value="0">Disable</option>
                                                @else
                                                    <option value="1">Enable</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td class="text-center col-sm-3">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor

                            {{--Periodical equalizing charge interval--}}
                            @for ($i = 7; $i < 13; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}  {{ ($ctrl_setting[$i]->unit == '')?'' : '('.$ctrl_setting[$i]->unit.')' }}</td>
                                        <td>
                                            <input type="text" name="id[{{$ctrl_setting[$i]->id }}][value]" class="form-control input-sm" value="{{$ctrl_setting[$i]->value}}">
                                        </td>
                                        <td class="text-center col-sm-3">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor

                            {{--Hibernation enable	--}}
                            @for ($i = 13; $i < 14; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}</td>
                                        <td class="col-sm-3">
                                            <select name="id[{{$ctrl_setting[$i]->id }}][value]" id="inputID" class="form-control">
                                                <option value="{{ $ctrl_setting[$i]->value }}">{{ ($ctrl_setting[$i]->value == 1)?'Enable':'Disable' }}</option>
                                                @if($ctrl_setting[$i]->value == 1)

                                                    <option value="0">Disable</option>
                                                @else
                                                    <option value="1">Enable</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td class="text-center col-sm-3">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor
                            {{--Hibernation interval time --}}
                            @for ($i = 14; $i < 15; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}   {{ ($ctrl_setting[$i]->unit == '')?'' : '('.$ctrl_setting[$i]->unit.')' }}</td>
                                        <td>
                                            <input type="text" name="id[{{$ctrl_setting[$i]->id }}][value]" class="form-control input-sm" value="{{$ctrl_setting[$i]->value}}">
                                        </td>
                                        <td class="text-center col-sm-3">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor

                            {{--Battery test enable--}}
                            @for ($i = 15; $i < 17; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}</td>
                                        <td class="col-sm-3">
                                            <select name="id[{{$ctrl_setting[$i]->id }}][value]" id="inputID" class="form-control">
                                                <option value="{{ $ctrl_setting[$i]->value }}">{{ ($ctrl_setting[$i]->value == 1)?'Enable':'Disable' }}</option>
                                                @if($ctrl_setting[$i]->value == 1)

                                                    <option value="0">Disable</option>
                                                @else
                                                    <option value="1">Enable</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td class="text-center col-sm-4">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor


                            </tbody>
                        </table>

                    </div>
                    <div class="col-lg-6">

                        <table class="table table-bordered table-condensed table-hover">
                            <body>


                            {{--Start Battery Test--}}
                            @for ($i = 17; $i < 18; $i++)
                                <tr>
                                    <td>Start Battery Test</td>
                                    <td>
                                        <input type="text" class="form-control input-sm" disabled="">
                                    </td>
                                    <td class=" col-sm-4  text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                            <button type="button" class="btn default btn-sm " disabled>WRITE</button>

                                        </div>
                                    </td>
                                </tr>
                            @endfor

                            {{--Battery test start voltage set point--}}
                            @for ($i = 18; $i < 30; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}  {{ ($ctrl_setting[$i]->unit == '')?'' : '('.$ctrl_setting[$i]->unit.')' }}</td>
                                        <td>
                                            <input type="text" name="id[{{$ctrl_setting[$i]->id }}][value]" class="form-control input-sm" value="{{$ctrl_setting[$i]->value}}">
                                        </td>
                                        <td class="text-center col-sm-3">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor


                            </body>
                        </table>
                    </div>


                </div>
            </div>
            <div class="tab-pane" id="tab-4">
                <div class="panel-body">
                    {{--<strong>DC-2</strong>--}}
                    <div class="col-lg-6">
                        <table class="table table-condensed table-bordered table-hover">
                            <body>

                            {{--Load Current Gain/Slope--}}
                            @for ($i = 30; $i < 36; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}  {{ ($ctrl_setting[$i]->unit == '')?'' : '('.$ctrl_setting[$i]->unit.')' }}</td>
                                        <td>
                                            <input type="text" name="id[{{$ctrl_setting[$i]->id }}][value]" class="form-control input-sm" value="{{$ctrl_setting[$i]->value}}">
                                        </td>
                                        <td class="text-center col-sm-4">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>

                            @endfor

                            </body>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table table-condensed table-bordered table-hover">
                            <body>

                            {{--Manual Equalizing Charge Enable--}}
                            @for ($i = 36; $i < 37; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}</td>
                                        <td class="col-sm-3">
                                            <select name="id[{{$ctrl_setting[$i]->id }}][value]" id="inputID" class="form-control">
                                                <option value="{{ $ctrl_setting[$i]->value }}">{{ ($ctrl_setting[$i]->value == 1)?'Enable':'Disable' }}</option>
                                                @if($ctrl_setting[$i]->value == 1)

                                                    <option value="0">Disable</option>
                                                @else
                                                    <option value="1">Enable</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td class="text-center col-sm-4">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor
                            {{--Battery Currentslope--}}
                            @for ($i = 37; $i < 40; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}  {{ ($ctrl_setting[$i]->unit == '')?'' : '('.$ctrl_setting[$i]->unit.')' }}</td>
                                        <td>
                                            <input type="text" name="id[{{$ctrl_setting[$i]->id }}][value]" class="form-control input-sm" value="{{$ctrl_setting[$i]->value}}">
                                        </td>
                                        <td class="text-center col-sm-3">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>

                            @endfor
                            {{--Fast Charge Enable--}}
                            @for ($i = 40; $i < 41; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}</td>
                                        <td class="col-sm-3">
                                            <select name="id[{{$ctrl_setting[$i]->id }}][value]" id="inputID" class="form-control">
                                                <option value="{{ $ctrl_setting[$i]->value }}">{{ ($ctrl_setting[$i]->value == 1)?'Enable':'Disable' }}</option>
                                                @if($ctrl_setting[$i]->value == 1)

                                                    <option value="0">Disable</option>
                                                @else
                                                    <option value="1">Enable</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td class="text-center col-sm-3">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor
                            {{--Fast Charge Voltage Set Point--}}
                            @for ($i = 41; $i < 43; $i++)
                                <form action="#" method="post" role="form" id="dc_form{{ $i }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>{{ $ctrl_setting[$i]->name }}   {{ ($ctrl_setting[$i]->unit == '')?'' : '('.$ctrl_setting[$i]->unit.')' }}</td>
                                        <td>
                                            <input type="text" name="id[{{$ctrl_setting[$i]->id }}][value]" class="form-control input-sm" value="{{$ctrl_setting[$i]->value}}">
                                        </td>
                                        <td class="text-center col-sm-3">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm  " onclick="save_dc({{ $i }})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>

                            @endfor

                            </body>
                        </table>
                    </div>

                </div>
            </div>
            <div class="tab-pane  " id="tab-5">
                <div class="panel-body">
                    {{--<strong>DC-3/ Relay</strong>--}}
                    <div class="col-lg-8">
                        <table class="table table-bordered table-condensed table-hover ">
                            <tbody>
                            @for ($i = 0; $i < 6; $i++)
                                <form action="#" method="post" role="form" id="relay_form{{$i}}">
                                    {{csrf_field()}}
                                    <tr>
                                        <td>{{ $relay[$i]->name }}</td>
                                        <td class="col-sm-2">
                                            <select name="id[{{ $relay[$i]->id }}][state]" id="inputID" class="form-control input-group-sm">
                                                <option value="{{ $relay[$i]->state }}">{{ ($relay[$i]->state == 'enable')?'Enable':'Disable' }}</option>
                                                @if($relay[$i]->state == 'enable')
                                                    <option value="disable">Disable</option>
                                                @else
                                                    <option value="enable">Enable</option>
                                                @endif

                                            </select>
                                        </td>
                                        <td class="col-sm-3">
                                            <select name="id[{{ $relay[$i]->id }}][type_id]" id="inputID" class="form-control">
                                                <option value="{{$relay[$i]->type_id}}">{{ $relay[$i]->relaytype->type_name}}</option>
                                                <option value="">--Select Relay Type--</option>
                                                @foreach($type as $tp)
                                                    <option value="{{ $tp->id }}">{{ $tp->type_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-center col-sm-3">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm btn-outline " onclick="read_setting()">READ</button>

                                                <button type="button" class="btn btn-info btn-sm " onclick="save_relay({{$i}})">WRITE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane " id="tab-6">
                <div class="panel-body">
                    {{--<strong>Others</strong>--}}
                    <div class="col-lg-8">
                        <form action="#" method="post" role="form" id="log_form">
                            {{ csrf_field() }}
                        <table class="table table-condensed table-bordered table-hover">
                            <body>
                            {{--Max Number of Datalog--}}
                            @for ($i = 43; $i < 46; $i++)
                                <tr>
                                    <td>{{ $ctrl_setting[$i]->name }}   {{ ($ctrl_setting[$i]->unit == '')?'' : '('.$ctrl_setting[$i]->unit.')' }}</td>
                                    <td class="col-sm-3">
                                        <input type="text" name="id[{{$ctrl_setting[$i]->id }}][value]" class="form-control input-sm" value="{{$ctrl_setting[$i]->value}}">
                                    </td>
                                </tr>
                            @endfor

                            </body>
                        </table>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10 text-uppercase">
                                <button type="button" class="btn blue btn120 text-uppercase" onclick="save_log()">Save</button>
                                <button type="reset" class="btn default btn120 text-uppercase" >Refresh</button>
                            </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

        function save_ac(id) {
            console.log('Store AC with Ajax Request');
            var route = '{{ route('save ac') }}';
            var form = '#ac_form' + id;
            var text = ' AC Setting Changed !';
            $('#loading-text').html('write');

            //call function ajax request
            store(route, form, text);
        }

        function save_rect(id) {
            console.log('Store Rectifier Module with Ajax Request');
            var route = '{{ route('save rectifier') }}';
            var form = '#rect_form' + id;
            var text = ' Rectifier Module Setting Changed !';
            $('#loading-text').html('write');

            //call function ajax request
            store(route, form, text);
        }

        function save_dc(id) {
            console.log('Store DC with Ajax Request');
            var route = '{{ route('save dc') }}';
            var form = '#dc_form' + id;
            var text = ' DC Setting Changed !';
            $('#loading-text').html('write');

            //call function ajax request
            store(route, form, text);
        }

        function save_relay(id) {
            console.log('Store DC with Ajax Request');
            var route = '{{ route('save relay') }}';
            var form = '#relay_form' + id;
            var text = ' Relay Setting Changed !';
            $('#loading-text').html('write');

            //call function ajax request
            store(route, form, text);
        }

        function save_log() {
            console.log('Store DC with Ajax Request');
            var route = '{{ route('save log') }}';
            var form = '#log_form';
            var text = ' Log Setting Changed !';


            //call function ajax request
            store(route, form, text);

        }


        function store(route, form, text) {
            //show loading
            show_loading();

            //ajax request
            $.ajax({
                url: route,
                type: 'POST',
                data: $(form).serialize(),
                //if success
                success: function () {
                    hide_loading();
                    swal({
                        type: 'success',
                        title: "Success!",
                        text: text,
                        timer: 1000,
                        showConfirmButton: false,
                    }).then(
                        function () {
                        },
                        function (dismiss) {
                            if (dismiss === 'timer') {
                                console.log('I was closed by the timer');

                            }
                        }
                    );

                },
                //if error
                error: function (jqXhr) {
                    var errorHtml = '';
                    hide_loading()

                    $.each(jqXhr.responseJSON, function (index, value) {
                        errorHtml += '<div class="text-left col-sm-offset-1 text-capitalize"><li>' + value + '</li></div>';

                    });
                    swal({
                        title: "Error!",
                        html: errorHtml,
                        type: 'error'
                    });
                }

            })
        }

        function read_setting() {
            console.log('Read all setting ');
            $('#loading-text').html('reading');

//            var text = ' Read Success !';

            show_loading();

            $.ajax({
                url: '{{ route('read setting') }}',
//                data: '',
                type: 'GET',
                success: function () {
                    hide_loading();
                    swal({
                        type: 'success',
                        title: "Success!",
//                        text: text,
                        timer: 1000,
                        showConfirmButton: false,
                    }).then(
                        function () {
                        },
                        function (dismiss) {
                            if (dismiss === 'timer') {
                                console.log('I was closed by the timer');

                            }
                        }
                    );
                },
                error: function (jqXhr) {
                    var errorHtml = '';
                    hide_loading()

                    $.each(jqXhr.responseJSON, function (index, value) {
                        errorHtml += '<div class="text-left col-sm-offset-1 text-capitalize"><li>' + value + '</li></div>';

                    });
                    swal({
                        title: "Error!",
                        html: errorHtml,
                        type: 'error'
                    });
                }

            })

        }

    </script>
@endsection