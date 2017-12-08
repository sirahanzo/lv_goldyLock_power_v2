<?php
/**
 * Created by PhpStorm.
 * User: UNIX
 * Date: 10/13/2017
 * Time: 11:17 AM
 */

namespace App\Http\Traits;


use App\Http\Models\ControllSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

trait GpTrait {


    protected function InitPage()
    {
        DB::table('current_page')->update(['page' => 0]);
    }


    protected function InitMonitoringPage($pagename)
    {
        DB::table('current_page')->update(['page' => 1, 'name' => $pagename, 'updated_at' => Carbon::now()]);
    }


    protected function InitSettingPage($pagename)
    {
        DB::table('current_page')->update(['page' => 2, 'name' => $pagename, 'updated_at' => Carbon::now()]);
    }


    protected function datalogLimit($id)
    {
        return DB::table('controll_setting')->where('id', $id)->first()->value;
    }


    /**
     * @param Request $request
     */
    protected function setRaspberryTime($request)
    {
        $time = $request->get('time');
        $new_date = date("d M Y", strtotime($request->get('date')));
        $char = '"';

        shell_exec(" echo > /var/www/change_time.sh ");
        shell_exec(" echo '#!/bin/bash -e' >> /var/www/change_time.sh ");
        shell_exec(" echo 'sudo date -s $char $new_date $time $char ' >> /var/www/change_time.sh ");
        shell_exec(" echo 'sudo hwclock --set --date $char $new_date $time $char ' >> /var/www/change_time.sh ");

        //execute changetime script
        shell_exec("sh /var/www/change_time.sh");
        shell_exec("sudo  hwclock -w");

    }


    public function saveNetworkTable($request)
    {
        return DB::table('network_setting')->update($request->except('_token'));
    }


    protected function getLogMonitoringData($from, $to, $limit)
    {
        return DB::table('log_monitoring')
            ->where('updated_at', '>=', $from)
            ->where('updated_at', '<=', $to)
            ->take($limit);
    }


    /**
     * @param $request
     */
    protected function setRaspberryIPaddress($request)
    {
        $ipaddress = $request->get('ipaddress');
        $netmask = $request->get('netmask');
        $gateway = $request->get('gateway');

        //save variable network setting to interfaces_temp
        shell_exec(" echo > /var/www/uploads/interfaces_temp ");
        shell_exec("echo '' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo 'auto lo' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo 'iface lo inet loopback' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo '' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo '' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo 'auto eth0' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo '#iface eth0 inet dhcp' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo 'iface eth0 inet static' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo 'address $ipaddress' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo 'netmask $netmask' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo 'gateway $gateway' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo '' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo '#allow-hotplug wlan0' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo '#iface wlan0 inet manual' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo '#wpa-roam /etc/wpa_supplicant/wpa_supplicant.conf' >> /var/www/uploads/interfaces_temp ");
        shell_exec("echo '#iface default inet dhcp' >> /var/www/uploads/interfaces_temp ");
        shell_exec("sudo cp /var/www/uploads/interfaces_temp /etc/network/interfaces ");
    }


    /**
     * @param $id
     */
    public function flagsSettingControll($id)
    {
        DB::table('current_page')->update(
            [
                'setting_id'  => $id,
                'value'       => Input::get('id')[$id]['value'],
                'relay_state' => null,
                'relay_type'  => null,
                'set_dtime'   => null,
                'flags'       => '1',
            ]
        );
    }

    /**
     * @param $id
     */
    public function flagsSettingRelay($id)
    {
        DB::table('current_page')->update(
            [
                'setting_id'  => $id,
                'value'       => null,
                'relay_state' => Input::get('id')[$id]['state'],
                'relay_type'  => Input::get('id')[$id]['type_id'],
                'set_dtime'   => null,
                'flags'       => '1',
            ]
        );
    }


    /**
     * @param $id
     */
    public function flagsSettingDtime($request)
    {
        DB::table('current_page')->update(
            [
                'setting_id'  => '450',
                'value'       => null,
                'relay_state' => null,
                'relay_type'  => null,
                'set_dtime'   => $request->get('date') . ' ' . $request->get('time'),
                'flags'       => '1',
            ]
        );
    }


    protected function saveArrayControllSetting()
    {
        foreach (Input::get('id') as $id => $value):
            ControllSetting::where('id', $id)->update($value);
            $this->flagsSettingControll($id);
        endforeach;
    }

}