<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Company as Company;
use App\Image as Image;
use App\BusinessCard as BusinessCard;
use App\Application as Application;

use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class CompanyController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


    public function getRegister()
    {
        return view('company.register');
    }
    public function getLogin()
    {
        return view('company.login');
    }

    public function authenticate()
    {
        $username = Input::get('username');
        $password = Input::get('password');
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            // Authentication passed...
            return redirect()->route('getHome');
        } else {
            // Auth failed...
            return redirect()->back()->withErrors(['error', 'Wrong username or password!']);
        }
    }


    public function getProfile($id)
    {
        $company = Company::find($id);
        $businessCard = $company->businessCard;
        $ads = $company->ads;
        $logo = $company->image;
        $cover = $company->image->where('is_cover',1)->get();
        return view('company.profile', ['company' => $company, 'ads' => $ads, 'businessCard' => $businessCard, 'logo' => $logo['path'],'cover' => $cover[0]['path']]);
    }

    public function postRegister(Request $request)
    {

    $request->validate([
        'company_name'                             => 'required',
        'country'                                  => 'required',
        'foreign_name'                             => 'required',
        // 'email'                                    => 'required',
        'password'                                 => 'required',
        'username'                                 => 'required',
        'register_type'                            => 'required',
        'pib'                                      => 'required',
        'company_registered_office'                => 'required',
        'company_type'                             => 'required',
        // 'sector'                                   => 'required',
        'newsletter'                               => 'required',
        'authorized_person'                        => 'required',
        // 'key'                                      => 'required',
        'has_vat'                                  => 'required',
        'company_website'                          => 'required',
        'company_phone'                            => 'required',
        'company_address'                          => 'required',
        'first_name'                               => 'required',
        'last_name'                                => 'required',
        'position'                                 => 'required',
        'business_phone'                           => 'required',
        'business_email'                           => 'required',
    ]);
    $company = new Company(Input::all());
    $company->password = Hash::make(Input::get('password'));
    $company->save();
    return redirect()->route('getCompanyRegisterStep2', ['id' => $company->id]);
    }

    public function getRegisterStep2()
    {
        $id = Input::get('id');
        return view('company.step-2', ['id' => $id]);
    }

    public function postRegisterStep2(Request $request)
    {

    // get current time and append the upload file extension to it,
    // then put that name to $photoName variable.
    $photoName = time().'.'.$request->company_logo->getClientOriginalExtension();

    /*
        talk the select file and move it public directory and make avatars
        folder if doesn't exsit then give it that unique name.
    */
    $request->company_logo->move(public_path('photos'), $photoName);
    $image = new Image;
    $image->company_id = Input::get('id');
    $image->path = '/photos/' . $photoName;
    $image->save();
    return redirect()->route('getCompanyRegisterStep3', ['id' => Input::get('id')]);

    }

    public function postEditCompany(Request $request)
    {
        $company=Company::find($request->cid);
        $businessCard = $company->businessCard;

        $company->country = $request->country;
        $company->company_name  = $request->company_name;
        $company->company_website = $request->company_website;
        $company->company_address = $request->company_address;
        $company->company_phone = $request->company_phone;
        $company->about_us = $request->about_us;
        $company->career = $request->career;
        $businessCard->number_of_employees = $request->number_of_employees;

        $company->sector = implode(',' , $request->sectors); 

        $company->save();
        $businessCard->save();

        $photoName = time().'.'.$request->company_cover->getClientOriginalExtension();
        $request->company_cover->move(public_path('photos'), $photoName);
        if(!$company->image->is_cover === 1)
        {
            $image = new Image;
            $image->company_id = $request->cid;
            $image->path = '/photos/' . $photoName;
            $image->is_cover = 1;
            $image->save();
        }else{
            $image = $company->image;
            $image->company_id = $request->cid;
            $image->path = '/photos/' . $photoName;
            $image->is_cover = 1;
            $image->save();
        }

    return redirect()->back();
    }

    public function getRegisterStep3()
    {
        return view('company.step-3',['id' => Input::get('id')]);
    }

    public function postRegisterStep3(Request $request)
    {
        $bcard = BusinessCard::valid($request);
        return redirect()->route('getCompanyLogin');
    }

    public function getControlPanel()
    {
        $company = Company::find(Auth::user()->id);
        $applications = Application::where('company_id', Auth::user()->id)->with('ad')->with('user')->get();
        return view('company.panel', ['applications' => $applications, 'company' => $company]);
    }

    public function getEditCompany()
    {
        $company = Company::find(Auth::user()->id);
        $businessCard = $company->businessCard;
        return view('company.edit', ['company' => $company , 'businesscard' => $businessCard]);
    }

    public function updateAboutUs()
    {
        $about_us = Input::get('about_us');
        $company = Company::find(Auth::user()->id);
        $company->about_us = $about_us;
        $company->save();
        return 1;

    }

    public function updateCareer()
    {
        $career = Input::get('career');
        $company = Company::find(Auth::user()->id);
        $company->career = $career;
        $company->save();
        return 1;
    }

    public function editBuisnessCard()
    {
        $businessCard = BusinessCard::find(Auth::company()->id);
        $businessCard->career = $career;
        return $businessCard->save();
    }

    public static function getCover(Request $requst)
    {
        $company = Company::find(Auth::user()->id);
        $cover = $company->image->where('is_cover',1)->get();
        return $cover;
    }

}