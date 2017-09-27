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


    public function getRegister()
    {
        return view('company.register');
    }

    public function getLogin()
    {
        return view('company.login');
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


    public function getProfile()
    {
        return view('company.profile');
    }

}