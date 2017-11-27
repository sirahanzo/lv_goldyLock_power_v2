<?php

namespace App\Http\Controllers;

use App\Http\Models\LogAlarm;
use App\Http\Models\ParameterAlarm;
use App\Http\Traits\GpTrait;
use Carbon\Carbon;
use Datatables;
use DB;
use File;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Route;

class AlarmlogController extends Controller {

    use GpTrait;

    public function index()
    {
        $this->InitMonitoringPage(Route::currentRouteName());

        return view('gp.eventlog');
    }


    public function show(Request $request)
    {
        $column = 'value_' . $request->get('pack_id');
        $from = $request->get('from');
        $to = $request->get('to');

        $limit = 1000;

        if ($request->get('from') == "" || $request->get('to') == "") {
            //$from = Carbon::now()->subHour(1);
            //$to = Carbon::now()->toDateTimeString();
            $limit = 300;

            //call draw datatable function
            $eventlog = LogAlarm::latest('updated_at')->take($limit);

            return $this->drawDataTable($eventlog);

        }

        $eventlog = LogAlarm::latest('updated_at')->take($limit)
            ->where('updated_at', '>=', $from)
            ->where('updated_at', '<=', date('Y-m-d ', strtotime($to . ' +1 day')));

        return $this->drawDataTable($eventlog);
    }


    public function download(Request $request, Excel $phpexcel)
    {

        $from = $request->get('from');
        $to = $request->get('to');

        $limit = $this->datalogLimit(449);
        $loadTemplate = 'EventLogTemplate.xlsx';
        $fileLogName = 'EventLog_' . $from . '_' . $to;


        //clear old file log
        File::cleanDirectory('exports');

        $linkDownload = [
            'success' => true,
            'path'    => 'http://' . $request->server('HTTP_HOST') . '/exports/' . $fileLogName . '.xlsx',
        ];

        //check if form/to request, is empty then generate 1 last hour time
        if (empty($request->get('from')) || empty($request->get('to'))) {
            $from = Carbon::now()->subHour(1);
            $to = Carbon::now()->toDateTimeString();
            $limit = 1000;

            $this->ExportToExcell($phpexcel, $from, $to, $limit, $loadTemplate, $fileLogName);
            return $linkDownload;

        }


        $this->ExportToExcell($phpexcel, $from, $to, $limit, $loadTemplate, $fileLogName);
        return $linkDownload;
    }


    protected function drawDataTable($eventlog)
    {
        return Datatables::of($eventlog)->addColumn('alarm', function ($alarm) {
            if ($alarm->value == 1) {
                return 'Alarm Start';
            } else {
                return 'Alarm Cleared';
            }
        })->make(true);
    }



    protected function ExportToExcell(Excel $phpexcel, $from, $to, $limit, $loadTemplate, $fileLogName)
    {
        $eventlog = LogAlarm::where('updated_at', '>=', $from)
            ->where('updated_at', '<=', date('Y-m-d ', strtotime($to . ' +1 day')))
            ->take($limit)
            ->get();

        $phpexcel->load(public_path($loadTemplate), function ($excell) use ($eventlog, $from, $to, $limit) {
            $excell->sheet('Sheet1', function ($sheet) use ($eventlog, $from, $to, $limit) {

                $info = DB::table('site_info')->first();

                $sheet->cell('C3', $info->site_id);// SITE ID
                $sheet->cell('C4', $info->site_name);// SITE NAME
                $sheet->cell('C5', $info->address);// SITE ADDRESS
                $sheet->cell('C6', $from);// FROM
                $sheet->cell('C7', $to);// TO
                $a = $b = $c = $d = $e = $f = $g = $h = $i = $j = $k = $l = $m = $n = $o = $p = $q = $r = $s = $t = $u = $v = $w = $x = $y = $z = 10;
                $no = 1;
                foreach ($eventlog as $log):
                    $sheet->cell('A' . $a++, $no++)
                        ->cell('C' . $c++, $log->updated_at)
                        ->cell('D' . $d++, $log->name)
                        ->cell('E' . $e++, $log->rectifier)
                        ->cell('F' . $f++, ($log->event == 1)?'Alarm Start':'Alarm Clear')
                        ;
                endforeach;

            });
        })->setFilename($fileLogName)->store('xlsx', 'exports');

    }
}
