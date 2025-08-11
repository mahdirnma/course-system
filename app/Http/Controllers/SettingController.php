<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function eventSetting(Event $event)
    {
        return view('admin.events.settings.index',compact('event'));
    }

    public function courseSetting(Course $course)
    {
        return view('admin.courses.settings.index',compact('course'));
    }
}
