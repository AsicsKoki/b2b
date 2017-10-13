<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User as User;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller {

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

    public function logout()
    {
        Auth::logout();
        return view('home');
    }

    public function postUserLogin()
    {
        return redirect()->route('getHome');
    }

    public function getUserRegister()
    {
        return view('user.register');
    }

    public function postUserRegister(Request $request)
    {
    $request->validate([
        'first_name'        => 'required',
        'last_name'         => 'required',
        'email'             => 'required',
        'confirm_email'     => 'required',
        'password'          => 'required',
        'confirm_password'  => 'required',
    ]);
    if (!strcmp(Input::get('password'), Input::get('confirm_password')) &&  !strcmp(Input::get('email'), Input::get('confirm_email'))) {
            $user = new User(Input::all());
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            return redirect()->route('getHome');
    } else {
        return Redirect::back()->withErrors(['error', 'Email or password do not match!']);
        // return Input::all();
        }
    }
}