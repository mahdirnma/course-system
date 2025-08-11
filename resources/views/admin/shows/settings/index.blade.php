@extends('layout.app')
@section('title')
    {{$show->title}} setting
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-2/5 flex items-center border-b">
                <h2 class="text-xl">{{$show->title}} setting</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">capacity</td>
                        <td class="text-center">level</td>
                        <td class="text-center">manager</td>
                        <td class="text-center">data</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                            <td class="text-center">{{$show->setting->capacity}}</td>
                            <td class="text-center">{{$show->setting->level}}</td>
                            <td class="text-center">{{$show->setting->manager}}</td>
                            <td class="text-center">{{$show->setting->data}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection
