<?php

namespace App\Http\Controllers;

use App\Http\Traits\GpTrait;
use Carbon\Carbon;
use Datatables;
use DB;
use File;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Route;

class DatalogController extends Controller {


    use GpTrait;


    public function index()
    {
        $this->InitMonitoringPage(Route::currentRouteName());

        return view('gp.datalog');
    }


    public function show(Request $request)
    {
        $column = 'value_' . $request->get('pack_id');
        $from = $request->get('from');
        $to = $request->get('to');

        $limit = 1000;

        if ($request->get('from') == "" || $request->get('to') == "") {
            $from = Carbon::now()->subHour(1);
            $to = Carbon::now()->toDateTimeString();
            $limit = 300;
            //call draw datatable function
            return $this->drawDataTable($from, $to, $limit);

        }

        return $this->drawDataTable($from, date('Y-m-d ', strtotime($to . ' +1 day')), $limit);

    }


    public function download(Request $request, Excel $phpexcel)
    {
        $from = $request->get('from');
        $to = $request->get('to');

        $limit = $this->datalogLimit(447);
        $loadTemplate = 'DataLogTemplate.xlsx';
        $fileLogName = 'DataLog_' . $from . '_' . $to;


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


    protected function drawDataTable($from, $to, $limit)
    {
        $datalog = $this->getLogMonitoringData($from, $to, $limit)->orderBy('updated_at', 'desc')->get();

        return Datatables::of($datalog)
            ->make(true);
    }


    /**
     * @param Excel $phpexcel
     * @param $from
     * @param $to
     * @param $limit
     * @param $loadTemplate
     * @param $fileLogName
     */
    public function ExportToExcell(Excel $phpexcel, $from, $to, $limit, $loadTemplate, $fileLogName)
    {
        $datalog = $this->getLogMonitoringData($from, date('Y-m-d ', strtotime($to . ' +1 day')), $limit)->get();

        $phpexcel->load(public_path($loadTemplate), function ($excell) use ($datalog, $from, $to, $limit) {
            $excell->sheet('Sheet1', function ($sheet) use ($datalog, $from, $to, $limit) {

                $info = DB::table('site_info')->first();

                $sheet->cell('C4', $info->site_id);// SITE ID
                $sheet->cell('C5', $info->site_name);// SITE NAME
                $sheet->cell('C6', $info->address);// SITE ADDRESS
                $sheet->cell('C7', $from);// FROM
                $sheet->cell('C8', $to);// TO
                $a = $b = $c = $d = $e = $f = $g = $h = $i = $j = $k = $l = $m = $n = $o = $p = $q = $r = $s = $t = $u = $v = $w = $x = $y = $z = 12;
                $no = 1;
                foreach ($datalog as $log):
                    $sheet->cell('A' . $a++, $no++)
                        ->cell('B' . $b++, $log->updated_at)
                        ->cell('C' . $c++, ($log->ac_volt == 0) ? '-0' : $log->ac_volt)
                        ->cell('D' . $d++, ($log->bus_volt == 0) ? '0' : $log->bus_volt)
                        ->cell('E' . $e++, ($log->batt_temp == 0) ? '-0' : $log->batt_temp)
                        ->cell('F' . $f++, ($log->i_load == 0) ? '-0' : $log->i_load)
                        ->cell('G' . $g++, ($log->i_batt == 0) ? '-0' : $log->i_batt)
                        ->cell('H' . $h++, ($log->irect_1 == 0) ? '-0' : $log->irect_1)
                        ->cell('I' . $i++, ($log->irect_2 == 0) ? '-0' : $log->irect_2)
                        ->cell('J' . $j++, ($log->irect_3 == 0) ? '-0' : $log->irect_3)
                        ->cell('K' . $k++, ($log->irect_4 == 0) ? '-0' : $log->irect_4)
                        ->cell('L' . $l++, ($log->irect_5 == 0) ? '-0' : $log->irect_5)
                        ->cell('M' . $m++, ($log->irect_6 == 0) ? '-0' : $log->irect_6)
                        ->cell('N' . $n++, ($log->irect_7 == 0) ? '-0' : $log->irect_7)
                        ->cell('O' . $o++, ($log->irect_8 == 0) ? '-0' : $log->irect_8)
                        ->cell('P' . $p++, ($log->irect_9 == 0) ? '-0' : $log->irect_9)
                        ->cell('Q' . $q++, ($log->irect_10 == 0) ? '-0' : $log->irect_10)
                        ->cell('R' . $r++, ($log->irect_11 == 0) ? '-0' : $log->irect_11)
                        ->cell('S' . $s++, ($log->irect_12 == 0) ? '-0' : $log->irect_12)
                        ->cell('T' . $t++, ($log->irect_13 == 0) ? '-0' : $log->irect_13)
                        ->cell('U' . $u++, ($log->irect_14 == 0) ? '-0' : $log->irect_14)
                        ->cell('V' . $v++, ($log->irect_15 == 0) ? '-0' : $log->irect_15)
                        ->cell('W' . $w++, ($log->irect_16 == 0) ? '-0' : $log->irect_16)
                        ->cell('X' . $x++, '=SUM(H' . $y++ . ':W' . $z++ . ')');
                endforeach;

            });
        })->setFilename($fileLogName)->store('xlsx', 'exports');

        //shell_exec('sudo ln -s /LOGS/LOG_MONITORING/ /var/www/sinelith/public/exports/');
        //shell_exec('sudo ln -s /LOGS/LOG_ALARM/ /var/www/sinelith/public/exports/');
    }


}
