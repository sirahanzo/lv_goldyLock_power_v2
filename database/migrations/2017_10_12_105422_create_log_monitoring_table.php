<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogMonitoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_monitoring', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('ac_volt');
            $table->double('bus_volt');
            $table->double('batt_temp');
            $table->double('i_load');
            $table->double('i_batt');
            $table->double('irect_1');
            $table->double('irect_2');
            $table->double('irect_3');
            $table->double('irect_4');
            $table->double('irect_5');
            $table->double('irect_6');
            $table->double('irect_7');
            $table->double('irect_8');
            $table->double('irect_9');
            $table->double('irect_10');
            $table->double('irect_11');
            $table->double('irect_12');
            $table->double('irect_13');
            $table->double('irect_14');
            $table->double('irect_15');
            $table->double('irect_16');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_monitoring');
    }
}
