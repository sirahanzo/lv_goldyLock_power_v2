@extends('layouts.gp')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading"> Rectifier System</div>
                <div class="panel-body1">
                    <table class="table table-hover table-condensed table-bordered1">
                        <tbody>
                        @foreach($system as $dt)
                            <tr>
                                <td>{{ $dt->name }}</td>
                                <td class="text-right"> {{ $dt->monitoringsystem->value . " ".$dt->unit }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading"> Rectifier Module {{ $rect_id }} </div>
                <?php $rect = 'rect_' . $rect_id ?>
                <div class="panel-body1">
                    <table class="table table-hover table-condensed">
                        <tbody>

                        @foreach($rectifier as $dt)
                            <tr>
                                <td>{{$dt->name}}</td>
                                <td class="text-right">{{ $dt->monitoringrectifier->$rect ." " .$dt->unit}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading"> Rectifier Alarm</div>
                <div class="panel-body1">
                    <table class="table table-hover table-condensed">
                        <tbody>
                        @foreach($rect_alarm as $dt)
                            <tr class="{{ ($dt->alarmrectifier->$rect == 0)?'':'danger' }}">
                                <td>{{ $dt->name }}</td>
                                <td>
                                    @if($dt->alarmrectifier->$rect == 0 )
                                        <b class="text-success">Nrml</b>
                                    @else
                                        <b class="text-danger">Alarm</b>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading"> Alarm</div>
                <div class="panel-body1">
                    <table class="table table-hover table-condensed">
                        <tbody>
                        @foreach($sys_alarm as $dt)
                            <tr class="{{ ($dt->alarmsystem->value == 0)?'':'danger' }}">
                                <td>{{ $dt->name }}</td>
                                <td>
                                    @if($dt->alarmsystem->value == 0 )
                                        <b class="text-success">Nrml</b>
                                    @else
                                        <b class="text-danger">Alarm</b>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading"> Relay Status</div>
                <div class="panel-body1">
                    <table class="table table-hover table-condensed">
                        <tbody>
                        @foreach($relay as $dt)
                            <tr>
                                <td>{{ $dt->name }}</td>
                                <td>
                                    @if($dt->state == 'disable')
                                        Disable
                                    @elseif($dt->monitoringsystem->value == 1)
                                        Disconnect
                                    @else
                                        Connect
                                    @endif
                                </td>
                            </tr>
                        @endforeach
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

        function get_rect(id) {
            console.log('get data rectifier ' + id);
            console.log('change value rectifier_id:' + id);
            $('#rectifier_id').val(id);
            console.log('rectifier_id value=' + $('#rectifier_id').val());

        }

        $('.rect').click(function () {
//            $('.rect').removeClass('active').addClass('btn-darker-1');
//            $(this).addClass('active').removeClass('btn-darker-1');
            $('.rect').removeClass('active');
            $(this).addClass('active');
        });


        setTimeout(function refreshTable() {
            console.log('Get Request Ajax Rectifier:' + $('#rectifier_id').val());
//            setTimeout(refreshTable, 1000);

            $.ajax({
                url:"{{ url('show-monitoring') }}/"+$('#rectifier_id').val(),
                dataType:'html',

                success:function(data) {
                    $('#data').find('div').empty().append(data);
                    setTimeout(refreshTable,1000);
                }
            });
        }, 1000);
    </script>
@endsection

