<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=[
        'date',
        'manager',
        'level',
        'capacity',
        'is_active',
    ];

    public function settingable()
    {
        return $this->morphTo();
    }

}
