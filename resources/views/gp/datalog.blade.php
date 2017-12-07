@extends('layouts.gp')

@section('css')
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/clockpicker.css">
    <link rel="stylesheet" href="{{asset('/')}}css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/fixedHeader.dataTables.min.css">
    <style>
        .btn-darker-1.active {
            background-color: lightseagreen;
        }

        .dataTables_wrapper .dataTables_processing {
            position: absolute;
            top: 80%;
            left: 50%;
            width: 30%;
            height: 50px;
            margin-left: -20%;
            margin-top: -25px;
            padding-top: 20px;
            text-align: center;
            font-size: 1.2em;
            background: none;
            background-color: lightskyblue;
            color: white;
        }
    </style>
@endsection

@section('content')
    <form class="form-horizontal form-stripe" id="form_data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Range</label>
                    <div class="col-sm-10">
                        <div class="input-daterange input-group" id="range-datepicker">
                            <input type="text" class="input-sm form-control" name="from"/>
                            <span class="input-group-addon x-primary">to</span>
                            <input type="text" class="input-sm form-control" name="to"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-sm btn120 btn-primary btn-outline" type="button" id="show_data">Show Data</button>
                <button class="btn btn-sm btn120 btn-success btn-outline" type="button" id="download">Download</button>
                <button class="btn btn-sm btn120 btn-info btn-outline btn-loading" type="button" id="refresh">Refresh Data</button>
            </div>
        </div>
    </form>
    <table id="myTable" class="table  responsive nowrap  " cellspacing="0" width="100%">

        <thead>
        <tr>
            <th class="col-sm-2">Date/Time</th>
            <th>Phase R (V)</th>
            <th>Phase S (V)</th>
            <th>Phase T (V)</th>
            <th>Bus Voltage (V)</th>
            <th>Batt Temp (&deg;C)</th>
            <th>Load Current(A)</th>
            <th>Batt. Current (A)</th>
            <th>Rectifier Current (A)</th>
            {{--<th>Irect2</th>--}}
            {{--<th>Irect3</th>--}}
            {{--<th>Irect4</th>--}}
            {{--<th>Irect5</th>--}}
            {{--<th>Irect6</th>--}}
            {{--<th>Irect7</th>--}}
            {{--<th>Irect8</th>--}}
            {{--<th>Irect9</th>--}}
            {{--<th>Irect10</th>--}}
            {{--<th>Irect11</th>--}}
            {{--<th>Irect12</th>--}}
            {{--<th>Irect13</th>--}}
            {{--<th>Irect14</th>--}}
            {{--<th>Irect15</th>--}}
            {{--<th>Irect16</th>--}}
        </tr>
        </thead>

    </table>
@endsection

@section('js')
    <script src="{{ asset('/') }}js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('/') }}js/clockpicker.js"></script>
    <script src="{{ asset('/') }}js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}js/dataTables.fixedColumns.min.js"></script>
    <script src="{{ asset('/') }}js/dataTables.bootstrap.min.js"></script>
    <script>


        var form = $('#form_data').serialize();
        drawPackData(form);

        function drawPackData(form) {

            var oTable = $('#myTable').DataTable({
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                serverSide: true,
                processing: true,
                ajax: {
                    "url": '{{ route('show datalog') }}?' + form,
                    "type": "POST"
                },
                columns: [
                    {data: 'updated_at', name: 'log_monitoring.updated_at'},
                    {data: 'ac_volt_r', name: 'log_monitoring.ac_volt_r'},
                    {data: 'ac_volt_s', name: 'log_monitoring.ac_volt_s'},
                    {data: 'ac_volt_t', name: 'log_monitoring.ac_volt_t'},
                    {data: 'bus_volt', name: 'log_monitoring.bus_volt'},
                    {data: 'batt_temp', name: 'log_monitoring.batt_temp'},
                    {data: 'i_load', name: 'log_monitoring.i_load'},
                    {data: 'i_batt', name: 'log_monitoring.i_batt'},
                    {data: 'irect_total', name: 'log_monitoring.irect_total'}
                ]
            });
            oTable.clear().draw(true);
        }

        //init date picker range
        $('#range-datepicker').datepicker({
            format: "yyyy-mm-dd",
            weekStart: 1,
            todayBtn: "linked",
            todayHighlight: true,
            autoclose: true
        });

        $('#show_data').click(function (e) {
            console.log('Show Data');
            var form = $('#form_data').serialize();

            $('#myTable').dataTable().fnDestroy();
            drawPackData(form);
//            $('#form_data').trigger('reset');//due to issue  if user wanto to download after show

            e.preventDefault();
        });

        $('#download').click(function (e) {
            console.log('Download Data');
            $('#loading-text').html('loading');
            show_loading();
            var form = $('#form_data').serialize();
            $.ajax({
                url: '{{ route('download datalog') }}',
                data: form,
                type: 'GET',
                //if success
                complete: function (res) {
                    hide_loading();
                    var path = res.responseJSON.path;
                    location.href = path;
                },
                //if error
                error: function (jqXhr) {
                    var errorHtml = '';
                    hide_loading();
                    $.each(jqXhr.responseJSON, function (index, value) {
                        errorHtml += '<div class="text-left col-sm-offset-1"><li>' + value + '</li></div>';

                    });
                    swal({
                        title: "Error!",
                        html: errorHtml,
                        type: 'error'
                    });
                }

            });

            e.preventDefault();
        });

        $('#refresh').click(function (e) {
            console.log('Refresh Data');
            $('#form_data').trigger('reset');

            $('#myTable').dataTable().fnDestroy();

            var form = $('#form_data').serialize();
            drawPackData(form);
            $('#form_data').trigger('reset');

            e.preventDefault();
        })


    </script>
@endsection