<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User as User;
use App\Application as Application;
use App\Message as Message;
use App\Ad as Ad;
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
        return redirect('/');
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
        }
    }

    public function getMessages()
    {
        $messages = Application::where('user_id', Session::get('user')->id)->with('company')->get();
        return view('user.messages', ['applications' => $messages]);
    }

    public function postUserMessage()
    {
        $message = New Message;
        $message->application_id = Input::get('application_id');
        $message->text = Input::get('text');
        $message->first_name = Input::get('first_name');
        $message->last_name = Input::get('last_name');
        $message->save();
        return redirect()->back();
    }

    public function getUserConversation($aid)
    {  
         $application = Application::where('id', $aid)->with('messages')->orderBy('created_at')->with('user')->with('company')->get();
        return view('user.conversation', ['conversation' => $application ]);
    }

    public function getSearchResults()
    {
        $category = Input::get('category');
        $results = Ad::where('category', 'LIKE', '%$category%')->get();
        return $results;
    }

    public function updateEducation()
    {
        $data_input = Input::get('data_input');
        $user = User::find(1);
        $user->education = $data_input;
        $user->save();
        return $data_input;

    }
    public function updateCountry()
    {
        
    }
    public function updateCity()
    {
        
    }
    public function updateRegion()
    {
        
    }
    public function updateBirthdate()
    {
        
    }
    public function updateGender()
    {
        
    }
    public function updatePhone()
    {
        
    }
    public function updateDescription()
    {
        
    }

}