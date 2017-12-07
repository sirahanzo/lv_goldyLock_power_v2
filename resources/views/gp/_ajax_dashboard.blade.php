<div class="col-lg-12">
    <div class="col-md-8">
        <div class="photos">
            <div class="col-sm-2">
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="2">AC PHASE</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>R</td>
                        <td>{{ round($ac_phase[0]->value,1) }} V</td>
                    </tr>
                    <tr>
                        <td>S</td>
                        <td>{{ round($ac_phase[1]->value,1) }} V</td>
                    </tr>
                    <tr>
                        <td>T</td>
                        <td>{{ round($ac_phase[2]->value,1) }} V</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3 col-md-offset-4">
                <table class=" table " id="rectifier">

                    <tr>
                        <td>Rectifier Voltage</td>
                        @if($vrect->rect_1 != 0)
                            <td>{{round( $vrect->rect_1,1) }} V</td>
                        @elseif($vrect->rect_2 != 0)
                            <td>{{ round($vrect->rect_2,1) }} V</td>
                        @elseif($vrect->rect_3 != 0)
                            <td>{{ round($vrect->rect_3,1) }} V</td>
                        @elseif($vrect->rect_4 != 0)
                            <td>{{ round($vrect->rect_4,1) }} V</td>
                        @elseif($vrect->rect_5 != 0)
                            <td>{{ round($vrect->rect_5,1) }} V</td>
                        @elseif($vrect->rect_6 != 0)
                            <td>{{ round($vrect->rect_6,1) }} V</td>
                        @elseif($vrect->rect_7 != 0)
                            <td>{{ round($vrect->rect_7,1) }} V</td>
                        @elseif($vrect->rect_8 != 0)
                            <td>{{ round($vrect->rect_8,1) }} V</td>
                        @elseif($vrect->rect_9 != 0)
                            <td>{{ round($vrect->rect_9,1) }} V</td>
                        @elseif($vrect->rect_10 != 0)
                            <td>{{ round($vrect->rect_10,1) }} V</td>
                        @elseif($vrect->rect_11 != 0)
                            <td>{{ round($vrect->rect_11,1) }} V</td>
                        @elseif($vrect->rect_12 != 0)
                            <td>{{ round($vrect->rect_12,1) }} V</td>
                        @elseif($vrect->rect_13 != 0)
                            <td>{{ round($vrect->rect_13,1) }} V</td>
                        @elseif($vrect->rect_14 != 0)
                            <td>{{ round($vrect->rect_14,1) }} V</td>
                        @elseif($vrect->rect_15 != 0)
                            <td>{{ round($vrect->rect_15,1) }} V</td>
                        @else
                            <td>{{ round($vrect->rect_16,1) }} V</td>
                        @endif


                    </tr>

                    <tr>
                        <td>Rectifier Current</td>
                        <td>{{ round($itotal->value,1) }} A</td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-sm-3 col-md-offset-8" id="load">
                <table class=" table ">
                    {{--<thead>--}}
                    {{--<tr>--}}
                    {{--<th colspan="2">LOAD</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    <tbody>
                    <tr>
                        <td>Bus Voltage</td>
                        <td>{{ round($load_batt[0]->value,1) }} V</td>
                    </tr>
                    <tr>
                        <td>Load Current</td>
                        <td>{{ round($load_batt[2]->value,1) }} A</td>
                    </tr>
                    <tr>

                    </tbody>
                </table>
            </div>
            <div class="col-sm-3 col-md-offset-2" id="battery">
                <table class=" table ">
                    <thead>
                    <tr>
                        <th colspan="2">BATTERY</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> Batt. Current</td>
                        <td>{{ round($load_batt[1]->value,1) }} A</td>
                    </tr>
                    <tr>
                        <td>Batt. Temp.</td>
                        <td>{{ round($load_batt[3]->value,1) }} &deg;C</td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="row">
            <!-- begin col-12 -->
            <div class="col-md-12 col-sm-6">
                <div class="widget widget-stats green-bg">
                    <div class="stats-icon stats-icon-lg"><i class="fa fa-building fa-fw"></i></div>
                    <div class="stats-title">NUMBERS OF RECTIFIERS</div>
                    <div class="stats-number">{{ $number_rect->value }}</div>
                    <div class="stats-progress progress">
                        <div style="width: 70.1%;" class="progress-bar"></div>
                    </div>
                    <div class="stats-desc"> RECTIFIER MODULE {{ $number_rect->value*3 }}  </div>
                </div>
            </div>
            <!-- end col-12 -->
            <!-- begin col-12 -->
            {{--<div class="col-md-12 col-sm-6 top15 ">--}}
                {{--<div class="widget widget-stats blue-bg">--}}
                    {{--<div class="stats-icon stats-icon-lg"><i class="fa fa-calendar-o fa-fw"></i></div>--}}
                    {{--<div class="stats-title">CHARGE/DISCHARGE CYCLE</div>--}}
                    {{--<div class="stats-number">{{ $batt_cycle->value }}</div>--}}
                    {{--<div class="stats-progress progress">--}}
                        {{--<div style="width: 40.5%;" class="progress-bar"></div>--}}
                    {{--</div>--}}
                    {{--<div class="stats-desc">BATTERY</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- end col-12 -->
            <!-- begin col-12 -->
            {{--<div class="col-md-12 col-sm-6 top15 ">--}}
                {{--<div class="widget widget-stats purple-bg">--}}
                    {{--<div class="stats-icon stats-icon-lg"><i class="fa fa-server fa-fw"></i></div>--}}
                    {{--<div class="stats-title">CHARGE/DISCHARGE CYCLE</div>--}}
                    {{--<div class="stats-number">0</div>--}}
                    {{--<div class="stats-progress progress">--}}
                        {{--<div style="width: 40.5%;" class="progress-bar"></div>--}}
                    {{--</div>--}}
                    {{--<div class="stats-desc">BATTERY</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- end col-12 -->
        </div>
    </div>

</div>