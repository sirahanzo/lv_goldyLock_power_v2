@extends('layouts.gp')

@section('content')
    <form class="form-horizontal  form-stripe" id="networkForm">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-3 control-label">IPaddress</label>
            <div class="col-sm-4">
                <input type="text" name="ipaddress" class="form-control" id="ipaddress" placeholder="192.168.1.100" value="{{ $network->ipaddress }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Subnet Mask</label>
            <div class="col-sm-4">
                <input type="text" name="netmask" class="form-control" id="netmask" placeholder="255.25.255.0" value="{{ $network->netmask }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Gateway</label>
            <div class="col-sm-4">
                <input type="text" name="gateway" class="form-control" id="gateway" placeholder="255.25.255.0" value="{{ $network->gateway }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="button" class="btn blue btn120" id="store_network">Save</button>
                <button type="reset" class="btn default btn120">Refresh</button>
            </div>
        </div>
    </form>
    <hr>

    <form class="form-horizontal  form-stripe" id="snmpForm">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-3 control-label">SNMP-Trap</label>
            <div class="col-sm-4">
                <input type="text" name="snmp_trap" class="form-control" id="snmp_trap" placeholder="192.168.1.100" value="{{ $network->snmp_trap }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">SNMP Version</label>
            <div class="col-sm-4">
                <select name="snmp_version" id="snmp_version" class="form-control">
                    <option value="{{ $network->snmp_version }}">SNMP V. {{ $network->snmp_version }}</option>
                    <option value="1">SNMP V.1</option>
                    <option value="2">SNMP V.2</option>
                    <option value="3">SNMP V.3</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="button" class="btn blue btn120" id="store_snmp">Save</button>
                <button type="reset" class="btn default btn120">Refresh</button>
            </div>
        </div>
    </form>


@endsection

@section('js')
    <script>


        $('#store_network').click(function (e) {
            console.log('store network configuration');
            console.log('show verifikasi ');
            verify_ipchange();

            //avoid refresh page
            e.preventDefault();
        });

        function verify_ipchange() {

            var address = ' <table class="table text-left  ">' +
                '<tr><td>IPaddress</td><td>:</td><td>' + $('#ipaddress').val() + '</td></tr>' +
                '<tr><td>Subnet Mask</td><td>:</td><td>' + $('#netmask').val() + '</td></tr>' +
                '<tr><td>Gateway</td><td>:</td><td>' + $('#gateway').val() + '</td></tr>' +
                '</table>';

            swal({
                title: 'Confirm New Config',
                html: address,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Save'
            }).then(
                function () {
                    console.log('Call ajax request store');
                    store_network();
                },
                function (dismiss) {
                    if (dismiss == 'cancel') {
                        console.log('Canceled');
                    }
                }
            )
        }

        function store_network() {
            show_loading();
            $.ajax({
                url: '{{url('save-network')}}',
                type: 'POST',
                data: $('#networkForm').serialize(),
                //if success
                success: function () {
                    hide_loading();
                    swal({
                        type: 'success',
                        title: "Success!",
                        text: "IPAddress Changed",
                        timer: 2000,
                        showConfirmButton: false,
                    }).then(
                        function () {

                        },
                        function (dismiss) {
                            if (dismiss === 'timer') {
                                console.log('Call Reboot Function');
                                request_reboot();
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


        function request_reboot() {
            console.log('request ajax to request_reboot');
            swal({
                title: 'Reboot System',
                text: "To Take Effect IP Changed",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
//                cancelButtonColor: '#555',
                confirmButtonText: 'Reboot Now'
            }).then(
                function () {
                    console.log('Call Function Rebooted');
                    /*var url = "http://" + $('#ipaddress').val() + '/login';
                     console.log(url);
                     window.open(url, '_blank');*/
                    rebooted();
                },
                function (dismiss) {
                    if (dismiss == 'cancel') {
                        console.log('Canceled');
                    }
                }
            )
        }

        function rebooted() {
            newAddress();
            $.ajax({
                url: '{{ route('reboot') }}',
                type: 'POST',
                //if success
                success: function () {
//                    newAddress();

                },
                //if error
                error:function () {
                    swal({
                        type: 'success',
                        title: "SYSTEM REBOOTED",
                        text:'IP ADDRESS Has Changed'
                    })
                }
            })
        }

        $('#store_snmp').click(function (e) {
            //do something
            console.log('store SNMP Version');
            show_loading();
            $.ajax({
                url: '{{ url('save-snmp') }}',
                data: $('#snmpForm').serialize(),
                type: 'POST',
                //if success
                success: function () {
                    hide_loading();
                    swal({
                        type: 'success',
                        title: "Success!",
                        text: "SNMP Config Changed",
                        timer: 2000,
                        showConfirmButton: false,
                    });
                    reloadPage();
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


            });

            //avoid refresh page
            e.preventDefault();

        });

        function newAddress() {
            var url = "http://" + $('#ipaddress').val() + '/login';
            console.log(url);
            window.open(url, '_blank');
        }

    </script>
@endsection