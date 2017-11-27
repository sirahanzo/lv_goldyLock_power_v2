<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitoringAlarmRectifierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_alarm_rectifier', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parameter_id');
            $table->double('rect_1');
            $table->double('rect_2');
            $table->double('rect_3');
            $table->double('rect_4');
            $table->double('rect_5');
            $table->double('rect_6');
            $table->double('rect_7');
            $table->double('rect_8');
            $table->double('rect_9');
            $table->double('rect_10');
            $table->double('rect_11');
            $table->double('rect_12');
            $table->double('rect_13');
            $table->double('rect_14');
            $table->double('rect_15');
            $table->double('rect_16');
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
        Schema::dropIfExists('monitoring_alarm_rectifier');
    }
}
