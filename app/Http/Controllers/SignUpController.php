<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SignUp;

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
}
