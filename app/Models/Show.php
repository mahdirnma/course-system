<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable=[
        'name',
        'details',
        'duration_minutes',
        'is_active',
    ];

    public function locations()
    {
        return $this->morphMany(Location::class, 'locationable');
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }
    public function sponsors(){
        return $this->morphToMany(Sponsor::class, 'sponsorable');
    }

    public function setting()
    {
        return $this->morphOne(Setting::class, 'settingable');
    }

}
