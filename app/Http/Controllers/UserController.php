<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller {



    // Only allow authenticated users
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getProfile($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    public function getUserLogin()
    {
        return view('user.login');
    }

}