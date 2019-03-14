<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race;
use App\Http\Requests\StoreRace;

class RacesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $races = Race::all();
        return view('race.index',compact('races'));
    }

    public function create()
    {
        return view('race.new');
    }

    public function store(StoreRace $request)
    {
        //validate

        //save
        $race = new Race();
        $race->name = $request->input('name');
        $race->price = $request->input('price');
        $race->start_time = $request->input('start_time');
        $race->end_time = $request->input('end_time');
        $race->description = $request->input('description');
        $race->awards = $request->input('awards');
        $race->save();

        redirect('race/all');
    }

    public function edit($id)
    {
        $race = Race::find($id); //dd($race);
        return view('race.edit', compact('race'));
    }

    public function update(StoreRace $request, $id)
    {
        $race = Race::find($id);
        $race->name = $request->input('name');
        $race->price = $request->input('price');
        $race->start_time = $request->input('start_time');
        $race->end_time = $request->input('end_time');
        $race->description = $request->input('description');
        $race->awards = $request->input('awards');
        $race->save();

        redirect('race/all');
    }
}
