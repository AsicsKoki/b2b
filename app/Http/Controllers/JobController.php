<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ad as Ad;
use App\Company as Company;
use App\Application as Application;
use App\Conversation as Conversation;
use App\Message as Message;
use App\Favorite as Favorite;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class JobController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getJobs()
    {
        return view('ad.allAds', ['ads' => Ad::with('company.image')->simplePaginate(10)]);
    }

    public function getUserFavorites()
    {
        $ads = Ad::with('company.image')->whereHas('favorites', function ($query){
            $query->where('user_id', Session::get('user')->id);
        })->simplePaginate(10);
        return view('user.favorites', ['ads' => $ads]);

    }

    public function getJob($jid)
    {  
        $ad = Ad::where('id', $jid)->with('company.image')->with('categories')->get();
        return view('ad.ad', ['ad' => $ad]);
    }

    public function getAllJobs()
    {

        return view('ad.allAds', ['ads' => Ad::where('company_id', Auth::user()->id)->with('company.image')->simplePaginate(10)]);
    }

    public function getJobsByCategory($catid)
    {  
        $ads = Ad::with('company.image')->whereHas('categories', function ($query) use ($catid){
            $query->where('category_id', $catid);
        })->simplePaginate(10);
        return view('user.favorites', ['ads' => $ads]);
    }

    public function getNewJob()
    {
        return view('company.new-job-add');
    }

    public function getNewJobStandard()
    {  
        return view('company.new-job-standard');
    }

    public function getNewJobCustom()
    {  
        return view('company.new-job-custom');
    }

    public function getNewJobFullCustom()
    {  
        return view('company.new-job-full-custom');
    }

    public function getNewJobConfidental()
    {  
        return view('company.new-job-confidental');
    }

    public function postNewJob()
    {
        $categories = Input::get('categories');

        $ad = new Ad(Input::all());
        $ad->approved = 0;
        $ad->company_id = Auth::user()->id;
        $ad->save();
        foreach ($categories as $category) {
            \DB::table('ad_categories')->insert([
                'ad_id'        => $ad->id,
                'category_id'  => $category
            ]);
        }

        return redirect()->route('getControlPanel');
    }

    public function getJobApplication($jid, $cid)
    {  
        return view('ad.application', ['jid' => $jid, 'cid' => $cid]);
    }

    public function getApplications()
    {
        $applications = Application::where('company_id', Auth::user()->id)->with('ad')->with('user')->get();
        return view('company.applications', ['applications' => $applications]);
    }

    public function postJobApplication()
    {  
        $application = new Application(Input::all());
        $application->save();

        $message = New Message;
        $message->application_id = $application->id;
        $message->text = Input::get('text');
        $message->first_name = Input::get('first_name');
        $message->last_name = Input::get('last_name');
        $message->save();
        return redirect()->route('getJobs');
    }

    public function getConversation($aid)
    {  
        $application = Application::where('id', $aid)->orderBy('application.created_at','DESC')->with('messages')->orderBy('created_at')->with('user')->with('company')->get();
        return view('ad.conversation', ['conversation' => $application ]);
    }

    public function getToday()
    {  
        return view('ad.allAds', ['ads' => Ad::with('company.image')->where('approved', '=', '1')->where('created_at', '>=', Carbon::today())->simplePaginate(10)]);
    }

    public function postSendMessage()
    {
        $message = New Message;
        $message->application_id = Input::get('application_id');
        $message->text = Input::get('text');
        $message->company_name = Input::get('company_name');
        $message->save();
        return redirect()->back();
    }

    // chat 
    public function getRefresh()
    {
        $timestamp = Input::get('timestamp');
        $application_id = Input::get('application_id');
        $result = Message::find($application_id)->where('created_at', '>' , $timestamp)->get();
        return $result->toJson();

    }

        public function updateFav()
    {
        $user = Session::get('user');
        $ad = $_POST['id'];
        $favorite = new Favorite;
        $favorite->user_id = $user->id;
        $favorite->ad_id = $ad;
        $favorite->save();
        return 1;
    }

    public function removeFav()
    {
        $user = Session::get('user');
        $ad = $_POST['id'];
        $favorite = Favorite::where('user_id', $user->id)->where('ad_id',$ad)->delete();
    }


}