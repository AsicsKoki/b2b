<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User as User;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Session;

class UserController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getUserProfile()
    {
        return view('user.profile');
    }

    public function getUserLogin()
    {
        return view('user.login');
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return view('home');
    }

    public function postUserLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        
        $user = User::where('email', $email)->first();

        if ($user &&  Hash::check(Input::get('password'), $user->password)) {
            Session::put('user', $user);
            return redirect()->route('getHome');
        }
        return redirect()->back()->withErrors(['error', 'Wrong email or password!']);
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