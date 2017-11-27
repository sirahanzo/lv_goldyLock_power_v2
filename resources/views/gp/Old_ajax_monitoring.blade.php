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