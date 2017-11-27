<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class RelaySetting extends Model
{
    protected $table = 'relay_setting';

    public function relayType()
    {
        return $this->belongsTo(RelayType::class,'type_id','id');
    }


    public function monitoringSystem()
    {
        return $this->hasOne(MonitoringSystem::class,'parameter_id','id');
    }
}
