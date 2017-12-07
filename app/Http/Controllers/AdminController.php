<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ad as Ad;
use App\User as User;
use App\Company as Company;
use App\Application as Application;
use App\Conversation as Conversation;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class AdminController extends Controller {

    public function getAdminLogin()
    {
        return view('admin.login');
    }

    public function postAdminLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $user = User::where('email', $email)->first();

        if ($user->is_admin === 1) {
            if ($user &&  Hash::check(Input::get('password'), $user->password)) {
                Session::put('user', $user);
                return redirect()->route('getAdminPanel');
            }
            return redirect()->back()->withErrors(['error', 'Wrong email or password!']);
        }
        return redirect()->back()->withErrors(['error', 'You are not an admin!']);
    }

    public function getAdminPanel()
    {

        return view('admin.panel');
    }

    public function getAdminAds()
    {
        $ads = Ad::with('company.image')->simplePaginate(10);
        return view('admin.allAds', ['ads' => $ads]);
    }

    public function getAdminCompanies()
    {
        return view('admin.panel');
    }

    public function getAdminUsers()
    {
        return view('admin.panel');
    }

    public function getReports()
    {
        return view('admin.panel');
    }

    public function updateAdStatus()
    {
        $approved = Input::get('status');
        $user = Session::get('user');
        $user->city = $data_input;
        $user->save();
        return 1;  
    }

}