@extends('layouts.app')

@section('nav')
    @include('templates.adminNav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Notifications</h1>

    @if(count($notifications) > 0)
        <ul class="max-w-md mx-auto mt-10">
        @foreach($notifications as $notification)
            @php
                $data = $notification->data;
            @endphp
            <li class="p-5 border border-gray-400 mb-5 bg-white">
                <p class="mb-4">You got a New Candidate in <span class="font-bold">{{$data['vacancy']}}</span></p>
                <p class="mb-4">Time: <span class="font-bold">{{$notification->created_at->diffForHumans()}}</span></p>
                <a class="bg-green-500 p-3 inline-block text-xs font-bold text-white uppercase" href="{{ route('candidates.index', ['id' => $data['vacancy_id']]) }}">Check Candidates</a>
            </li>
        @endforeach
        </ul>
    @else
        <h3 class="text-xl text-center mt-10">There are not new notifications</h3>
    @endif

@endsection

