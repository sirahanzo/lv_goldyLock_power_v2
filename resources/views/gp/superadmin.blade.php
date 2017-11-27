@extends('layouts.gp')

@section('css')
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/clockpicker.css">
@endsection

@section('content')
    <form class="form-horizontal form-stripe" id="dateTime">
        {{csrf_field()}}

        {{--<h5 class="mb-lg">To enjoy more, sing in!</h5>--}}
        <div class="col-lg-6">
            <div class="form-group">
                <label for="default-datepicker" class="col-sm-3 control-label ">Date</label>
                <div class="col-sm-7">
                    <div class="input-group">
                        <span class="input-group-addon x-primary"><i class="fa fa-calendar"></i></span>
                        <input type="text" name="date" class="form-control" id="default-datepicker">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Time</label>
                <div class="col-sm-7">
                    <div class="input-group clockpicker" data-autoclose="true">
                        <span class="input-group-addon x-primary"><i class="fa fa-clock-o"></i></span>
                        <input class="form-control timepicker" id="timepicker1" name="time" value="" type="text"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Part Number</label>
                <div class="col-sm-7">
                    <input type="text" name="pn" class="form-control" id="pn" placeholder="192.168.1.100" value="{{ $site->pn }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Serial Number</label>
                <div class="col-sm-7">
                    <input type="text" name="sn" class="form-control" id="sn" placeholder="255.25.255.0" value="{{ $site->sn }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Site Id</label>
                <div class="col-sm-7">
                    <input type="text" name="site_id" class="form-control" id="site_id" placeholder="255.25.255.0" value="{{ $site->site_id }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Site Name</label>
                <div class="col-sm-7">
                    <input type="text" name="site_name" class="form-control" id="site_name" placeholder="255.25.255.0" value="{{ $site->site_name }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Site Address</label>
                <div class="col-sm-7">
                    <textarea class="form-control" rows="3" name="address">{!! $site->address !!}</textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="col-sm-3 control-label">IPaddress</label>
                <div class="col-sm-7">
                    <input type="text" name="ipaddress" class="form-control" id="ipaddress" placeholder="192.168.1.100" value="{{ $network->ipaddress }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Subnet Mask</label>
                <div class="col-sm-7">
                    <input type="text" name="netmask" class="form-control" id="netmask" placeholder="255.25.255.0" value="{{ $network->netmask }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Gateway</label>
                <div class="col-sm-7">
                    <input type="text" name="gateway" class="form-control" id="gateway" placeholder="255.25.255.0" value="{{ $network->gateway }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">SNMP-Trap</label>
                <div class="col-sm-7">
                    <input type="text" name="snmp_trap" class="form-control" id="snmp_trap" placeholder="192.168.1.100" value="{{ $network->snmp_trap }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">SNMP Version</label>
                <div class="col-sm-7">
                    <select name="snmp_version" id="snmp_version" class="form-control">
                        <option value="{{ $network->snmp_version }}">SNMP V. {{ $network->snmp_version }}</option>
                        <option value="1">SNMP V.1</option>
                        <option value="2">SNMP V.2</option>
                        <option value="3">SNMP V.3</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn blue btn120" id="store">Save</button>
                <button type="reset" class="btn default btn120">Refresh</button>
            </div>
        </div>

    </form>




@endsection

@section('js')
    <script src="{{ asset('/') }}js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('/') }}js/clockpicker.js"></script>
    <script>

        $('#default-datepicker,#datepicker').datepicker({
            format: "yyyy-mm-dd",
            weekStart: 1,
            todayBtn: "linked",
            todayHighlight: true,
            autoclose: true
        });

        $('.clockpicker').clockpicker();

        $('#store').click(function (e) {
            //do something


            show_loading();

            console.log('ajax request to store');
            $.ajax({
                url: '{{ route('save date') }}',
                type: 'POST',
                data: $('#dateTime').serialize(),
                //if success
                success: function (data) {
                    console.log(data);
//                    $('#progress').modal('hide');
                    hide_loading();
                    reloadPage();
                    console.log('reload page');

                    swal({
                        type: 'success',
                        title: "Success!",
                        text: "Data Saved!",
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
                    )
                },
                //if error
                error: function (jqXhr) {
                    var errorHtml = '';
                    $('#progress').modal('hide');

                    $.each(jqXhr.responseJSON, function (index, value) {
                        errorHtml += '<div class="text-left col-sm-offset-1 text-capitalize"><li>' + value + '</li></div>';

                    });
                    swal({
                        title: "Error!",
                        html: errorHtml,
                        type: 'error'
                    });
                }
            });

            e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
        });
    </script>
@endsection