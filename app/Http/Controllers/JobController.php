<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ad as Ad;
use App\User as User;
use Mail as Mail;
use App\Company as Company;
use App\Application as Application;
use App\Conversation as Conversation;
use App\Message as Message;
use App\Favorite as Favorite;
use App\File as File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Mail\NewAd;
use App\Mail\NewMessageUser;


class JobController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getJobs()
    {
        return view('ad.allAds', ['ads' => Ad::with('company.image')->where('approved', 1)->simplePaginate(10)]);
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
        $ad = Ad::where('id', $jid)->with('company.image')->with('categories')->first();
        $ad->page_visits = $ad->page_visits + 1;
        $ad->save();
        return view('ad.ad', ['ad' => $ad]);
    }

    public function getAllJobs()
    {
        return view('company.myAds', ['ads' => Ad::where('company_id', Auth::user()->id)->with('company.image')->simplePaginate(10)]);
    }

    public function getApplicants($aid)
    {
        // return '123';
        $ad = Ad::with('applications.user')->where('id', $aid)->get();
        return view('snippets.applicants', ['applicants' => $ad[0]->applications]);
    }

    public function getJobsByCategory($catid)
    {  
        $ads = Ad::with('company.image')->whereHas('categories', function ($query) use ($catid){
            $query->where('category_id', $catid);
        })->where('approved', 1)->simplePaginate(10);
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
        $admins = User::where('is_admin', 1)->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new NewAd($ad,'A new ad has been posted for your approval.'));
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

    public function postJobApplication(Request $request)
    {  
        $application = new Application(Input::all());
        $application->save();

        // get current time and append the upload file extension to it,
        // then put that name to $fileName variable.
        $message = New Message;
        $message->application_id = $application->id;
        $message->text = Input::get('text');
        $message->first_name = Input::get('first_name');
        $message->last_name = Input::get('last_name');
        $message->save();
        if ($request->file('file_input')) {
            $file = $request->file('file_input');
            $fileName = time().'.'.$file->getClientOriginalExtension();

            /*
                talk the select file_input and move it public directory
            */
            $file->move(public_path('files'), $fileName);
            $file = New File;
            $file->message_id = $message->id;
            $file->application_id = $application->id;
            $file->path = '/files/' . $fileName;
            $file->save();
        }
        $user = Session::get('user');

        $company = Company::where('id', Input::get('company_id'))->first();
        $ad = Ad::where('id', Input::get('ad_id'))->first();
        Mail::to($company->business_email)->send(new NewMessageUser($ad,'You have a new applicant!'));
        \Session::flash('msg_applied', 'You have successfully applied for this job.');
        return redirect()->route('getSpecificJob', ['jid' => Input::get('ad_id')]);
    }

    public function getConversation($aid)
    {  
        $application = Application::where('id', $aid)->with('messages')->orderBy('created_at')->with('user')->with('company')->first();
        $application->notification = 0;
        $application->update();
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

        $application = Application::where('id', Input::get('application_id'))->first();
        $application->notification = 1;
        $application->update();
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