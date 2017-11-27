<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network', function (Blueprint $table) {
            $table->increments('id');
            $table->char('ipaddress',15);
            $table->char('netmask',15);
            $table->char('gateway',15);
            $table->char('snmp_trap',15);
            $table->char('snmp_version',25);
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
        Schema::dropIfExists('network');
    }
}
