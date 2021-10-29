@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <h1 class="text-center text-3xl mt-10 tracking-wide">{{ $vacancy->title }}</h1>
    <div class="mt-10 mb-20 md:flex items-start justify-center">
        <div class="md:w-3/5">
            <p class="text-gray-700 font-bold block my-2">Posted: <span class="font-normal">{{$vacancy->created_at->diffForHumans()}}</span> By: <span class="font-normal">{{$vacancy->user->name}}</span> </p>
            <p class="text-gray-700 font-bold block my-2">Category: <span class="font-normal">{{$vacancy->category->name}}</span></p>
            <p class="text-gray-700 font-bold block my-2">Location: <span class="font-normal">{{$vacancy->location->name}}</span></p>
            <p class="text-gray-700 font-bold block my-2">Experience: <span class="font-normal">{{$vacancy->experience->name}}</span></p>
            <p class="text-gray-700 font-bold block my-2">Wage: <span class="font-normal">{{$vacancy->wage->name}}</span></p>
            <h2 class="text-center text-xl mt-10 mb-7">Tech Skills</h2>
            @php
                $arraySkills = explode(",", $vacancy->skills)
            @endphp
            @foreach($arraySkills as $skill)
                <p class="inline-block border rounded border-gray-400 py-2 px-8 my-2 mx-2 bg-gray-700 text-white">{{$skill}}</p>
            @endforeach
            <a href="/storage/vacancies/{{$vacancy->image}}" data-lightbox="image"><img src="/storage/vacancies/{{$vacancy->image}}" class="w-40 my-10" alt="Image Job"></a>
            <div class="description mt-5 mb-5 text-justify">
                {!! $vacancy->description !!}
            </div>
        </div>
        <aside class="md:w-2/5 bg-green-700 p-3 rounded m-3">
            <h2 class="text-white text-2xl my-5 capitalize font-bold text-center tracking-wide">Contact Recruiter</h2>
            <form action="{{ route('candidates.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="my-6 mr-2">
                    <label for="name" class="text-white block text-sm font-bold my-4">Name:</label>
                    <input type="text" class="w-full p-3 rounded form-input" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}">
                    @error('name')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
                        <span><strong>{{ $message }}</strong></span>
                    </div>
                    @enderror
                </div>
                <div class="my-6 mr-2">
                    <label for="email" class="text-white block text-sm font-bold my-4">E-mail:</label>
                    <input type="mail" class="w-full p-3 rounded form-input" name="email" id="email" placeholder="example@mail.com" value="{{ old('email') }}">
                    @error('email')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
                        <span><strong>{{ $message }}</strong></span>
                    </div>
                    @enderror
                </div>
                <div class="my-6 mr-2">
                    <label for="cv" class="text-white block text-sm font-bold my-4">Resume:</label>
                    <input type="file" class="w-full p-3 rounded form-input bg-white" name="cv" id="cv" value="{{ old('cv') }}" accept="applicaction/pdf">
                    @error('cv')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
                        <span><strong>{{ $message }}</strong></span>
                    </div>
                    @enderror
                </div>

                <input type="hidden" name="vacancy_id" value="{{$vacancy->id}}">

                <div class="my-6">
                    <input type="submit" class="bg-gray-700 hover:bg-gray-800 text-white rounded p-3 focus:outline-none focus:shadow-outline w-full tracking-wide font-bold" value="Contact">
                </div>
            </form>
        </aside>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection