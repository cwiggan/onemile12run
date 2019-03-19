<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe;
use App\SignUp;
use App\RaceResult;
use App\Mail\RaceSignUpd;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class PageController extends Controller
{
    /*
     * Home page
     */
    public function index()
    {
        return view('index');
    }
    /*
    * Home page
    */
    public function pay($payment)
    {

        $charge = Stripe::charges()->create([
            'currency' => 'USD',
            'amount'   => 65.00,
            'source'   => $payment
        ]);

        return $charge['id'];
    }

    /*
     * Home page
     */
    public function contact(Request $request)
    {
        Mail::to('hello@1milewithasmile.com')->send(new ContactUs($request->all()));

        return response()->json([
            'success' => true,
            'message' => 'success'
        ]);
    }
    /*
 * Home page
 */
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            //'birth_date' => 'required|date',
            'gender' => 'required',
            'emergency_name' => 'required',
            'emergency_phone' => 'required',
            't_shirt' => 'required',
            'stripe' => 'required'
        ]);

        $transaction_id = $this->pay($request->stripe);

        if (!empty($transaction_id)) {
            $signUp = new SignUp;
            $signUp->first_name = $request->input('first_name');
            $signUp->last_name = $request->input('last_name');
            $signUp->email = $request->input('email');
            $signUp->phone = $request->input('phone');
            $signUp->address = $request->input('address');
            $signUp->city = $request->input('city');
            $signUp->state = $request->input('state');
            $signUp->zip_code = $request->input('zip_code');
            $signUp->birth_date = date('Y-m-9 H:i:s');
            $signUp->gender = $request->input('gender');
            $signUp->t_shirt = $request->input('t_shirt');
            $signUp->emergency_phone = $request->input('emergency_phone');
            $signUp->emergency_name = $request->input('emergency_name');
            $signUp->transaction_id = $transaction_id;
            $signUp->race_id = 1;
            $signUp->save();

            $confirm = [
                'name' =>  $request->input('first_name'),
                'total' => '$65.00',
                'entry' => $signUp->id,
                'date' => '08/10/2019'
            ];

            Mail::to($request->input('email'))->send(new RaceSignUpd($confirm));

            return response()->json([
                'success' => true,
                'confirm' => $confirm
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function getResults($year=2018) {
        if ($year != 'all') {
            $results = RaceResult::where('year', $year)->orderBy('distance', 'desc')->get();
        } else {
            $results = RaceResult::orderBy('distance', 'desc')->get();
        }

        return response()->json([
            'results' => $results
        ]);
    }
}
