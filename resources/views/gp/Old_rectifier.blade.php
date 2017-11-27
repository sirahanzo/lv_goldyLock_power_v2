@extends('layouts.gp')

@section('css')
    <style>
        #alarm{
            background: #F44336;
            color: white;
        }
        #rect_no{
            background: #607D8B;
            color: white;
        }
        #shutdown_btn{
            margin-bottom: -10px;
            margin-top: -15px;
        }
        #table_rect{
            margin-top: -10px;
        }
        #option{
            background: #29aba4;
            color: white;
        }
    </style>
@endsection

@section('content')
    <table class="table table-bordered table-hover table-condensed " id="table_rect">
        <thead>
        <tr class="bg-primary1">
            <th></th>
            <th></th>

            <th class="text-center bg-primary" colspan="3"> Curr. Module (A)</th>
            <th></th>
            <th class="text-center" id="alarm">Module</th>

            <th class="text-center" id="alarm">Comm.</th>
            <th class="text-center" id="alarm">Protect</th>
            <th class="text-center" id="alarm">StartUp/</th>
            <th class="text-center " id="alarm">Hiber</th>
            <th class="text-center" id="alarm">Curr</th>
            <th class="text-center" id="alarm">Rect.</th>
            <th class="text-center" id="alarm">AC</th>
            <th class="text-center" id="alarm">Fan</th>
            <th class="text-center" id="alarm">Hi</th>
            <th class="text-center" id="rect_no">Remote</th>
        </tr>
        <tr class="bg-primary1">
            <th id="rect_no" > Rect. #</th>
            <th class="text-center bg-primary"> Volt (V)</th>
            <th class="text-center bg-primary" data-toggle="tooltip" title="Module Rectifer A"> a </th>
            <th class="text-center bg-primary"> b</th>
            <th class="text-center bg-primary"> c </th>
            <th class="text-center bg-primary"> T (&deg;C)</th>
            <th class="text-center" id="alarm"> Fail</th>
            <th class="text-center " id="alarm"> Lost</th>
            <th class="text-center" id="alarm"> Fail</th>
            <th class="text-center" id="alarm"> S.Down</th>
            <th class="text-center" id="alarm"> nate</th>
            <th class="text-center" id="alarm"> Limit</th>
            <th class="text-center" id="alarm"> Fail</th>
            <th class="text-center" id="alarm"> Fail</th>
            <th class="text-center" id="alarm"> Fail</th>
            <th class="text-center" id="alarm"> Temp</th>
            <th class="text-center col-sm-1 " id="rect_no"> Shutdown</th>

        </tr>
        </thead>
        <tbody>
        @for($i = 1;$i<17;$i++)
            <?php $rect = 'rect_' . $i;  ?>
            <tr class="">
                <td><b> {{ $i }}</b></td>
                {{--voltage--}}
                <td class="text-center">{{ round($rectifier[0]->monitoringrectifier->$rect,1) }}</td>
                {{--current A--}}
                <td class="text-center">{{ round($rectifier[1]->monitoringrectifier->$rect/3,1) }}</td>
                {{--current B--}}
                <td class="text-center">{{ round($rectifier[1]->monitoringrectifier->$rect/3,1) }}</td>
                {{--current C--}}
                <td class="text-center">{{ round($rectifier[1]->monitoringrectifier->$rect/3,1) }}</td>
                {{--temperature--}}
                <td class="text-center">{{ round($rectifier[2]->monitoringrectifier->$rect,1) }}</td>

                {{--module fail--}}
                <td class="text-center">
                    @if($alarm[0]->alarmrectifier->$rect ==1)
                        <b class="text-danger">Alrm</b>
                    @else
                        Nrm
                    @endif
                </td>

                {{--comm lost--}}
                <td class="text-center">
                    @if($alarm[1]->alarmrectifier->$rect ==1)
                        <b class="text-danger">Alrm</b>
                    @else
                        Nrm
                    @endif
                </td>

                {{--protect--}}
                <td class="text-center">
                    @if($alarm[2]->alarmrectifier->$rect ==1)
                        <b class="text-danger">Alrm</b>
                    @else
                        Nrm
                    @endif
                </td>

                {{--Startup/Shutdown--}}
                <td class="text-center">
                    @if($alarm[6]->alarmrectifier->$rect ==1)
                        <b class="text-danger">Alrm</b>
                    @else
                        Nrm
                    @endif
                </td>

                {{--Hibernation--}}
                <td class="text-center">
                    @if($alarm[5]->alarmrectifier->$rect ==1)
                        <b class="text-danger">Alrm</b>
                    @else
                        Nrm
                    @endif
                </td>
                {{-- Current Limit--}}
                <td class="text-center">
                    @if($alarm[7]->alarmrectifier->$rect ==1)
                        <b class="text-danger">Alrm</b>
                    @else
                        Nrm
                    @endif
                </td>
                {{--Rectifier fail--}}
                <td class="text-center">
                    @if($alarm[8]->alarmrectifier->$rect ==1)
                        <b class="text-danger">Alrm</b>
                    @else
                        Nrm
                    @endif
                </td>
                {{--AC fail--}}
                <td class="text-center">
                    @if($alarm[3]->alarmrectifier->$rect ==1)
                        <b class="text-danger">Alrm</b>
                    @else
                        Nrm
                    @endif
                </td>
                {{--Fan fail--}}
                <td class="text-center">
                    @if($alarm[4]->alarmrectifier->$rect ==1)
                        <b class="text-danger">Alrm</b>
                    @else
                        Nrm
                    @endif
                </td>
                {{--Hi temp--}}
                <td class="text-center">
                    @if($alarm[9]->alarmrectifier->$rect ==1)
                        <b class="text-danger">Alrm</b>
                    @else
                        Nrm
                    @endif
                </td>
                <td class="text-center">
                    <form action="#" id="shutdown_form{{$i}}">
                        {{ csrf_field() }}
                        <input type="hidden" id="rectifier" name="rectifier" value="{{ $i }}">
                        <input type="hidden" id="value" name="value" value="{{ ($rectifier[3]->monitoringrectifier->$rect == 0)?1:0 }}">
                        @if($rectifier[3]->monitoringrectifier->$rect == 0)
                            <button type="button" class="btn btn-xs btn120  red btn-outline1" onclick="remote({{$i}},'OFF')" id="shutdown_btn">OFF</button>
                        @else
                            <button type="button" class="btn btn-xs btn120  green btn-outline1" onclick="remote({{$i}},'ON')" id="shutdown_btn">ON</button>
                        @endif


                    </form>

                </td>
            </tr>
        @endfor

    </table>
