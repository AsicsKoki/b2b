<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CompanyController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getProfile($id)
    {
        return view('user.profile', ['company' => Company::findOrFail($id)]);
    }

}