<?php

namespace App\Http\Controllers;

use App\Models\Wage;
use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Location;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = Vacancy::where('user_id', auth()->user()->id)->latest()->simplePaginate(5);

        return view('vacancies.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vacancy $vacancy)
    {
        $categories = Category::all();
        $experiences = Experience::all();
        $locations = Location::all();
        $wages = Wage::all();
        $vacancy->id = null;

        return view('vacancies.create', compact('vacancy', 'categories', 'experiences', 'locations', 'wages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:8',
            'category' => 'required',
            'wage' => 'required',
            'location' => 'required',
            'experience' => 'required',
            'description' => 'required|min:50',
            'image' => 'required',
            'skills' => 'required'
        ]);

        auth()->user()->vacancies()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
            'skills' => $data['skills'],
            'category_id' => $data['category'],
            'location_id' => $data['location'],
            'wage_id' => $data['wage'],
            'experience_id' => $data['experience'],
        ]);

        return redirect()->action([VacancyController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        if($vacancy->active === 0) return abort('404');

        return view('vacancies.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        $this->authorize('view', $vacancy);

        $categories = Category::all();
        $experiences = Experience::all();
        $locations = Location::all();
        $wages = Wage::all();

        return view('vacancies.edit', compact('vacancy','categories', 'experiences', 'locations', 'wages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        $this->authorize('update', $vacancy);

        $data = $request->validate([
            'title' => 'required|min:8',
            'category' => 'required',
            'wage' => 'required',
            'location' => 'required',
            'experience' => 'required',
            'description' => 'required|min:50',
            'image' => 'required',
            'skills' => 'required'
        ]);

        $vacancy->title = $data['title'];
        $vacancy->category_id = $data['category'];
        $vacancy->description = $data['description'];
        $vacancy->image = $data['image'];
        $vacancy->skills = $data['skills'];
        $vacancy->location_id = $data['location'];
        $vacancy->wage_id = $data['wage'];
        $vacancy->experience_id = $data['experience'];

        $vacancy->save();

        return redirect()->action([VacancyController::class, 'index']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy, Request $request)
    {
        $this->authorize('delete', $vacancy);
        $vacancy->candidates()->delete();
        $vacancy->delete();
        return response()->json($request);
    }

    public function images(Request $request)
    {
        $img = $request->file('file');
        $name_img = time() . '.' . $img->extension();
        $img->move(public_path('storage/vacancies'), $name_img);
        return response()->json(['correct' => $name_img]);
    }

    public function borrarimagen(Request $request)
    {
        if($request->ajax()){
            $image = $request->get('image');

            if(File::exists('storage/vacancies/' . $image)){
                File::delete('storage/vacancies/' . $image);
                return response('Image Deleted', 200);
            }

        }
    }

    //Change the status of a vacancy

    public function status(Request $request, Vacancy $vacancy){

        //Asign status to the vacancy
        $vacancy->active = $request->Status;

        //Save in DB
        $vacancy->save();
    }

    public function search(Request $request){
        $data = $request->validate([
            'category' => 'required',
            'location' => 'required',
        ]);

        $category = $data['category'];
        $location = $data['location'];

        $vacancies = Vacancy::latest()->where([
            'category_id' => $category,
            'location_id' => $location
        ])->get();
        return view('search.index', compact('vacancies'));
    }

    public function response(){

    }
}