@endsection

@section('js')
    <script>
        $('th[data-toggle="tooltip"]').tooltip();
        {{--setTimeout(function refreshTable() {--}}
            {{--console.log('Get Request Ajax Rectifier:');--}}

            {{--$.ajax({--}}
                {{--url:"{{ route('ajax rectifier') }}",--}}
                {{--dataType:'html',--}}

                {{--success:function(data) {--}}
                    {{--$('#data').find('section').empty().append(data);--}}
                    {{--setTimeout(refreshTable,3000);--}}
                {{--}--}}
            {{--});--}}
        {{--}, 1000);--}}

       function remote1(rect) {
//           var rectifier = $('#rectifier').val();
           console.log('Shutdown Rectifier! ='+rect);
//           $('#loading-text').html('remoting');
//           show_loading();
           var form = $('#shutdown_form'+rect).serialize();
           console.log(form);
       }

        function remote(rect,cmd) {
//            var remote = $('#value').val();
//            var rectifier = $('#rectifier').val();

            swal({
                title: 'Are you sure?',
                text: "Remote ShutDown "+ cmd +" Rectifier "+ rect+"!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
//                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes !'
            }).then(
                function () {
                    console.log('Call ajax delete request');
                    $('#loading-text').html('remoting');

                    show_loading();
//                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ url('shutdown-rectifier') }}",
                        type: "POST",
                        data: $('#shutdown_form'+rect).serialize(),
                        //if success
                        success: function () {
                            hide_loading();
                            swal({
                                title: "Success!",
                                text: "Rectifier "+rect+" Proccesing To Turning "+cmd,
                                type: "success",
                                showConfirmButton: false,
                                timer: 2000
                            }).then(
                                function () {
                                },
                                function (dismiss) {
                                    if (dismiss === 'timer') {
                                        console.log('I was closed by the timer');

                                    }
                                }
                            );
//                            oTable.draw();
                        },
                        //if error
                        error: function (jqXhr) {
                            var errorHtml = '';
                            hide_loading()

                            $.each(jqXhr.responseJSON, function (index, value) {
                                errorHtml += '<div class="text-left col-sm-offset-1"><li>' + value + '</li></div>';

                            });
                            swal({
                                title: "Error!",
                                html: errorHtml,
                                type: 'error'
                            });
                        }
                    })

                },
                function (dismiss) {
                    if (dismiss == 'cancel') {
                        console.log('Canceled');
                    }
                }
            )
        }

    </script>
@endsection
