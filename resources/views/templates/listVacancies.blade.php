<ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
    @foreach($vacancies as $vacancy)
        <li class="p-10 border border-gray-300 bg-white shadow">
            <h2 class="text-2xl font-bold text-green-500">{{$vacancy->title}}</h2>
            <p class="text-gray-700 font-normal block my-2">Category: <span class="font-bold">{{$vacancy->category->name}}</span></p>
            <p class="text-gray-700 font-normal block my-2">Location: <span class="font-bold">{{$vacancy->location->name}}</span></p>
            <p class="text-gray-700 font-normal block my-2">Experience Required: <span class="font-bold">{{$vacancy->experience->name}}</span></p>
            <p class="text-gray-700 font-normal block my-2">Wage: <span class="font-bold">{{$vacancy->wage->name}}</span></p>
            <a href="{{route('vacancies.show', ['vacancy' => $vacancy->id])}}" class="bg-green-500 p-3 mt-4 inline-block text-xs font-bold text-white uppercase">Read More</a>
        </li>
    @endforeach
</ul>
