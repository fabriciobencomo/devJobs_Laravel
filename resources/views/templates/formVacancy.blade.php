<form @if($vacancy->id) action="{{route('vacancies.update', ['vacancy' => $vacancy->id ])}}" @else action="{{route('vacancies.store')}}" @endif method="POST" class="max-w-lg mx-auto my-10" enctype="multipart/form-data">
    @csrf
    @if($vacancy->id)
        @method('put')
    @endif
    <div class="mb-5">
        <label for="title" class="block text-gray-700 text-sm mb-2">Title:</label>
        <input id="title" type="text" name="title" class="p-3 bg-white rounded form-input w-full outline-none" placeholder="Job's Title" @if($vacancy->id) value="{{$vacancy->title}}" @else value="{{old('title')}}" @endif >
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
                <option @if($vacancy->id) {{ $vacancy->category_id == $category->id ? 'selected' : ''}}  value="{{ $category->id  }}" @else {{old('category') == $category->id ? 'selected' : ''}} value="{{$category->id}}" @endif >{{$category->name}}</option>
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
                <option @if($vacancy->id) {{ $vacancy->experience_id == $experience->id ? 'selected' : ''}}  value="{{$experience->id }}" @else {{old('experience') == $experience->id ? 'selected' : ''}} value="{{$experience->id}}" @endif >{{$experience->name}}</option>
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
                <option @if($vacancy->id) {{ $vacancy->location_id == $location->id ? 'selected' : ''}}  value="{{$location->id  }}" @else {{old('location') == $location->id ? 'selected' : ''}} value="{{$location->id}}" @endif >{{$location->name}}</option>
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
                <option @if($vacancy->id) {{ $vacancy->wage_id == $wage->id ? 'selected' : ''}}  value="{{$wage->id}}" @else {{old('wage') == $wage->id ? 'selected' : ''}} value="{{$wage->id}}" @endif  >{{$wage->name}}</option>
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
        <input type="hidden" name="description" id="description" @if($vacancy->id) value="{{$vacancy->description}}" @else value="{{ old('description')}}" @endif>
        @error('description')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
            <span><strong>{{ $message }}</strong></span>
        </div>
        @enderror
    </div>
    <div class="mb-5">
        <label for="image" class="block text-gray-700 text-sm mb-2">Image Job:</label>
        <div class="dropzone rounded bg-white" id="dropzoneCreate"></div>
        <input type="hidden" name="image" id="image" @if($vacancy->id) value="{{$vacancy->image}}" @else value="{{ old('image')}}" @endif>
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
        <skills-component :skills="{{ json_encode($skills) }}" @if($vacancy->id) :oldskills="{{ json_encode($vacancy->skills)}}" @else :oldskills="{{ json_encode(old('skills'))}}" @endif ></skills-component>
        @error('skills')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-3 relative text-sm" role="alert">
            <span><strong>{{ $message }}</strong></span>
        </div>
        @enderror
    </div>
    <button type="submit" class="bg-green-600 w-full text-white hover:bg-green-800 p-3 focus:outline-none focus:shadow-outline font-bold">
        @if($vacancy->id) Edit Vacancy @else Create Vacancy @endif
    </button>
</form>
