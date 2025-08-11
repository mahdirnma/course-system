@extends('layout.app')
@section('title')
    events
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">
                <a href="{{route('events.create')}}" class="px-10 py-3 rounded-xl font-light text-white bg-gray-800">add event +</a>
                <h2 class="text-xl">events</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">setting</td>
                        <td class="text-center">media</td>
                        <td class="text-center">locations</td>
                        <td class="text-center">delete</td>
                        <td class="text-center">update</td>
                        <td class="text-center">sponsors</td>
                        <td class="text-center">date</td>
                        <td class="text-center">owner</td>
                        <td class="text-center">description</td>
                        <td class="text-center">title</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td class="text-center">
                                <form action="{{route('events.setting',compact('event'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-yellow-500 cursor-pointer">setting</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('events.media',compact('event'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-red-800 cursor-pointer">media</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('events.locations',compact('event'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-blue-700 cursor-pointer">locations</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('events.destroy',compact('event'))}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-green-600 cursor-pointer">delete</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('events.edit',compact('event'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-cyan-600 cursor-pointer">update</button>
                                </form>
                            </td>
                            <td class="text-center">
                                @foreach($event->sponsors as $sponsor)
                                    {{$sponsor->name}},
                                @endforeach
                            </td>
                            <td class="text-center">{{$event->date}}</td>
                            <td class="text-center">{{$event->owner}}</td>
                            <td class="text-center">{{$event->description}}</td>
                            <td class="text-center">{{$event->title}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">{{$events->links()}}</div>
        </div>
@endsection
