<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class AlarmRectifier extends Model
{
    protected $table = 'monitoring_alarm_rectifier';


    public function parameterAlarm()
    {
        return $this->belongsTo(ParameterAlarm::class,'parameter_id','id');
    }
}
