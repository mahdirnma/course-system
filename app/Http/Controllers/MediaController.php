<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function eventMedia(Event $event)
    {
        return view('admin.events.media.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function eventMediaCreate(Event $event)
    {
        return view('admin.events.media.create', compact('event'));
    }
    public function eventMediaStore(Event $event, StoreMediaRequest $request){
        $media=$event->media()->create($request->validated());
        if($media){
            return redirect()->route('events.media',compact('event'));
        }
        return redirect()->route('events.media.create',compact('event'));
    }

}
