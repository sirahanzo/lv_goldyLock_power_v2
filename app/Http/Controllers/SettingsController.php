<?php

namespace App\Http\Controllers;

use App\Http\Models\ControllSetting;
use App\Http\Models\LogAlarm;
use App\Http\Models\ParameterAlarm;
use App\Http\Models\RelaySetting;
use App\Http\Models\RelayType;
use App\Http\Requests\LogRequest;
use App\Http\Requests\NetworkRequest;
use App\Http\Requests\SiteInformationRequest;
use App\Http\Requests\SNMPRequest;
use App\Http\Traits\GpTrait;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Route;
use Validator;

class SettingsController extends Controller {


    use GpTrait;


    public function __construct()
    {
        $this->middleware('userbasic')->except('rebootSystem', 'reboot');

        $this->InitSettingPage(Route::currentRouteName());
    }


    public function dateTime()
    {
        return view('gp.datetime');
    }


    public function saveDateTime(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 422);
        }

        //do set time to RaspberryPi
        $this->flagsSettingDtime($request);
        $this->setRaspberryTime($request);

        return response('OK', 200);

    }


    public function siteInfo()
    {
        $data['site'] = DB::table('site_info')->first();

        return view('gp.site_information', $data);
    }


    public function saveSiteInfo(SiteInformationRequest $request)
    {
        DB::table('site_info')->update($request->except('_token'));
    }


    public function network()
    {
        $data['network'] = DB::table('network')->first();

        return view('gp.network', $data);
    }


    public function saveNetwork(NetworkRequest $request)
    {
        $this->saveNetworkTable($request);

        $this->setRaspberryIPaddress($request);
    }


    public function saveSNMP(SNMPRequest $request)
    {
        DB::table('network')->update($request->except('_token'));
    }


    public function controll()
    {
        $data['ctrl_setting'] = ControllSetting::all();
        $data['relay'] = RelaySetting::with('relaytype')->get();
        $data['type'] = RelayType::all();

        return view('gp.controll', $data);
    }


    public function readSetting()
    {
        //todo:create shell_exec to exeute read seeting
        return response('OK', 200);
    }


    public function saveAC()
    {
        //DB::table('current_page')->update('id',['setting_id'=> Input::get('id')['401'],'value' => $value]);

        foreach (Input::get('id') as $id => $value):
            ControllSetting::where('id', $id)->update($value);
            $this->flagsSettingControll($id);
        endforeach;
    }


    public function saveRectfier()
    {
        foreach (Input::get('id') as $id => $value):
            ControllSetting::where('id', $id)->update($value);
            $this->flagsSettingControll($id);
        endforeach;
    }


    public function saveRelay()
    {
        foreach (Input::get('id') as $id => $value):
            RelaySetting::where('id', $id)->update($value);
            $this->flagsSettingRelay($id);
        endforeach;
    }


    public function saveLog(LogRequest $request)
    {
        //dd($request->get('id')[447]['value']);//max number of datalog
        //dd($request->get('id')[448]['value']);//interval
        //dd($request->get('id')[449]['value']);//max number of eventlog

        foreach ($request->get('id') as $id => $value):
            ControllSetting::where('id', $id)->update($value);
        endforeach;

        $interval = $request->get('id')[448]['value'];
        DB::unprepared('ALTER EVENT event_log_data_monitoring ON SCHEDULE EVERY ' . $interval . ' MINUTE STARTS CURRENT_TIMESTAMP');

        return response('SAVED', 200);

    }


    public function alarm()
    {
        $data['param_alarm'] = ParameterAlarm::whereBetween('id', [601, 622])->get();

        return view('gp.alarm', $data);
    }


    public function saveAlarm()
    {
        foreach (Input::get('id') as $id => $value):
            ParameterAlarm::where('id', $id)->update($value);
        endforeach;
    }


    public function saveNetworkTable($request)
    {
        return DB::table('network')->update($request->except('_token'));
    }


    public function rebootSystem()
    {
        return view('gp.reboot_system');
    }


    public function reboot()
    {
        shell_exec('sudo reboot');
    }



}
