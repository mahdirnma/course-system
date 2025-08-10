<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable=[
        'title',
        'path',
        'type',
        'is_active',
    ];
    public function mediaable(){
        return $this->morphTo();
    }

}
