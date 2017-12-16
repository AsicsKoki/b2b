<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company as Company;
use App\Ad as Ad;
use Session;
use Illuminate\Mail\Mailer;
use Mail;
use App\Mail\Template as Template;

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
}
