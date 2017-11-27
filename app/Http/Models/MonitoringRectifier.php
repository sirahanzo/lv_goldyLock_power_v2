<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class MonitoringRectifier extends Model
{
    protected  $table = 'monitoring_data_rectifier';


    public function paremeterMonitoring()
    {
        return $this->belongsTo(MonitoringRectifier::class,'parameter_id','id');
    }

}
