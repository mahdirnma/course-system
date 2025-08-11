@extends('layout.app')
@section('title')
    shows
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">
                <a href="{{route('shows.create')}}" class="px-10 py-3 rounded-xl font-light text-white bg-gray-800">add show +</a>
                <h2 class="text-xl">shows</h2>
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
                        <td class="text-center">duration minutes</td>
                        <td class="text-center">details</td>
                        <td class="text-center">name</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shows as $show)
                        <tr>
                            <td class="text-center">
                                <form action="{{route('shows.setting',compact('show'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-yellow-500 cursor-pointer">setting</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('shows.media',compact('show'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-red-800 cursor-pointer">media</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('shows.locations',compact('show'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-blue-700 cursor-pointer">locations</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('shows.destroy',compact('show'))}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-green-600 cursor-pointer">delete</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('shows.edit',compact('show'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-cyan-600 cursor-pointer">update</button>
                                </form>
                            </td>
                            <td class="text-center">
                                @foreach($show->sponsors as $sponsor)
                                    {{$sponsor->name}},
                                @endforeach
                            </td>
                            <td class="text-center">{{$show->duration_minutes}}</td>
                            <td class="text-center">{{$show->details}}</td>
                            <td class="text-center">{{$show->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">{{$shows->links()}}</div>
        </div>
@endsection
