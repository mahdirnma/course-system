<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
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
}
