<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Models\Show;

class MediaController extends Controller
{
    /**
     * Event Media processes.
     */
    public function eventMedia(Event $event)
    {
        return view('admin.events.media.index', compact('event'));
    }
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

    public function eventMediaEdit(Event $event, Media $media)
    {
        return view('admin.events.media.edit', compact('event','media'));
    }
    public function eventMediaUpdate(Event $event, UpdateMediaRequest $request, Media $media){
        $status=$media->update($request->validated());
        if($status){
            return redirect()->route('events.media',compact('event'));
        }
        return redirect()->route('events.media.edit',compact('event'));
    }
    public function eventMediaDestroy(Event $event, Media $media){
        $media->update(['is_active'=>0]);
        return redirect()->route('events.media',compact('event'));
    }
    /**
     * Course Media processes.
     */
    public function courseMedia(Course $course)
    {
        return view('admin.courses.media.index', compact('course'));
    }
    public function courseMediaCreate(Course $course){
        return view('admin.courses.media.create', compact('course'));
    }
    public function courseMediaStore(Course $course, StoreMediaRequest $request){
        $media=$course->media()->create($request->validated());
        if($media){
            return redirect()->route('courses.media',compact('course'));
        }
        return redirect()->route('courses.media.create',compact('course'));
    }
    public function courseMediaEdit(Course $course, Media $media){
        return view('admin.courses.media.edit', compact('course','media'));
    }
    public function courseMediaUpdate(Course $course, UpdateMediaRequest $request, Media $media){
        $status=$media->update($request->validated());
        if($status){
            return redirect()->route('courses.media',compact('course'));
        }
        return redirect()->route('courses.media.edit',compact('course','media'));
    }
    public function courseMediaDestroy(Course $course, Media $media){
        $media->update(['is_active'=>0]);
        return redirect()->route('courses.media',compact('course'));
    }
    /**
     * show Media processes.
     */
    public function showMedia(Show $show)
    {
        return view('admin.shows.media.index', compact('show'));
    }

    public function showMediaCreate(Show $show){
        return view('admin.shows.media.create', compact('show'));
    }
    public function showMediaStore(Show $show, StoreMediaRequest $request){
        $media=$show->media()->create($request->validated());
        if($media){
            return redirect()->route('shows.media',compact('show'));
        }
        return redirect()->route('shows.media.create',compact('show'));
    }
    public function showMediaEdit(Show $show, Media $media){
        return view('admin.shows.media.edit', compact('show','media'));
    }
    public function showMediaUpdate(Show $show, UpdateMediaRequest $request, Media $media){
        $status=$media->update($request->validated());
        if($status){
            return redirect()->route('shows.media',compact('show'));
        }
        return redirect()->route('shows.media.edit',compact('show','media'));
    }
}
