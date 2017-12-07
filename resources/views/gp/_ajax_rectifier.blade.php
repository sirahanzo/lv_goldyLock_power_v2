<table class="table table-bordered table-hover table-condensed " id="table_rect">
    <thead>
    <tr class="bg-primary1">
        <th></th>
        <th></th>

        <th class="text-center bg-primary" colspan="3" data-toggle="tooltip" title="Module Rectifier Current"> Curr. Module (A)</th>
        <th></th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Module Fail Alarm">Module</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Communication Lost Alarm">Comm.</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Protection Fail Alarm">Protect</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="StartUp/ShutDown Alarm">StartUp/</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Hibernate Alarm">Hiber</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Current Limit Alarm">Curr</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Rectifier Fail Alarm">Rect.</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="AC Fail Alarm">AC</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Fan Fail Alarm">Fan</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="High Temperature Alarm">Hi</th>
        <th class="text-center" id="rect_no" data-toggle="tooltip" title="Remote ShutDown/StartUp Rectifier ">Remote</th>
    </tr>
    <tr class="bg-primary1">
        <th id="rect_no" data-toggle="tooltip" title="Rectifier Number"> Rect. #</th>
        <th class="text-center bg-primary" data-toggle="tooltip" title="Rectifier Voltage"> Volt (V)</th>
        <th class="text-center bg-primary" data-toggle="tooltip" title="Module Rectifer A"> a</th>
        <th class="text-center bg-primary" data-toggle="tooltip" title="Module Rectifer B"> b</th>
        <th class="text-center bg-primary" data-toggle="tooltip" title="Module Rectifer C"> c</th>
        <th class="text-center bg-primary" data-toggle="tooltip" title="Temperature"> T (&deg;C)</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Module Fail Alarm"> Fail</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Communication Lost Alarm"> Lost</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Protection Fail Alarm"> Fail</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="StartUp/ShutDown Alarm"> S.Down</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Hibernate Alarm"> nate</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Current Limit Alarm"> Limit</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Rectifier Fail Alarm"> Fail</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="AC Fail Alarm"> Fail</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="Fan Fail Alarm"> Fail</th>
        <th class="text-center" id="alarm" data-toggle="tooltip" title="High Temperature Alarm"> Temp</th>
        <th class="text-center col-sm-1 " id="rect_no" data-toggle="tooltip" title="Remote ShutDown/StartUp Rectifier ">ShutDown/StartUP</th>

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
                    <b class="text-danger">Alarm</b>
                @else
                  Normal
                @endif
            </td>

            {{--comm lost--}}
            <td class="text-center">
                @if($alarm[1]->alarmrectifier->$rect ==1)
                    <b class="text-danger">Alarm</b>
                @else
                  Normal
                @endif
            </td>

            {{--protect--}}
            <td class="text-center">
                @if($alarm[2]->alarmrectifier->$rect ==1)
                    <b class="text-danger">Alarm</b>
                @else
                  Normal
                @endif
            </td>

            {{--Startup/Shutdown--}}
            <td class="text-center">
                @if($alarm[6]->alarmrectifier->$rect ==1)
                    <b class="text-danger">Alarm</b>
                @else
                  Normal
                @endif
            </td>

            {{--Hibernation--}}
            <td class="text-center">
                @if($alarm[5]->alarmrectifier->$rect ==1)
                    <b class="text-danger">Alarm</b>
                @else
                  Normal
                @endif
            </td>
            {{-- Current Limit--}}
            <td class="text-center">
                @if($alarm[7]->alarmrectifier->$rect ==1)
                    <b class="text-danger">Alarm</b>
                @else
                  Normal
                @endif
            </td>
            {{--Rectifier fail--}}
            <td class="text-center">
                @if($alarm[8]->alarmrectifier->$rect ==1)
                    <b class="text-danger">Alarm</b>
                @else
                  Normal
                @endif
            </td>
            {{--AC fail--}}
            <td class="text-center">
                @if($alarm[3]->alarmrectifier->$rect ==1)
                    <b class="text-danger">Alarm</b>
                @else
                  Normal
                @endif
            </td>
            {{--Fan fail--}}
            <td class="text-center">
                @if($alarm[4]->alarmrectifier->$rect ==1)
                    <b class="text-danger">Alarm</b>
                @else
                  Normal
                @endif
            </td>
            {{--Hi temp--}}
            <td class="text-center">
                @if($alarm[9]->alarmrectifier->$rect ==1)
                    <b class="text-danger">Alarm</b>
                @else
                  Normal
                @endif
            </td>
            <td class="text-center">
                <form action="#" id="shutdown_form{{$i}}">
                    {{ csrf_field() }}
                    <input type="hidden" id="rectifier" name="rectifier" value="{{ $i }}">
                    <input type="hidden" id="value" name="value" value="{{ ($rectifier[3]->monitoringrectifier->$rect == 0)?1:0 }}">
                    @if($rectifier[3]->monitoringrectifier->$rect == 0)
                        <button type="button" class="btn btn-xs btn120  red btn-outline1" onclick="remote({{$i}},'SHUT DOWN')" id="shutdown_btn">OFF</button>
                    @else
                        <button type="button" class="btn btn-xs btn120  green btn-outline1" onclick="remote({{$i}},'START UP')" id="shutdown_btn">ON</button>
                    @endif


                </form>

            </td>
        </tr>
    @endfor

</table>
