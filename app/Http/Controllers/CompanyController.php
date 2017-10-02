<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Company as Company;
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
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {
            return redirect()->back();
        }
    }


    public function getProfile()
    {
        return view('company.profile');
    }

    public function postLogin()
    {
        return '123';
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
        // 'manager_first_name'                       => 'required',
        // 'manager_last_name'                        => 'required',
        // 'manager_position'                         => 'required',
        // 'manager_phone'                            => 'required',
        // 'manager_email'                            => 'required',
        // 'administrative_contact_first_name'        => 'required',
        // 'administrative_contact_last_name'         => 'required',
        // 'administrative_contact_position'          => 'required',
        // 'administrative_contact_business_phone'    => 'required',
        // 'administrative_contact_business_email'    => 'required',


    ]);
    $company = new Company(Input::all());
    $company->save();
    return redirect()->route('getCompanyRegisterStep2', ['id' => $company->id]);
    }

    public function getControlPanel()
    {
        return view('company.panel');
    }

    public function getRegisterStep2()
    {
        $id = Input::get('id');
        return $id;
        return view('company.step-2');
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
    $request->user_photo->move(public_path('photos'), $photoName);

    return redirect()->route('getCompanyRegisterStep3');

    }

    public function getRegisterStep3()
    {
        return view('company.step-3');
    }

}