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
        $from = $request->get('from');
        $to = $request->get('to');

        $limit = 1000;

        if ($request->get('from') == "" || $request->get('to') == "") {
            $from = Carbon::now()->subHour(1);
            $to = Carbon::now()->toDateTimeString();
            //$limit = 300;
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
        $datalog = $this->getLogMonitoringData($from, $to, $limit)
            ->orderBy('updated_at', 'desc')
            ->get();

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
                $az = 12;
                $no = 1;
                foreach ($datalog as $log):
                    $cell = $az++;
                    $sheet->cell('A' . $cell, $no++)
                        ->cell('B' . $cell, $log->updated_at)
                        ->cell('C' . $cell, ($log->ac_volt_r == 0) ? '-0' : $log->ac_volt_r)
                        ->cell('D' . $cell, ($log->ac_volt_s == 0) ? '-0' : $log->ac_volt_s)
                        ->cell('E' . $cell, ($log->ac_volt_t == 0) ? '-0' : $log->ac_volt_t)
                        ->cell('F' . $cell, ($log->bus_volt == 0) ? '-0' : $log->bus_volt)
                        ->cell('G' . $cell, ($log->batt_temp == 0) ? '-0' : $log->batt_temp)
                        ->cell('H' . $cell, ($log->i_batt == 0) ? '-0' : $log->i_batt)
                        ->cell('I' . $cell, ($log->i_load == 0) ? '-0' : $log->i_load)
                        ->cell('J' . $cell, ($log->irect_total == 0) ? '-0' : $log->irect_total);
                endforeach;

            });
        })->setFilename($fileLogName)->store('xlsx', 'exports');

        //shell_exec('sudo ln -s /LOGS/LOG_MONITORING/ /var/www/sinelith/public/exports/');
        //shell_exec('sudo ln -s /LOGS/LOG_ALARM/ /var/www/sinelith/public/exports/');
    }


}
