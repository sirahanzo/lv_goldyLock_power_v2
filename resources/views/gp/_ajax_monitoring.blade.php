    <div class="col-md-6">

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
                        @for($i=0,$x=3,$y=6;$i<3;[$i++,$x++,$y++])
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
                                       Normal
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
                                       Normal
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