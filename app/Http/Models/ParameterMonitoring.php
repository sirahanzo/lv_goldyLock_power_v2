<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ParameterMonitoring extends Model
{
    //
    protected  $table = 'parameter_monitoring';


    public function monitoringRectifier()
    {
        return $this->hasOne(MonitoringRectifier::class,'parameter_id','id');
    }

    public function monitoringSystem()
    {
        return $this->hasOne(MonitoringSystem::class,'parameter_id','id');
    }
}
