<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventLogMonitoring extends Migration {


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //DB::unprepared('
        //CREATE EVENT `event_log_data_monitoring` ON SCHEDULE  EVERY 5 MINUTE  STARTS  CURRENT_TIMESTAMP
        //   DO BEGIN
        //   INSERT INTO log_monitoring (ac_volt, bus_volt, batt_temp, i_load, i_batt, irect_1, irect_2, irect_3, irect_4, irect_5, irect_6, irect_7, irect_8, irect_9, irect_10, irect_11, irect_12, irect_13, irect_14, irect_15, irect_16, updated_at) VALUES ((SELECT `value` FROM  monitoring_data_system WHERE parameter_id =208),(SELECT `value` FROM  monitoring_data_system WHERE parameter_id =201),(SELECT `value` FROM  monitoring_data_system WHERE parameter_id =204),(SELECT `value` FROM  monitoring_data_system WHERE parameter_id =203),(SELECT `value` FROM  monitoring_data_system WHERE parameter_id =202),(SELECT `rect_1` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_2` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_3` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_4` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_5` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_6` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_7` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_8` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_9` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_10` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_11` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_12` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_13` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_14` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_15` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT `rect_16` FROM monitoring_data_rectifier WHERE  parameter_id = 102),(SELECT NOW()));
        //
        // END;
        // ');

        DB::unprepared('
        CREATE EVENT `event_log_data_monitoring` ON SCHEDULE  EVERY 5 MINUTE  STARTS  CURRENT_TIMESTAMP
          DO BEGIN
          INSERT INTO log_monitoring (ac_volt_r,ac_volt_s,ac_volt_t, bus_volt, batt_temp, i_load, i_batt, irect_total, updated_at)
		  VALUES 
		  ((SELECT `value` FROM  monitoring_data_system WHERE parameter_id =208),
		  (SELECT `value` FROM  monitoring_data_system WHERE parameter_id =209),
		  (SELECT `value` FROM  monitoring_data_system WHERE parameter_id =210),
		  (SELECT `value` FROM  monitoring_data_system WHERE parameter_id =201),
		  (SELECT `value` FROM  monitoring_data_system WHERE parameter_id =204),
		  (SELECT `value` FROM  monitoring_data_system WHERE parameter_id =203),
		  (SELECT `value` FROM  monitoring_data_system WHERE parameter_id =202),
		  (SELECT (`rect_1`+`rect_2`+`rect_3`+`rect_4`+`rect_5`+`rect_6`+`rect_7`+`rect_8`+`rect_9`+`rect_10`+`rect_11`+`rect_12`+`rect_13`+`rect_14`+`rect_15`+`rect_16`) FROM monitoring_data_rectifier WHERE parameter_id = 102),
		  (SELECT NOW()));
        
        END;
        ');

        DB::unprepared('
           CREATE EVENT `clear_log_data` ON SCHEDULE EVERY 1 MONTH  STARTS CURRENT_TIMESTAMP
              DO BEGIN
              DELETE FROM log_alarm where updated_at < DATE_SUB(NOW() , INTERVAL 7 MONTH  );
              DELETE FROM log_monitoring where updated_at < DATE_SUB(NOW() , INTERVAL 7 MONTH  );
            
            END;
               
       ');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('event_log_monitoring');
        DB::unprepared('DROP EVENT event_log_data_monitoring');
        DB::unprepared('DROP EVENT clear_log_data;');
    }
}
