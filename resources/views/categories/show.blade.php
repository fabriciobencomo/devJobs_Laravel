@extends('layouts.app')

@section('nav')
    @include('templates.categoriesNav')
@endsection
@section('content')

<div class="my-10 p-10 bg-100 shadow">
    <h1 class="text-3xl text-gray-700 m-0">{{$category->name}} Jobs</h1>
    @include('templates.listVacancies')
</div>
@endsection
