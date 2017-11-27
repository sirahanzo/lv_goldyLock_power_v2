<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class MonitoringSystem extends Model
{
    protected $table = 'monitoring_data_system';


    public function parameterMonitoring()
    {
        return $this->belongsTo(ParameterMonitoring::class,'parameter_id','id');
    }


    public function relaySetting()
    {
        return $this->belongsTo(RelaySetting::class,'parameter_id','id');
    }
}
