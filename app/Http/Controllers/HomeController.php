<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company as Company;
use App\Ad as Ad;
use Session;
use Illuminate\Mail\Mailer;
use Mail;
use App\Mail\Template as Template;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::with('image')->limit(12)->get();
        $ads = Ad::with('company')->limit(5)->get();
        return view('home', ['companies' => $companies, 'ads' => $ads]);
    }

    public function get404()
    {
        return view('404');
    }

    public function sendMail()
    {
        $user = Session::get('user');
        Mail::to('cpt.koki@gmail.com')->send(new Template($user,'Welcome to naposao.rs payment gateway!'));
        return redirect()->back();
    }

    public function submitPayment()
    {
        \Stripe\Stripe::setApiKey('sk_test_sQWHOV4aMUS3Y3kO321JlF1i');
        // Get the token from the JS script
        $token = Input::get('stripeToken');
        // user info
        $amount = Input::get('hidden_ammount');
        $name = Input::get('name');
        $lastName = Input::get('lastName');
        $email = Input::get('email');
        // Create a Customer
        $customer = \Stripe\Customer::create(array(
            "email" => $email,
            "source" => "tok_amex",
            'metadata' => array("name" => $name, "last_name" => $lastName)
        ));

        $charge = \Stripe\Charge::create(array(
            "amount" => $amount*100,
            "currency" => "RSD",
            "source" => $token, // obtained with Stripe.js
            'metadata' => array("name" => $name, "last_name" => $lastName)
        ));

        return $charge;

        if ($charge) {
            // $user = User::where('id',Auth::user()->id)->with('invoices')->first();
            // $invoice = new Invoice;
            // $invoice->first_name = Input::get('name');
            // $invoice->last_name = Input::get('lastName');
            // $invoice->email = Input::get('e-mail');
            // $invoice->city = Input::get('city');
            // $invoice->country = Input::get('country');
            // $invoice->area_code = Input::get('statenum');
            // $invoice->zip = Input::get('zip');
            // $invoice->address = Input::get('address');

            // $user->invoices()->attach($invoice);
            // $user->save();
            
           // Mail::to($user->email)->send(new EmailConfirmation($user,"Thank you for your donation, $user->first_name $user->last_name!")); 

            return $charge;
           // return redirect::route('subscribe');
        }
    }
}
