<?php

namespace App\Http\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LogAlarm extends Model {


    protected $table = 'log_alarm';

    protected $fillable = ['parameter_id', 'rectifier', 'value'];

    protected $dates = ['updated_at'];


    public function parameterAlarm()
    {
        return $this->belongsTo(ParameterAlarm::class, 'parameter_id', 'id');
    }


    public function scopeHappening($query)
    {
        $query
            ->where('updated_at', '>=', Carbon::now()->subHour(1))
            ->where('updated_at', '<=', Carbon::now())
            ->take(20);
    }


    public function setUpdatedAtAttributes($date)
    {
        $this->attributes['updated_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }
}
