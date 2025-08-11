@extends('layout.app')
@section('title')
    {{$event->title}} locations
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-2/5 flex items-center justify-between border-b">
                <a href="{{route('events.location.create',compact('event'))}}" class="px-10 py-3 rounded-xl font-light text-white bg-gray-800">add {{$event->title}}'s location +</a>
                <h2 class="text-xl">{{$event->title}} locations</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">delete</td>
                        <td class="text-center">update</td>
                        <td class="text-center">city</td>
                        <td class="text-center">address</td>
                        <td class="text-center">title</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($event->locations as $location)
                        <tr>
                            <td class="text-center">
                                <form action="{{route('events.destroy',compact('event'))}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-green-600 cursor-pointer">delete</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('events.location.edit',compact('event','location'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-cyan-600 cursor-pointer">update</button>
                                </form>
                            </td>
                            <td class="text-center">{{$location->city}}</td>
                            <td class="text-center">{{$location->address}}</td>
                            <td class="text-center">{{$location->title}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
