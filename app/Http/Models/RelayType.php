<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class RelayType extends Model
{
    protected $table = 'relay_type';


    public function relaySetting()
    {
        return $this->hasMany(RelaySetting::class,'type_id','id');
    }
}
