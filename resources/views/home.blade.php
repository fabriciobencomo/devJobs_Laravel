@extends('layouts.app')

@section('nav')
    @include('templates.categoriesNav')
@endsection
@section('content')
<div class="flex lg:flex-row shadow bg-white">
    <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24">
        <p class="text-3xl text-gray-700 ">
            Dev<span class="font-bold">Jobs</span>
            <h1 class="mt-2 sm:mt-4 text-4xl leading-tight font-bold text-gray-700">Find a Job in your Country or Work remotely <span class="text-green-500">Programmers/Designers</span></h1>
            @include('templates.searchForm')
        </p>
    </div>
    <div class="block lg:w-1/2">
        <img class="inset-0 object-cover h-full w-full" src="{{ asset('images/bg_devjobs.jpg')}}" alt="background Image">
    </div>
</div>
<div class="my-10 p-10 bg-100 shadow">
    <h1 class="text-3xl text-gray-700 m-0">New Jobs</h1>
    @include('templates.listVacancies')
</div>
@endsection
