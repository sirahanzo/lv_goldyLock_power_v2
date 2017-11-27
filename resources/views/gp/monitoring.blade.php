@extends('layouts.gp')

@section('css')
    <style>
        #monitoring{
            background-color: #29aba4;
            color: whitesmoke;
        }
        #alarm{
            background-color: #F44336;
            color: whitesmoke;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading" id="monitoring"> Rectifier System</div>
                    <div class="panel-body1">
                        <table class="table table-hover table-condensed table-bordered1">
                            <tbody>
                            <tr>
                                <td> Bus voltage </td>
                                <td class="text-right"> 0 V </td>
                                <td> Phase A Voltage </td>
                                <td class="text-right"> 0 V </td>
                            </tr>
                            <tr>
                                <td> Battery current </td>
                                <td class="text-right"> 0 A </td>
                                <td> Phase B Voltage </td>
                                <td class="text-right"> 0 V </td>
                            </tr>
                            <tr>
                                <td> Load current </td>
                                <td class="text-right"> 0 A </td>
                                <td> Phase C Voltage </td>
                                <td class="text-right"> 0 V </td>
                            </tr>
                            <tr>
                                <td> Battery temperature </td>
                                <td class="text-right"> 0 &deg;C </td>
                                <td> Battery charge/discharge cycle </td>
                                <td class="text-right"> 0 </td>
                            </tr>
                            <tr>
                                <td> Ambient temperature </td>
                                <td class="text-right"> 0 &deg;C </td>
                                <td> Available capacity of battery </td>
                                <td class="text-right"> 0 % </td>
                            </tr>
                            <tr>
                                <td> Ambient humidity </td>
                                <td class="text-right"> 0 % </td>
                                <td> </td>
                                <td class="text-right"> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading" id="monitoring"> Relay Status</div>
                    <div class="panel-body1">
                        <table class="table table-hover table-condensed">
                            <tbody>
                            <tr>
                                <td> Relay 1 </td>
                                <td> Connect </td>
                                <td> Relay 5 </td>
                                <td> Connect </td>
                                <td> Relay 9 </td>
                                <td> Connect </td>
                            </tr>
                            <tr>
                                <td> Relay 2 </td>
                                <td> Connect </td>
                                <td> Relay 6 </td>
                                <td> Connect </td>
                                <td> Relay 10 </td>
                                <td> Connect </td>
                            </tr>
                            <tr>
                                <td> Relay 3 </td>
                                <td> Connect </td>
                                <td> Relay 7 </td>
                                <td> Connect </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> Relay 4 </td>
                                <td> Connect </td>
                                <td> Relay 8 </td>
                                <td> Connect </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading" id="alarm"> Alarm</div>
                <div class="panel-body1">
                    <table class="table table-hover table-condensed">
                        <tbody>
                        <tr class="">
                            <td> Mains Fail </td>
                            <td> Normal </td>
                            <td> Battery Test Failure </td>
                            <td> Normal </td>
                        </tr>
                        <tr class="">
                            <td> High Load DC Voltage </td>
                            <td> Normal </td>
                            <td> Battery On Load/Discharge </td>
                            <td> Normal </td>
                        </tr>
                        <tr class="">
                            <td> High Float DC Voltage </td>
                            <td> Normal </td>
                            <td> Battery Test Testing </td>
                            <td> Normal </td>
                        </tr>
                        <tr class="">
                            <td> Low Float DC Voltage </td>
                            <td> Normal </td>
                            <td> Battery Test Normal </td>
                            <td> Normal </td>
                        </tr>
                        <tr class="">
                            <td> Low Load DC Voltage </td>
                            <td> Normal </td>
                            <td> Current Limit </td>
                            <td> Normal </td>
                        </tr>
                        <tr class="">
                            <td> System Load Current High </td>
                            <td> Normal </td>
                            <td> Humidity High </td>
                            <td> Normal </td>
                        </tr>
                        <tr class="">
                            <td> Ambient Temperature High </td>
                            <td> Normal </td>
                            <td> AC Voltage High </td>
                            <td> Normal </td>
                        </tr>
                        <tr class="">
                            <td> Battery Temp High </td>
                            <td> Normal </td>
                            <td> AC Voltage Low </td>
                            <td> Normal </td>
                        </tr>
                        <tr class="">
                            <td> Load Fuse </td>
                            <td> Normal </td>
                            <td> Phase A Loss </td>
                            <td> Normal </td>
                        </tr>
                        <tr class="">
                            <td> Battery Fuse </td>
                            <td> Normal </td>
                            <td> Phase B Loss </td>
                            <td> Normal </td>
                        </tr>
                        <tr class="">
                            <td> Equalizing Charge </td>
                            <td> Normal </td>
                            <td> Phase C Loss </td>
                            <td> Normal </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        //init
        $('#rectifier_id').val(1);
        $('#rect').html(' Rectifier '+1);


        function get_rect(id) {
            console.log('get data rectifier ' + id);
            console.log('change value rectifier_id:' + id);
            $('#rectifier_id').val(id);
            $('#rect').html(' Rectifier '+id);
            console.log('rectifier_id value=' + $('#rectifier_id').val());

        }

        $('.rect').click(function () {
//            $('.rect').removeClass('active').addClass('btn-darker-1');
//            $(this).addClass('active').removeClass('btn-darker-1');
            $('.rect').removeClass('active');
            $(this).addClass('active');
        });



        {{--setTimeout(function refreshTable() {--}}
            {{--console.log('Get Request Ajax Rectifier:' + $('#rectifier_id').val());--}}
{{--//            setTimeout(refreshTable, 1000);--}}

            {{--function ajaxMonitoring() {--}}
                {{--$.ajax({--}}
                    {{--url:"{{ url('show-monitoring') }}/" + $('#rectifier_id').val(),--}}
                    {{--dataType: 'html',--}}

                    {{--success: function (data) {--}}
                        {{--$('#data').find('div').empty().append(data);--}}
                        {{--setTimeout(refreshTable, 1000);--}}
                    {{--}--}}
                {{--});--}}
            {{--};--}}
        {{--}, 1000);--}}
    </script>
@endsection
