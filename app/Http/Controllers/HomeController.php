<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::latest()->where('active', 1)->take(10)->get();
        return view('home', compact('vacancies'));
    }
}
