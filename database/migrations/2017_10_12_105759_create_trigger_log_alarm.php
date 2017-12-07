<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerLogAlarm extends Migration {


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `trigger_log_alarm_system`
        AFTER UPDATE ON monitoring_alarm_system
        FOR EACH ROW
            BEGIN

                IF NEW.value <> OLD.value
                THEN
                  INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (new.parameter_id,(SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"System", new.value, new.updated_at);
            
                END IF;

         END;
        ');

        DB::unprepared('
        CREATE TRIGGER `trigger_log_alarm_rectifier`
        AFTER UPDATE ON monitoring_alarm_rectifier
        FOR EACH ROW
          BEGIN
            IF NEW.rect_1 <> OLD.rect_1
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 1", NEW.rect_1, NEW.updated_at);
            END IF;
        
            IF NEW.rect_2 <> OLD.rect_2
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 2", NEW.rect_2, NEW.updated_at);
            END IF;
        
            IF NEW.rect_3 <> OLD.rect_3
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 3", NEW.rect_3, NEW.updated_at);
            END IF;
        
            IF NEW.rect_4 <> OLD.rect_4
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 4", NEW.rect_4, NEW.updated_at);
            END IF;
        
            IF NEW.rect_5 <> OLD.rect_5
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 5", NEW.rect_5, NEW.updated_at);
            END IF;
        
            IF NEW.rect_6 <> OLD.rect_6
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 6", NEW.rect_6, NEW.updated_at);
            END IF;
        
            IF NEW.rect_7 <> OLD.rect_7
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 7", NEW.rect_7, NEW.updated_at);
            END IF;
        
            IF NEW.rect_8 <> OLD.rect_8
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 8", NEW.rect_8, NEW.updated_at);
            END IF;
        
            IF NEW.rect_9 <> OLD.rect_9
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 9", NEW.rect_9, NEW.updated_at);
            END IF;
        
            IF NEW.rect_10 <> OLD.rect_10
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 10", NEW.rect_10, NEW.updated_at);
            END IF;
        
            IF NEW.rect_11 <> OLD.rect_11
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 11", NEW.rect_11, NEW.updated_at);
            END IF;
        
            IF NEW.rect_12 <> OLD.rect_12
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 12", NEW.rect_12, NEW.updated_at);
            END IF;
        
            IF NEW.rect_13 <> OLD.rect_13
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 13", NEW.rect_13, NEW.updated_at);
            END IF;
        
            IF NEW.rect_14 <> OLD.rect_14
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 14", NEW.rect_14, NEW.updated_at);
            END IF;
        
            IF NEW.rect_15 <> OLD.rect_15
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 15", NEW.rect_15, NEW.updated_at);
            END IF;
        
            IF NEW.rect_16 <> OLD.rect_16
            THEN
              INSERT INTO log_alarm (parameter_id,name, rectifier, value, updated_at) VALUES (NEW.parameter_id, (SELECT name FROM `parameter_alarm` WHERE id = NEW.parameter_id),"Rectifier 16", NEW.rect_16, NEW.updated_at);
            END IF;
        
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
        //Schema::dropIfExists('trigger_log_alarm');
        DB::unprepared('DROP TRIGGER `trigger_log_alarm_system`');
        DB::unprepared('DROP TRIGGER `trigger_log_alarm_rectifier`');
    }
}
