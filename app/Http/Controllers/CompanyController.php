<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;

class CompanyController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


    public function register()
    {

    }

    public function authenticate()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {
            return redirect()->back();
        }
    }


    public function getProfile($id)
    {
        return view('user.profile', ['company' => Company::findOrFail($id)]);
    }

}