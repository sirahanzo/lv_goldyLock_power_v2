<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class AlarmSystem extends Model {


    protected $table = 'monitoring_alarm_system';


    public function parameterAlarm()
    {
        return $this->belongsTo(ParameterAlarm::class, 'parameter_id', 'id');
    }
}
