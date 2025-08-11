<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\Show;
use Illuminate\Http\Client\Request;

class LocationController extends Controller
{
    /**
     * Event Location processes.
     */
    public function eventLocations(Event $event)
    {
        return view('admin.events.locations.index', compact('event'));
    }
    public function eventLocationCreate(Event $event){
        return view('admin.events.locations.create', compact('event'));
    }
    public function eventLocationStore(StoreLocationRequest $request, Event $event){
        $location=$event->locations()->create($request->all());
        if($location){
            return redirect()->route('events.locations',compact('event'));
        }
        return redirect()->route('events.location.create',compact('event'));
    }

    public function eventLocationEdit(Event $event,Location $location)
    {
        return view('admin.events.locations.edit', compact('event','location'));
    }
    public function eventLocationUpdate(UpdateLocationRequest $request, Event $event, Location $location){
        $status=$location->update($request->all());
        if($status){
            return redirect()->route('events.locations',compact('event'));
        }
        return redirect()->route('events.location.edit',compact('event','location'));
    }
    public function eventLocationDestroy(Event $event, Location $location){
        $location->update(['is_active'=>0]);
        return redirect()->route('events.locations',compact('event'));
    }

    /**
     * Course Location processes.
     */
    public function courseLocations(Course $course)
    {
        return view('admin.courses.locations.index', compact('course'));
    }
    public function courseLocationCreate(Course $course){
        return view('admin.courses.locations.create', compact('course'));
    }
    public function courseLocationStore(StoreLocationRequest $request, Course $course){
        $location=$course->locations()->create($request->all());
        if($location){
            return redirect()->route('courses.locations',compact('course'));
        }
        return redirect()->route('courses.location.create',compact('course'));
    }
    public function courseLocationEdit(Course $course,Location $location){
        return view('admin.courses.locations.edit', compact('course','location'));
    }
    public function courseLocationUpdate(UpdateLocationRequest $request, Course $course, Location $location){
        $status=$location->update($request->all());
        if($status){
            return redirect()->route('courses.locations',compact('course'));
        }
        return redirect()->route('courses.location.edit',compact('course','location'));
    }
    public function courseLocationDestroy(Course $course, Location $location){
        $location->update(['is_active'=>0]);
        return redirect()->route('courses.locations',compact('course'));
    }
    /**
     * show Location processes.
     */
    public function showLocations(Show $show)
    {
        return view('admin.shows.locations.index', compact('show'));
    }
}
