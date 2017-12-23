<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ad as Ad;
use App\User as User;
use App\Report as Report;
use Mail as Mail;
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
        $companies = Company::with('image')->simplePaginate(10);
        // return $companies;
        return view('admin.allCompanies', ['companies' => $companies]);
    }

    public function getAdminUsers()
    {
        return view('admin.panel');
    }

    public function getReports()
    {
        $reports = Report::with('ad')->get();
        // return $reports;
        return view('admin.reports', ['reports' => $reports]);
    }

    public function getReportsCompanies()
    {
        $reports = Report::with('company')->get();
        return $reports;
        return view('admin.reports', ['reports' => $reports]);
    }

    public function reportAd($aid)
    {
        $report = new Report;
        $report->text = Input::get('text');
        $report->ad_id = $aid;
        $report->save();
        return redirect()->back();
    }

    public function adminEditAd($aid)
    {
        $ad = Ad::where('id', $aid)->with('company.image')->with('categories')->first();
        return view('admin.editAd',['ad' => $ad]);
    }

    public function postAdminEditAd(Request $request)
    {
        $categories = Input::get('categories');

        $ad=Ad::where('id', $request->aid)->with('company.image')->with('categories')->first();
        $ad->position=$request->position;
        $ad->description=$request->description;
        $ad->job_type=$request->job_type;
        $ad->career_level=$request->career_level;
        $ad->students=$request->students;
        $ad->low_experience=$request->low_experience;
        $ad->country=$request->country;
        $ad->city=$request->city;
        $ad->salary_type=$request->salary_type;
        $ad->salary_from=$request->salary_from;
        $ad->salary_to=$request->salary_to;
        $ad->currency=$request->currency;
        // languages?
        $ad->external_url=$request->external_url;


        //fale kategorije
        if($categories)
        foreach ($categories as $category) {
        \DB::table('ad_categories')->insert([
            'ad_id'        => $ad->id,
            'category_id'  => $category
        ]);
        }

        $ad->save();

        return redirect()->route('getSpecificJob', ['aid' => $ad->id]);
    }

    public function deleteAd($aid, $request)
    {
        return 123;
        $ad = Ad::where('id', $aid)->first();
        $ad->delete();
        if($request->ajax()){
            return redirect()->route('getAdminAds');
        }
        return 1;
    }

    public function updateAdStatus($aid)
    {
        $status = Input::get('status');
        $ad = Ad::where('id', $aid)->first();
        $ad->approved = $status;
        $ad->save();
        return 1;  
    }

    public function updateCompanyStatus($cid)
    {
        $status = Input::get('status');
        $ad = Company::where('id', $cid)->first();
        $ad->active = $status;
        $ad->save();
        return 1;  
    }

}