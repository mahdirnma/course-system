<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Http\Requests\StoreShowRequest;
use App\Http\Requests\UpdateShowRequest;
use App\Models\Sponsor;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shows = Show::where('is_active',1)->paginate(2);
        return view('admin.shows.index',compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sponsors = Sponsor::where('is_active',1)->get();
        return view('admin.shows.create',compact('sponsors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShowRequest $request)
    {
        $show = Show::create($request->all());
        $show->sponsors()->attach($request->sponsors);
        $status=$show->setting()->create($request->all());
        if($show && $status){
            return redirect()->route('shows.index');
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Show $show)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Show $show)
    {
        $sponsors = Sponsor::where('is_active',1)->get();
        return view('admin.shows.edit',compact('show','sponsors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShowRequest $request, Show $show)
    {
        $status=$show->update($request->all());
        $status2=$show->setting()->update([
            'data'=>$request->data,
            'manager'=>$request->manager,
            'level'=>$request->level,
            'capacity'=>$request->capacity,
        ]);
        $show->sponsors()->sync($request->sponsors);
        if($status && $status2){
            return redirect()->route('shows.index');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Show $show)
    {
        //
    }
}
