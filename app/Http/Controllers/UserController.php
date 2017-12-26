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
use Mail as Mail;
use App\Mail\Confirm;
use App\Mail\ResetPassword;

class UserController extends Controller {

    /**
     * Show the profile for the logged in user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getUserProfile()
    {   
        $uid = Session::get('user')->id;
        $user = User::where('id', $uid)->with('image')->with('workHistory')->first();
        $avatar = $user->image;
        $workHistory = $user->workHistory;
        $languages = $user->languages;

        return view('user.profile', ['languages' => $languages, 'workHistory' => $workHistory,'avatar' => $avatar['path']]);
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

    public function getUsers()
    {
        $users = User::with('image')->get();
        return view('user.users' , ['users' => $users]);
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
        
        if ($user->active == 0) {
            return redirect()->back()->with('error', 'Please confirm your account!');
        }
        if ($user &&  Hash::check(Input::get('password'), $user->password)) {
            Session::put('user', $user);
            return redirect()->route('getHome');
        }
        return redirect()->back()->with('error', 'Wrong email or password!');
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

    public function getResetPasswordEmail()
    {
        return view('user.resetPasswordEmailForm');
    }

    public function sendResetPasswordEmail()
    {
        $user = User::where('email', Input::get('email'))->first();
        $user->token = app('App\Http\Controllers\UserController')->RandomString();
        $user->save();
        Mail::to($user->email)->send(new ResetPassword($user,'naposao.rs, password reset confirmation!'));
        \Session::flash('msg', 'Registered! Please check your email!' );
        return redirect()->route('getHome')->with('message', 'An email has been sent to your account, please follow instructions to reset your password');
    }

    public function getResetPassword($token)
    {
        return view('user.resetPasswordForm', ['token' => $token]);
    }

    public function setNewPassword($token)
    {
        $user = User::where('token', $token)->first();
        if (!strcmp(Input::get('password'), Input::get('repeat_password'))){
            $user->password = Hash::make(Input::get('password'));
            $user->save();
        }
        return redirect()->route('getHome')->with('message', 'Your password has been changed. Please log in.');
    }

    public function RandomString()
       {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $charactersLength ; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function confirmUser($token)
    {
       $user = User::where('token', $token)->first();
       if ($user) {
            $user->active = 1;
            $user->save();
            return redirect::route('getHome')->with('success','Account has been validated! Please login in.');
       }
       return view('user.register')->withErrors(['error', 'Tokens do not match!']);
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
    if(User::where('email', '=', Input::get('email'))->count() > 0) {
        return Redirect::back()->with('error', 'User with this email already exists!');
    }
    if (!strcmp(Input::get('password'), Input::get('confirm_password')) &&  !strcmp(Input::get('email'), Input::get('confirm_email'))) {
        $user = new User(Input::all());
        $user->password = Hash::make(Input::get('password'));
        $user->active = 0;
        $user->token = app('App\Http\Controllers\UserController')->RandomString();
        $user->save();
        Mail::to($user->email)->send(new Confirm($user,'Welcome to naposao.rs. Please verify your account!'));
        \Session::flash('msg', 'Registered! Please check your email!' );
        return redirect()->route('getHome')->with('message', 'Email has been sent to your account, click the link in the email to confirm your account.');
    } else {
        return Redirect::back()->with('error', 'Email or password do not match!');
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

        $application = Application::where('id', $aid)->with('messages')->orderBy('created_at')->with('user')->with('company')->first();
        $application->notification = 0;
        $application->update();
        return view('user.conversation', ['conversation' => $application ]);
    }

    public function getSearchResults()
    {
        $categories[] = Input::get('category');
        // return $categories;
        if (empty($categories[0]) && empty(Input::get('term'))) {
            $results = Ad::with('company.image')->simplePaginate(10);
            return view('ad.allAds', ['ads' => $results]);
        }
        if (Input::get('term')) {
            $results = Ad::where('position', 'LIKE', '%'. Input::get('term') .'%')->with('company.image')->with('categories')->simplePaginate(10);
            return view('ad.allAds', ['ads' => $results]);
        } else {
            $results = array();
            foreach ($categories as $category) {
                $results = Category::where('id', $categories)->with('ads')->simplePaginate(10);
            }
            return view('ad.searchResults', ['ads' => $results]);    
        }
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

        $data = $request->img;


        list($type, $data) = explode(';', $data);

        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);

        $image_name= time().'.png';

        $path = public_path() . "/photos/" . $image_name;


        file_put_contents($path, $data);

    // get current time and append the upload file extension to it,
    // then put that name to $photoName variable.

   // $photoName = time().'.'.$request->data_input->getClientOriginalExtension();

    /*
        talk the select file and move it public directory and make avatars
        folder if doesn't exsit then give it that unique name.
    */
    $user = Session::get('user');
  //  $request->data_input->move(public_path('photos'), $photoName);
    if(!$user->image)
    {
    $image = new Image;
    $image->user_id = $user->id;
    $image->path = '/photos/' . $image_name;
    $image->save();
    }else{
        $image = $user->image;
        $image->user_id = $user->id;
        $oldimage = public_path($user->image->path);
        $image->path = '/photos/' . $image_name;
        $image->save();

        
        if(file_exists($oldimage))
        {
            unlink($oldimage);
        }
    }
    return redirect()->back();

    }

        // public function imageCropPost(Request $request)
        //     {

        //         $data = $request->image;


        //         list($type, $data) = explode(';', $data);

        //         list(, $data)      = explode(',', $data);


        //         $data = base64_decode($data);

        //         $image_name= time().'.png';

        //         $path = public_path() . "/photos/" . $image_name;


        //         file_put_contents($path, $data);

        //         $company = Company::find(Auth::user()->id);

        //         if(!$company->image)
        //         {
        //         $image = new Image;
        //         $image->company_id = $company->id;
        //         $image->path = '/photos/' . $image_name;
        //         $image->save();
        //         }else{
        //             $image = $company->image;
        //             $image->company_id = $company->id;
        //             $oldimage = public_path($company->image->path);
        //             $image->path = '/photos/' . $image_name;
        //             $image->save();

        //             if(file_exists($oldimage))
        //             {
        //                 unlink($oldimage);
        //             }
        //         }

        //     //  return redirect()->back();
        //         return response()->json(['success'=>'done']);

        //     }

    public function getHistory()
    {
        $history = Application::where('user_id', Session::get('user')->id)->with('ad.company')->simplePaginate(10);
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

    public function removeHistory()
    {
        $workHistory = WorkHistory::find($_POST['whid']);
        $workHistory->delete();
        return redirect()->back();
    }

    public function updateLanguages()
    {
        $user = Session::get('user');
        $languages = implode(',' , Input::get('languages')); 
     //   $user->languages()->attach($languages); // ovo ne radi trenutno
        $user->language = $languages;
        $user->save();

    }

    public function imageCrop2()
    {
        return view('imageCrop2');
    }






}