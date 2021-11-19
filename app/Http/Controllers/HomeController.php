<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Vacancy;
use App\Models\Location;
use App\Models\Wage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::latest()->where('active', 1)->take(10)->get();
        $locations = Location::all();
        $wages = Wage::all();
        $experiences = Experience::all();

        return view('home', compact('vacancies', 'locations' , 'wages' , 'experiences'));
    }
}
