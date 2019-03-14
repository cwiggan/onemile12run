<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ResultsImport;
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

    public function add()
    {
        return view('results.add');
    }

    public function create(Request $request) {
        $path = $request->file('filecsv')->store('uploads');
        (new ResultsImport($request->input('year')))->import($path, null, \Maatwebsite\Excel\Excel::CSV);
        //Excel::import(new ResultsImport($request->input('year')), request()->file('file'));
    }
}
