<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company as Company;
use App\Ad as Ad;

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
        $companies = Company::with('image')->get();
        $ads = Ad::with('company')->get();
        return view('home', ['companies' => $companies, 'ads' => $ads]);
    }
}
