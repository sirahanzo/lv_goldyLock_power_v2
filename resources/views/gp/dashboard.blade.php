@extends('layouts.gp')

@section('css')
    <style>
        #schematic {
            margin-bottom: -300px;
            margin-left: 60px;
            margin-top: 60px;
        }

        #rectifier {
            margin-left: -50px;
            /*top: 0px;*/
            margin-top: -85px;
        }

        #load {
            /*margin-left: -100px;*/
            top: -40px;
            /*margin-left: ;*/
        }

        #battery {
            top: -50px;
        }

    </style>
@endsection
@section('content')
    <div class="row">

        <div class="col-md-8">
            <div class="photos">
                <div id="schematic">
                    <img alt="image" class="feed-photo" src="{{ asset('/') }}img/schematic.png" style="max-height: 300px">

                </div>

            </div>
        </div>
        <section id="dashboard">
            <div>
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
                                    <td>0 V</td>
                                </tr>
                                <tr>
                                    <td>S</td>
                                    <td>0 V</td>
                                </tr>
                                <tr>
                                    <td>T</td>
                                    <td>0 V</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-3 col-md-offset-4">
                            <table class=" table " id="rectifier">

                                <tr>
                                    <td>Voltage</td>
                                    <td>0 V</td>
                                </tr>

                                <tr>
                                    <td>Itotal</td>
                                    <td>0 A</td>
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
                                    <td>0 V</td>
                                </tr>
                                <tr>
                                    <td>I Load</td>
                                    <td>0 A</td>
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
                                    <td>I Batt.</td>
                                    <td>0 A</td>
                                </tr>
                                <tr>
                                    <td>Batt. Temp.</td>
                                    <td>0 &deg;C</td>
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
                                <div class="stats-number">0</div>
                                <div class="stats-progress progress">
                                    <div style="width: 70.1%;" class="progress-bar"></div>
                                </div>
                                <div class="stats-desc"> RECTIFIER</div>
                            </div>
                        </div>
                        <!-- end col-12 -->
                        <!-- begin col-12 -->
                        <div class="col-md-12 col-sm-6 top15 ">
                            <div class="widget widget-stats blue-bg">
                                <div class="stats-icon stats-icon-lg"><i class="fa fa-calendar-o fa-fw"></i></div>
                                <div class="stats-title">CHARGE/DISCHARGE CYCLE</div>
                                <div class="stats-number">0</div>
                                <div class="stats-progress progress">
                                    <div style="width: 40.5%;" class="progress-bar"></div>
                                </div>
                                <div class="stats-desc">BATTERY</div>
                            </div>
                        </div>
                        <!-- end col-12 -->
                    </div>
                </div>
            </div>
        </section>


    </div>


@endsection


