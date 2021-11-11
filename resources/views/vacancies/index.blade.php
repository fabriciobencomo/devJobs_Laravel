@extends('layouts.app')

@section('nav')
    @include('templates.adminNav')
@endsection

@section('content')
@if(count($vacancies) > 0)
<h1 class="text-center text-2xl mt-10 capitalize">Admin your vacancies</h1>

<div class="flex flex-col mt-10">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="min-w-full">
        <thead class="bg-gray-100 ">
            <tr>
            <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Vacancy Title
            </th>
            <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Status
            </th>
            <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Candidates
            </th>
            <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Actions
            </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($vacancies as $vacancy)
            <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="flex items-center">

                <div class="ml-4">
                    <div class="text-sm leading-5 font-medium text-gray-900"> {{$vacancy->title}} </div>
                    <div class="text-sm leading-5 text-gray-500">Category: {{$vacancy->category->name}} </div>
                </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{$vacancy->active ? ' bg-green-100 text-green-700' : 'bg-red-100 text-red-700'}}">{{$vacancy->active ? 'Active' : 'Inactive'}}</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                <a href="{{ route('candidates.index', ['id' => $vacancy->id]) }}" class="text-gray-500 hover:text-gray-600">{{ $vacancy->candidates->count()}}   Candidates</a>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                    <a href="#" class="text-teal-600 hover:text-teal-900 mr-5">Edit</a>
                    <a href="#" class="text-red-600 hover:text-red-900  mr-5">Delete</a>
                    <a href="{{ route('vacancies.show', ['vacancy' => $vacancy->id ])}}" class="text-blue-600 hover:text-blue-900">Ver</a>
            </td>
            </tr>
            @endforeach


        </tbody>
        </table>
    </div>
    </div>
</div>
{{$vacancies->links()}}
@else
    <h1 class="text-center text-2xl mt-10 capitalize">not posted vacancies yet...</h1>
@endif

@endsection
