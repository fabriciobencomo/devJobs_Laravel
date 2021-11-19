<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){

        $vacancies = Vacancy::latest()->where('category_id', $category->id)->paginate(10);

        return view('categories.show', compact('vacancies', 'category'));
    }
}
