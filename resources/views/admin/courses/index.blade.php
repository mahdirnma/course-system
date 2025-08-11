@extends('layout.app')
@section('title')
    courses
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">
                <a href="{{route('courses.create')}}" class="px-10 py-3 rounded-xl font-light text-white bg-gray-800">add course +</a>
                <h2 class="text-xl">courses</h2>
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
                        <td class="text-center">start</td>
                        <td class="text-center">teacher</td>
                        <td class="text-center">field</td>
                        <td class="text-center">description</td>
                        <td class="text-center">title</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td class="text-center">
                                <form action="{{route('courses.setting',compact('course'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-yellow-500 cursor-pointer">setting</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{--{{route('events.media',compact('event'))}}--}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-red-800 cursor-pointer">media</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('courses.locations',compact('course'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-blue-700 cursor-pointer">locations</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('courses.destroy',compact('course'))}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-green-600 cursor-pointer">delete</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('courses.edit',compact('course'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-cyan-600 cursor-pointer">update</button>
                                </form>
                            </td>
                            <td class="text-center">
                                @foreach($course->sponsors as $sponsor)
                                    {{$sponsor->name}},
                                @endforeach
                            </td>
                            <td class="text-center">{{$course->start}}</td>
                            <td class="text-center">{{$course->teacher}}</td>
                            <td class="text-center">{{$course->field}}</td>
                            <td class="text-center">{{$course->description}}</td>
                            <td class="text-center">{{$course->title}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">{{$courses->links()}}</div>
        </div>
@endsection
