@extends('layout.app')
@section('title')
    update course
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-end items-center border-b">
                <h2 class="text-xl">add course</h2>
            </div>
            <div class="flex w-full h-4/5">
                <form action="{{route('courses.update',compact('course'))}}" method="post" class="w-full h-full flex flex-row-reverse">
                    @csrf
                    @method('put')
                    <div class="w-1/2 h-full flex flex-col items-end pr-20 relative">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="title" class="font-semibold ml-5">: title</label>
                            <input type="text" name="title" value="{{$course->title}}" id="title" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('title')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="description" class="font-semibold ml-5">: description</label>
                            <textarea name="description" id="description" cols="10" rows="10" class="w-2/5 h-32 rounded outline-0 p-2 border border-gray-400">{{$course->description}}</textarea>
                            @error('description')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="field" class="font-semibold ml-5">: field</label>
                            <input type="text" name="field" value="{{$course->field}}" id="field" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('field')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="start" class="font-semibold ml-5">: start</label>
                            <input type="date" name="start" value="{{$course->start}}" id="start" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('start')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Update" class="absolute bottom-2 -left-10 text-white bg-gray-700 py-3 px-7 cursor-pointer rounded">
                    </div>
                    <div class="w-1/2 h-full flex flex-col items-end pr-20">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="teacher" class="font-semibold ml-5">: teacher</label>
                            <input type="text" name="teacher" value="{{$course->teacher}}" id="teacher" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('teacher')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <p class="font-semibold ml-5">: sponsors</p>
                            @foreach($sponsors as $sponsor)
                                <label for="">
                                    <input type="checkbox" name="sponsors[]" id="sponsors" value="{{$sponsor->id}}">
                                    {{$sponsor->name}}
                                </label>
                            @endforeach
                            @error('sponsors')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="data" class="font-semibold ml-5">: data</label>
                            <input type="text" name="data" value="{{$course->setting->data}}" id="data" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('data')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="manager" class="font-semibold ml-5">: manager</label>
                            <input type="text" name="manager" value="{{$course->setting->manager}}" id="manager" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('manager')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="level" class="font-semibold ml-5">: level</label>
                            <input type="number" min="0" max="10" name="level" value="{{$course->setting->level}}" id="level" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('level')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="capacity" class="font-semibold ml-5">: capacity</label>
                            <input type="number" min="0" max="200" name="capacity" value="{{$course->setting->capacity}}" id="level" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('capacity')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
