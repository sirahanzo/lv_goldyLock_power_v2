<?php

namespace App\Http\Controllers;

use App\Http\Models\LogAlarm;
use App\Http\Models\MonitoringRectifier;
use App\Http\Models\MonitoringSystem;
use App\Http\Traits\GpTrait;
use Carbon\Carbon;
use DB;
use Route;

class DashboardController extends Controller {


    use GpTrait;


    public function index()
    {
        $this->InitMonitoringPage(Route::currentRouteName());

        return view('gp.dashboard');
    }


    public function show()
    {
        $data['ac_phase'] = MonitoringSystem::whereBetween('parameter_id', [208, 210])->get();
        $data['load_batt'] = MonitoringSystem::whereBetween('parameter_id', [201, 204])->get();
        $data['batt_cycle'] = MonitoringSystem::where('parameter_id', 211)->first();
        $data['itotal'] = DB::table('monitoring_data_rectifier')
            ->select([DB::raw('rect_1 + rect_2 + rect_3 + rect_4 + rect_5 + rect_6 + rect_7 + rect_8 + rect_9 + rect_10 + rect_11 + rect_12 + rect_13 + rect_14 + rect_15 + rect_16 as value')])
            ->where('parameter_id', 102)
            ->first();

        $data['vrect'] = MonitoringRectifier::where('parameter_id', 101)->first();
        $data['number_rect'] = MonitoringSystem::where('parameter_id', 206)->first();
        return view('gp._ajax_dashboard', $data);
    }


    public function pushAlarm()
    {
        $from = Carbon::now()->subSecond(5);
        $to = Carbon::now()->toDateTimeString();
        $content = DB::table('log_alarm')
            ->where('updated_at', '>=', $from)
            ->where('updated_at', '<=', $from)
            ->where('value', '=', 1)
            ->take(1)->get();

        return response()->json($content);
    }


    public function pushBell()
    {
        return view('gp._ajax_sumof_alarm')
            ->with('happening_alarm', LogAlarm::latest('updated_at')->happening()->get())
            ->with('today', getdate());
    }


}
