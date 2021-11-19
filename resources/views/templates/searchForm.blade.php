<h2 class="my-10 text-2xl text-gray-700">Search a Job</h2>
<form action="{{route('vacancies.search')}}" method="POST">
    @csrf
    <div class="mb-5">
        <label for="category" class="block text-gray-700 text-sm mb-2">Category:</label>
        <select name="category" id="category" class="w-full block appearance-none border border-gray-200 text-gray-700 rounded focus:outline-none leading-tight p-3 focus:border-gray-500">
            <option disabled selected>---Select---</option>
            @foreach($categories as $category)
                <option {{old('category') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
            <span><strong>{{ $message }}</strong></span>
        </div>
        @enderror
    </div>
    <div class="mb-5">
        <label for="location" class="block text-gray-700 text-sm mb-2">Location:</label>
        <select name="location" id="location" class="w-full block appearance-none border border-gray-200 text-gray-700 rounded focus:outline-none leading-tight p-3 focus:border-gray-500">
            <option disabled selected>---Select---</option>
            @foreach($locations as $location)
                <option {{old('location') == $location->id ? 'selected' : ''}} value="{{$location->id}}">{{$location->name}}</option>
            @endforeach
        </select>
        @error('location')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
            <span><strong>{{ $message }}</strong></span>
        </div>
    @enderror
    </div>
    <button type="submit" class="bg-green-600 w-full text-white hover:bg-green-800 p-3 focus:outline-none focus:shadow-outline font-bold uppercase">
        Search jobs
    </button>
</form>
