<a href="{{ route('vacancies.index')}}" class="text-white text-sm capitalize font-bold p-3 {{Request::is('vacancies') ? 'bg-green-600' : ''}}">Check Vacancies</a>
<a href="{{ route('vacancies.create')}}" class="text-white text-sm capitalize font-bold p-3 {{Request::is('vacancies/create') ? 'bg-green-600' : ''}}">New Vancacy</a>
