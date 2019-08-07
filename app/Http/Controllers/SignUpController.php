<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SignUp;
use DB;
use App\Exports\OrderExport;
use Excel;

class SignUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $signups = SignUp::all();
        return view('signups.index',compact('signups'));
    }
    public function show($id) {
        $signup = SignUp::find($id);
        return view('signups.show',compact('signup'));
    }
    public function edit($id) {
        $signup = SignUp::find($id);
        return view('signups.edit',compact('signup'));
    }
    public function shirts() {
        $shirts = SignUp::select(DB::Raw('t_shirt, COUNT(*) as count'))
            ->groupBy('t_shirt');
        foreach ($shirts as $shirt) {
            dd($shirt);
        }
    }
    public function export() {
        return Excel::download(new OrderExport, 'raceorder.xlsx');
    }
}
