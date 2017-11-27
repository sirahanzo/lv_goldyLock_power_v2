<?php

namespace App\Http\Controllers;

use App\Http\Models\ParameterAlarm;
use App\Http\Models\ParameterMonitoring;
use App\Http\Traits\GpTrait;
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


    //todo:create function for remote shutdown
    public function shutdown(Request $request)
    {
        //Execute command shutdown
        $rect = $request->get('rectifier');
        $value = $request->get('value');
        $parameter_id = 105;

        shell_exec(" cmd $rect $parameter_id $value");
    }


    /**
     * @param $monitoring
     * @return mixed
     */
    protected function getData()
    {
        $monitoring['rectifier'] = ParameterMonitoring::with('monitoringrectifier')->whereIn('id', [101, 102, 104, 105])->get();
        $monitoring['alarm'] = ParameterAlarm::with('alarmrectifier')->whereBetween('id', [501,510])->get();

        return $monitoring;
    }


}
