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
        'name'                                     => 'required',
        'email'                                    => 'required',
        'password'                                 => 'required',
        'register_type'                            => 'required',
        'pib'                                      => 'required',
        'foreign_name'                             => 'required',
        'company_type'                             => 'required',
        // 'sector'                                   => 'required',
        'website'                                  => 'required',
        'phone'                                    => 'required',
        'address'                                  => 'required',
        'first_name'                               => 'required',
        'last_name'                                => 'required',
        'position'                                 => 'required',
        'business_phone'                           => 'required',
        'business_email'                           => 'required',
        'newsletter'                               => 'required',
        'username'                                 => 'required',
        'is_manager'                               => 'required',
        'manager_first_name'                       => 'required',
        'manager_last_name'                        => 'required',
        'manager_position'                         => 'required',
        'manager_phone'                            => 'required',
        'manager_email'                            => 'required',
        'key'                                      => 'required',
        'has_vat'                                  => 'required',
        'administrative_contact_first_name'        => 'required',
        'administrative_contact_last_name'         => 'required',
        'administrative_contact_position'          => 'required',
        'administrative_contact_business_phone'    => 'required',
        'administrative_contact_business_email'    => 'required',


    ]);
    $company = new Company(Input::all());
    $company->save();
        return $company->toArray();
    }


}