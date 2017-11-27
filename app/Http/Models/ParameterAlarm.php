<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ParameterAlarm extends Model {


    protected $table = 'parameter_alarm';

    protected $fillable = ['severity', 'state'];


    public function alarmRectifier()
    {
        return $this->hasOne(AlarmRectifier::class, 'parameter_id', 'id');
    }


    public function alarmSystem()
    {
        return $this->hasOne(AlarmSystem::class, 'parameter_id', 'id');
    }


    public function logAlarm()
    {
        return $this->hasOne(LogAlarm::class,'parameter_id','id');
    }
}

