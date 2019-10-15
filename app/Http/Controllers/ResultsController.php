<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ResultsImport;
use App\Exports\ResultsExport;
use Excel;
use Log;
use App\RaceResult;

class ResultsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $results = RaceResult::orderBy('distance', 'desc')->get();
        return view('results.index', compact('results'));
    }

    public function byyear($year)
    {
        $results = RaceResult::where('year', $year)->orderBy('distance', 'desc')->get();
        return view('results.index', compact('results'));
    }

    public function add()
    {
        return view('results.add');
    }

    public function create(Request $request) {
        $path = $request->file('filecsv')->store('uploads');
        (new ResultsImport($request->input('year')))->import($path, null, \Maatwebsite\Excel\Excel::CSV);
        return redirect('/admin/results')->with('status', 'Results Imported');
    }

    public function remove($year)
    {
        RaceResult::where('year', $year)->delete();
    }

    public function edit($id)
    {
        $result = RaceResult::find($id);
        return view('results.edit', compact('result'));
    }

    public function update(Request $request, $id)
    {
        $results = RaceResult::find($id);
        $results->laps = $request->laps;
        $results->distance = $request->distance;
        $results->save();
       // dd($results);
        return redirect('/admin/results/'.$results->year)->with('status', 'Results Updated');
    }

    public function export($year)
    {
        return Excel::download(new ResultsExport($year), 'results.xlsx');
    }
}
