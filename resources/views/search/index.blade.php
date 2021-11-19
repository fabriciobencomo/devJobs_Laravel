@extends('layouts.app')

@section('nav')
    @include('templates.categoriesNav')
@endsection
@section('content')

<div class="my-10 p-10 bg-100 shadow">
    @if(count($vacancies) > 0)
    <h1 class="text-3xl text-gray-700 m-0">Results:</h1>
    @include('templates.listVacancies')
    @else
    <h1 class="text-3xl text-gray-700 m-0">No matching results ...</h1>
    @endif
</div>
@endsection
