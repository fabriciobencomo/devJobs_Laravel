@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-screen-md">
    <div class="flex flex-wrap justify-center">
        <div class="md:w-1/2 md:order-2 order-2">
            <div class="w-full max-w-sm">
                <div class="flex flex-col breaks-words bg-white border border-2 shadow-md mt-10">
                    <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-3">
                        {{__('register')}}
                    </div>
                    <form class="px-3 py-5" method="POST" action="{{ route('register') }}" novalidate>
                        @csrf
    
                        <div class="flex flex-wrap mb-6">
                            <label for="name" class="block text-gray-700 text-sm mb-2">{{ __('Name') }}</label>
    
                            <input id="name" type="text" class="p-3 bg-gray-200 rounded form-input w-full @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-700 text-sm mb-2">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="p-3 bg-gray-200 rounded form-input w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="flex flex-wrap mb-6">
                            <label for="password" class="block text-gray-700 text-sm mb-2">{{ __('Password') }}</label>

                            <input id="password" type="password" class="p-3 bg-gray-200 rounded form-input w-full @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                            @error('password')
                                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-10 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="flex flex-wrap mb-6">
                            <label for="password-confirm" class="block text-gray-700 text-sm mb-2">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="p-3 bg-gray-200 rounded form-input w-full" name="password_confirmation" autocomplete="new-password">
                        </div>
    
                        <div class="flex-wrap mb-6 ">
                                <button type="submit" class="bg-green-600 w-full text-white hover:bg-green-800 p-3 focus:outline-none focus:shadow-outline font-bold">
                                    {{ __('Register') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="md:w-1/2 flex flex-col text-center justify-center md:order-1 order-1 px-10 mt-5">
            <h1 class="text-green-600 text-3xl">Are You a Recruiter?</h1>
            <p class="text-xl mt-5 leading-7"> Create a free Acount and Start to Hire Completely Free</p>
        </div>
    </div>
</div>
@endsection
