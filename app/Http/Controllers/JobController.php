<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ad as Ad;
use App\Company as Company;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;


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
        // return view('ad.allAds', ['ads' => Ad::All()]);
        return view('ad.allAds');
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


}