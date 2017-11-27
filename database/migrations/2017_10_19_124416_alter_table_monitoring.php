<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMonitoring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('ALTER TABLE monitoring_alarm_rectifier CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON  UPDATE CURRENT_TIMESTAMP ');
        DB::unprepared('ALTER TABLE monitoring_data_rectifier CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON  UPDATE CURRENT_TIMESTAMP ');
        DB::unprepared('ALTER TABLE monitoring_alarm_system CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON  UPDATE CURRENT_TIMESTAMP ');
        DB::unprepared('ALTER TABLE monitoring_data_system CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON  UPDATE CURRENT_TIMESTAMP ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('alter_tale');
    }
}
