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
            <?php $rect = 'rect_' . $rect_id ?>
            @for($i=0;$i<3;$i++)
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading " id="monitoring"> Rectifier Module {{ $i+1 }}</div>
                        <div class="panel-body1">
                            <table class="table table-hover table-condensed">
                                <tbody>
                                <tr>
                                    <td>Volt</td>
                                    <td class="text-right">{{ round($rectifier[0]->monitoringrectifier->$rect,1) ." " .$rectifier[0]->unit}}</td>
                                </tr>
                                <tr>
                                    <td>Curr.</td>
                                    <td class="text-right">{{ round(($rectifier[1]->monitoringrectifier->$rect)/3,1) ." " .$rectifier[1]->unit}}</td>
                                </tr>
                                <tr>
                                    <td>Temp.</td>
                                    <td class="text-right">{{ round($rectifier[2]->monitoringrectifier->$rect,1) ." " .$rectifier[2]->unit}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endfor
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading" id="monitoring"> Rectifier System</div>
                    <div class="panel-body1">
                        <table class="table table-hover table-condensed table-bordered1">
                            <tbody>
                            @for($i=0,$x=6;$i<6;[$i++,$x++])
                                <tr>
                                    <td>
                                        @if(isset($system[$i]))
                                            {{ $system[$i]->name }}
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        @if(isset($system[$i]))
                                            {{ round($system[$i]->monitoringsystem->value ,1). " ".$system[$i]->unit }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($system[$x]))
                                            {{ $system[$x]->name }}
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        @if(isset($system[$x]))
                                            {{ round($system[$x]->monitoringsystem->value ,1). " ".$system[$x]->unit }}
                                        @endif
                                    </td>
                                </tr>
                            @endfor

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
                            @for($i=0,$x=4,$y=8;$i<4;[$i++,$x++,$y++])
                                <tr>
                                    <td>
                                        @if(isset($relay[$i]))
                                            {{ $relay[$i]->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($relay[$i]))
                                            @if($relay[$i]->state == 'disable')
                                                <i class="fa fa-times"></i>Disable
                                            @elseif($relay[$i]->monitoringsystem->value == 1)
                                                <b class="text-danger">Disconnect</b>
                                            @else
                                                Connect
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($relay[$x]))
                                            {{ $relay[$x]->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($relay[$x]))
                                            @if($relay[$x]->state == 'disable')
                                                <i class="fa fa-times"></i>Disable
                                            @elseif($relay[$x]->monitoringsystem->value == 1)
                                                <b class="text-danger">Disconnect</b>
                                            @else
                                                Connect
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($relay[$y]))
                                            {{ $relay[$y]->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($relay[$y]))
                                            @if($relay[$y]->state == 'disable')
                                                Disable
                                            @elseif($relay[$y]->monitoringsystem->value == 1)
                                                <b class="text-danger">Disconnect</b>
                                            @else
                                                Connect
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endfor

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default ">
                <div class="panel-heading" id="alarm"> Rectifier Alarm</div>
                <div class="panel-body1">
                    <table class="table table-hover table-condensed">
                        <tbody>
                        @for($i=0,$x=4,$y=8;$i<4;[$i++,$x++,$y++])
                            <tr class="">
                                <td>
                                    @if(isset($rect_alarm[$i]))
                                        {{$rect_alarm[$i]->name }}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($rect_alarm[$i]))
                                        @if($rect_alarm[$i]->alarmrectifier->$rect == 0 )
                                            Nrml
                                        @else
                                            <b class="text-danger">Alarm</b>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if(isset($rect_alarm[$x]))
                                        {{$rect_alarm[$x]->name }}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($rect_alarm[$x]))
                                        @if($rect_alarm[$x]->alarmrectifier->$rect == 0 )
                                            Nrml
                                        @else
                                            <b class="text-danger">Alarm</b>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if(isset($rect_alarm[$y]))
                                        {{$rect_alarm[$y]->name }}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($rect_alarm[$y]))
                                        @if($rect_alarm[$y]->alarmrectifier->$rect == 0 )
                                            Nrml
                                        @else
                                            <b class="text-danger">Alarm</b>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endfor

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" id="alarm"> Alarm</div>
                <div class="panel-body1">
                    <table class="table table-hover table-condensed">
                        <tbody>
                        @for($i=0,$x=11;$i<11;[$i++,$x++])
                            <tr class="">
                                <td>
                                    @if(isset($sys_alarm[$i]))
                                        {{$sys_alarm[$i]->name }}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($sys_alarm[$i]))
                                        @if($sys_alarm[$i]->alarmsystem->value == 0 )
                                            Nrml
                                        @else
                                            <b class="text-danger">Alarm</b>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if(isset($sys_alarm[$x]))
                                        {{$sys_alarm[$x]->name }}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($sys_alarm[$x]))
                                        @if($sys_alarm[$x]->alarmsystem->value == 0 )
                                            Nrml
                                        @else
                                            <b class="text-danger">Alarm</b>
                                        @endif
                                    @endif
                                </td>

                            </tr>
                        @endfor
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
