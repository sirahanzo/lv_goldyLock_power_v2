<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersSeeder::class);
        $this->call(AlarmCodeSeeder::class);
        $this->call(ControllSettingCodeSeeder::class);
        $this->call(CurrentPageSeeder::class);
        $this->call(MonitoringAlarmRectifierSeeder::class);
        $this->call(MonitoringAlarmSystemSeeder::class);
        $this->call(MonitoringDataRectifierSeeder::class);
        $this->call(MonitoringDataSystemSeeder::class);
        $this->call(NetworkSeeder::class);
        $this->call(ParameterAlarmSeeder::class);
        $this->call(ParameterMonitoringSeeder::class);
        $this->call(RellaySettingSeeder::class);
        $this->call(RellayTypeSeeder::class);
        $this->call(SiteInfoSeeder::class);
    }
}
