<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User as User;
use App\Application as Application;
use App\Message as Message;
use App\Ad as Ad;
use App\Category as Category;
use App\Image as Image;
use App\Favorite as Favorite;
use App\WorkHistory as WorkHistory;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Redirect;
use Session;

class UserController extends Controller {

    /**
     * Show the profile for the logged in user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getUserProfile()
    {   
        $user = Session::get('user');
        $avatar = $user->image;
        $workHistory = $user->workHistory;
        return view('user.profile', ['workHistory' => $workHistory,'avatar' => $avatar['path']]);
    }

    //show profile for requested user
    public function getProfile($uid)
    {   
        $user = User::where('id', $uid)->with('image')->with('workHistory')->get();
        return view('user.user_profile', ['user' => $user]);
    }

    public function getUserLogin()
    {
        return view('user.login');
    }

    public function getAdminLogin()
    {
        return view('admin.login');
    }

    public function getUsers()
    {
        return view('user.users');
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

    public function postAdminLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $user = User::where('email', $email)->where('is_admin',1)->first();
        
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
        'gender'            => 'required',
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
        $categories[] = Input::get('category');

        $language = Input::get('language');
        // $type_of_work = Input::get('term');
        // $level = Input::get('career_level');


        $results = array();
        foreach ($categories as $category) {
            $results = Category::where('id', $categories)->with('ads')->get();
        }
                
        return $results;
        return view('ad.searchResults', ['ads' => $results]);
    }

    public function updateEducation()
    {
        $data_input = Input::get('data_input');
        $user = Session::get('user');
        $user->education = $data_input;
        $user->save();
        return 1;

    }
    public function updateCountry()
    {
        $data_input = Input::get('data_input');
        $user = Session::get('user');
        $user->country = $data_input;
        $user->save();
        return 1;    
    }
    public function updateCity()
    {
        $data_input = Input::get('data_input');
        $user = Session::get('user');
        $user->city = $data_input;
        $user->save();
        return 1;  
    }
    public function updateRegion()
    {
        $data_input = Input::get('data_input');
        $user = Session::get('user');
        $user->region = $data_input;
        $user->save();
        return 1;  
    }
    public function updateBirthdate()
    {
        $data_input = Input::get('data_input');
        $user = Session::get('user');
        $user->birthdate = $data_input;
        $user->save();
        return 1;  
    }
    // public function updateGender()
    // {
    //     $data_input = Input::get('data_input');
    //     $user = User::find(1);
    //     $user->country = $data_input;
    //     $user->save();
    //     return 1;  
    // }
    public function updatePhone()
    {
        $data_input = Input::get('data_input');
        $user = Session::get('user');
        $user->phone = $data_input;
        $user->save();
        return 1;  
    }
    public function updateDescription()
    {
        $data_input = Input::get('data_input');
        $user = Session::get('user');
        $user->description = $data_input;
        $user->save();
        return 1;
    }

    public function updateSkills()
    {
        $data_input = Input::get('data_input');
        $user = Session::get('user');
        $user->skills = $data_input;
        $user->save();
        return 1;
    }

    public function updateAvatar(Request $request)
    {

    // get current time and append the upload file extension to it,
    // then put that name to $photoName variable.
    $photoName = time().'.'.$request->data_input->getClientOriginalExtension();

    /*
        talk the select file and move it public directory and make avatars
        folder if doesn't exsit then give it that unique name.
    */
    $user = Session::get('user');
    $request->data_input->move(public_path('photos'), $photoName);
    if(!$user->image)
    {
    $image = new Image;
    $image->user_id = $user->id;
    $image->path = '/photos/' . $photoName;
    $image->save();
    }else{
        $image = $user->image;
        $image->user_id = $user->id;
        $image->path = '/photos/' . $photoName;
        $image->save();
    }
    return redirect()->back();

    }

    public function getHistory()
    {
        $history = Application::where('user_id', Session::get('user')->id)->with('ad.company')->get();
        // return $history;
        return view('user.history', ['ads' => $history]);
    }

    public function updatePopup(Request $request)
    {
       $workHistory = new WorkHistory;
       $workHistory->position = $request->position;
       $workHistory->company_name = $request->company_name;
       $workHistory->year_from = $request->year_from;
       $workHistory->year_to = $request->year_to;
       $workHistory->month_from = $request->month_from;
       $workHistory->month_to = $request->month_to;
       $workHistory->description = $request->description;
       $workHistory->user_id = Session::get('user')->id;
       $workHistory->save(); 
       return $workHistory;
    }

    public function getPopUpData(Request $request)
    {
        $data = WorkHistory::where('id', $request->whid)->get();
        return $data;
    }




}