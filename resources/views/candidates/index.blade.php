@extends('layouts.app')

@section('nav')
    @include('templates.adminNav')
@endsection

@section('content')
    <h1 class="text-2xl mt-10 text-center">Candidates : {{$vacancy->title}}</h1>

    @if(count($vacancy->candidates) > 0)
        <ul class="max-w-md mx-auto mt-10">
            @foreach($vacancy->candidates as $candidate)
                <li class="p-5 border border-gray-400 mb-5 bg-white">
                    <p class="mb-4">Name:<span class="font-bold">{{$candidate->name}}</span></p>
                    <p class="mb-4">E-mail:<span class="font-bold">{{$candidate->email}}</span></p>
                    <a class="bg-green-500 p-3 inline-block text-xs font-bold text-white uppercase"href="/storage/cv/{{$candidate->cv}}">Check Resume</a>
                </li>
            @endforeach
        </ul>
    @else
        <h3 class="text-xl mt-10 text-center">No candidates Yet ...</h3>
    @endif

@endsection
