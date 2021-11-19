@foreach($categories as $category)
    <a href="{{route('categories.show', ['category' => $category->id])}}" class="text-sm text-white uppercase font-bold p-3">{{$category->name}}</a>
@endforeach
