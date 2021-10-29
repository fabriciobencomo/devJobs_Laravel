<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:1000',
            'vacancy_id' => 'required'

        ]);

        if($request->file('cv')){
            $file = $request->file('cv');
            $namefile = time() . '.' . $file->extension();
            $location = public_path('/storage/cv');
            $file->move($location, $namefile);

            $namefile;

        }

        $vacancy = Vacancy::find($data['vacancy_id']);
        $vacancy->candidates()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cv' => $namefile
        ]);

        return back()->with('status', 'Your Application was sent Correctly! Good Luck');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
