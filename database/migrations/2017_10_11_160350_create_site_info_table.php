<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_info', function (Blueprint $table) {
            $table->increments('id');
            $table->char('site_id',50);
            $table->char('site_name',50);
            $table->text('address');
            $table->char('sn',50);
            $table->char('pn',50);
            $table->char('model',50);
            $table->char('hardware',50);
            $table->char('software',50);
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
        Schema::dropIfExists('site_info');
    }
}
