<?php

namespace App\Http\Controllers;

use App\Http\Models\ParameterAlarm;
use App\Http\Models\ParameterMonitoring;
use App\Http\Models\RelaySetting;
use App\Http\Traits\GpTrait;
use Illuminate\Http\Request;
use Route;

class MonitoringController extends Controller {


    use GpTrait;


    /**
     * View monitoring of rectifier system only
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->InitSettingPage(Route::currentRouteName());

        return view('gp.monitoring');
    }


    public function show()
    {
        $data['system'] = ParameterMonitoring::with('monitoringsystem')->whereIn('id', [201, 202, 203, 204, 205, 207, 208, 209, 210, 211, 212])->get();
        $data['rectifier'] = ParameterMonitoring::with('monitoringrectifier')->whereIn('id', [101, 102, 104, 105, 106])->get();
        $data['rect_alarm'] = ParameterAlarm::with('alarmrectifier')->whereBetween('id', [501, 510])->get();
        $data['sys_alarm'] = ParameterAlarm::with('alarmsystem')->whereBetween('id', [601, 622])->get();
        $data['relay'] = RelaySetting::with('monitoringsystem')->whereBetween('id', [301, 310])->get();

        return view('gp._ajax_monitoring', $data);
    }


}
