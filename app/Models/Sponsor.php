<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable=[
        'name',
        'logo',
        'description',
        'is_active',
    ];

    public function courses()
    {
        return $this->morphedByMany(Course::class, 'sponsorable');
    }

    public function events()
    {
        return $this->morphedByMany(Event::class, 'sponsorable');
    }

    public function shows()
    {
        return $this->morphedByMany(Show::class, 'sponsorable');
    }
}
