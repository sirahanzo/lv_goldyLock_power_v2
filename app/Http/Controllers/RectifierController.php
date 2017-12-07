<?php

namespace App\Http\Controllers;

use App\Http\Models\ParameterAlarm;
use App\Http\Models\ParameterMonitoring;
use App\Http\Traits\GpTrait;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Route;

class RectifierController extends Controller {


    use GpTrait;


    public function index()
    {
        $this->InitMonitoringPage(Route::currentRouteName());

        $data = $this->getData();

        return view('gp.rectifier', $data);
    }


    public function show()
    {
        $data = $this->getData();

        return view('gp._ajax_rectifier', $data);
    }


    public function shutdown(Request $request)
    {
        //Execute command shutdown
        $data = [
            'setting_id' => 105,
            'value'      => $request->get('rectifier'),
            'relay_state' => null,
            'relay_type' => null,
            'set_dtime' => null,
            'flags'      => 1,
            'updated_at' => Carbon::now()
        ];


        DB::table('current_page')->update($data);

        return response('Ok', 200);
    }


    /**
     * @param $monitoring
     * @return mixed
     */
    protected function getData()
    {
        $monitoring['rectifier'] = ParameterMonitoring::with('monitoringrectifier')->whereIn('id', [101, 102, 104, 105])->get();
        $monitoring['alarm'] = ParameterAlarm::with('alarmrectifier')->whereBetween('id', [501, 510])->get();

        return $monitoring;
    }



}
