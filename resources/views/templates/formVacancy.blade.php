<form action="{{route('vacancies.store')}}" method="POST" class="max-w-lg mx-auto my-10" enctype="multipart/form-data">
    @csrf
    <div class="mb-5">
        <label for="title" class="block text-gray-700 text-sm mb-2">Title:</label>
        <input id="title" type="text" name="title" class="p-3 bg-white rounded form-input w-full outline-none" placeholder="Job's Title" value="{{old('title')}}">
        @error('title')
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
                <span><strong>{{ $message }}</strong></span>
            </div>
        @enderror
    </div>
    <div class="mb-5">
        <label for="category" class="block text-gray-700 text-sm mb-2">Category:</label>
        <select name="category" id="category" class="w-full block appearance-none border border-gray-200 text-gray-700 rounded focus:outline-none leading-tight p-3 focus:border-gray-500">
            <option disabled selected>---Select---</option>
            @foreach($categories as $category)
                <option {{old('category') == $category->id ? 'selected' : ''}} value="{{$category->id}}" >{{$category->name}}</option>
            @endforeach
        </select>
        @error('category')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
            <span><strong>{{ $message }}</strong></span>
        </div>
        @enderror
    </div>
    <div class="mb-5">
        <label for="experience" class="block text-gray-700 text-sm mb-2">Experience:</label>
        <select name="experience" id="experience" class="w-full block appearance-none border border-gray-200 text-gray-700 rounded focus:outline-none leading-tight p-3 focus:border-gray-500">
            <option disabled selected>---Select---</option>
            @foreach($experiences as $experience)
                <option {{old('experience') == $experience->id ? 'selected' : ''}}  value="{{$experience->id}}" >{{$experience->name}}</option>
            @endforeach
        </select>
        @error('experience')
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
                <option {{old('location') == $location->id ? 'selected' : ''}}  value="{{$location->id}}" >{{$location->name}}</option>
            @endforeach
        </select>
        @error('location')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
            <span><strong>{{ $message }}</strong></span>
        </div>
    @enderror
    </div>
    <div class="mb-5">
        <label for="wage" class="block text-gray-700 text-sm mb-2">Wage:</label>
        <select name="wage" id="wage" class="w-full block appearance-none border border-gray-200 text-gray-700 rounded focus:outline-none leading-tight p-3 focus:border-gray-500">
            <option disabled selected>---Select---</option>
            @foreach($wages as $wage)
                <option {{old('wage') == $wage->id ? 'selected' : ''}} value="{{$wage->id}}" >{{$wage->name}}</option>
            @endforeach
        </select>
        @error('wage')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
            <span><strong>{{ $message }}</strong></span>
        </div>
    @enderror
    </div>
    <div class="mb-5">
        <label for="description" class="block text-gray-700 text-sm mb-2">Description:</label>
        <div class="editable p-3 bg-white rounded form-input w-full text-gray-700"></div>
        <input type="hidden" name="description" id="description" value="{{ old('description')}}">
        @error('description')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
            <span><strong>{{ $message }}</strong></span>
        </div>
        @enderror
    </div>
    <div class="mb-5">
        <label for="image" class="block text-gray-700 text-sm mb-2">Image Job:</label>
        <div class="dropzone rounded bg-white" id="dropzoneCreate"></div>
        <input type="hidden" name="image" id="image" value="{{ old('image') }}">
        <p id="error"></p>
        @error('image')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
            <span><strong>{{ $message }}</strong></span>
        </div>
        @enderror
    </div>
    <div class="mb-5">
        <label for="skills" class="block text-gray-700 text-sm mb-5">Skill List:</label>
        @php
            $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails'];
        @endphp
        <skills-component :skills="{{ json_encode($skills) }}" :oldskills="{{ json_encode(old('skills'))}}"></skills-component>
        @error('skills')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
            <span><strong>{{ $message }}</strong></span>
        </div>
        @enderror
    </div>
    <button type="submit" class="bg-green-600 w-full text-white hover:bg-green-800 p-3 focus:outline-none focus:shadow-outline font-bold">
        Create Vacancy
    </button>
</form>