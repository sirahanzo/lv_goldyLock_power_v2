<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrentPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_page', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name',255);
            $table->smallInteger('page');
            $table->smallInteger('setting_id');
            $table->double('value')->nullable();
            $table->char('relay_state',50)->nullable();
            $table->smallInteger('relay_type')->nullable();
            $table->timestamp('set_dtime')->nullable();
            //$table->char('set_date',50);
            //$table->char('set_date',50);
            $table->smallInteger('flags');
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
        Schema::dropIfExists('current_page');
    }
}
