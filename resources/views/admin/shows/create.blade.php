@extends('layout.app')
@section('title')
    add show
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-end items-center border-b">
                <h2 class="text-xl">add show</h2>
            </div>
            <div class="flex w-full h-4/5">
                <form action="{{route('shows.store')}}" method="post" class="w-full h-full flex flex-row-reverse">
                    @csrf
                    <div class="w-1/2 h-full flex flex-col items-end pr-20 relative">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="name" class="font-semibold ml-5">: name</label>
                            <input type="text" name="name" value="{{old('name')}}" id="title" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('name')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="details" class="font-semibold ml-5">: details</label>
                            <textarea name="details" id="details" cols="10" rows="10" class="w-2/5 h-32 rounded outline-0 p-2 border border-gray-400">{{old('details')}}</textarea>
                            @error('details')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="duration_minutes" class="font-semibold ml-5">: duration_minutes</label>
                            <input type="number" min="1" max="300" name="duration_minutes" value="{{old('duration_minutes')}}" id="level" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('duration_minutes')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Add" class="absolute bottom-2 -left-10 text-white bg-gray-700 py-3 px-7 cursor-pointer rounded">
                    </div>
                    <div class="w-1/2 h-full flex flex-col items-end pr-20">
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
                            <input type="text" name="data" value="{{old('data')}}" id="data" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('data')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="manager" class="font-semibold ml-5">: manager</label>
                            <input type="text" name="manager" value="{{old('manager')}}" id="manager" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('manager')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="level" class="font-semibold ml-5">: level</label>
                            <input type="number" min="0" max="10" name="level" value="{{old('level')}}" id="level" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('level')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="capacity" class="font-semibold ml-5">: capacity</label>
                            <input type="number" min="0" max="200" name="capacity" value="{{old('capacity')}}" id="level" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('capacity')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
