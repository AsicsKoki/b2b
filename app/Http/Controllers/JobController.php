<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ad as Ad;
use App\Company as Company;
use App\Application as Application;
use App\Conversation as Conversation;
use App\Message as Message;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JobController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getJobs()
    {
        //modffy to take id from session, edit view once created
        return view('ad.allAds', ['ads' => Ad::with('company.image')->get()]);
    }

    public function getJob($jid)
    {  

        $ad = Ad::find($jid);
        $company = $ad->company;
        return view('ad.ad', ['ad' => $ad, 'company' => $company]);
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
        $ad = new Ad(Input::all());
        $ad->approved = 0;
        $ad->company_id = Auth::user()->id;
        $ad->save();
        return redirect()->route('getControlPanel');
    }

    public function getJobApplication($jid, $cid)
    {  
        return view('ad.application', ['jid' => $jid, 'cid' => $cid]);
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
        return redirect()->route('getAllJobs');
    }

    public function getConversation($aid)
    {  
        $application = Application::where('id', $aid)->with('messages')->orderBy('created_at')->with('user')->with('company')->get();
        return view('ad.conversation', ['conversation' => $application ]);
    }

    public function getToday()
    {  
        return view('ad.allAds', ['ads' => Ad::with('company.image')->where('approved', '=', '1')->where('created_at', '>=', Carbon::today())->get()]);
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

    public function getRefresh()
    {
        $timestamp = Input::get('timestamp');
        $application_id = Input::get('application_id');
        $result = Message::find($application_id)->where('created_at', '>' , $timestamp)->get();
        return $result->toJson();

    }


}