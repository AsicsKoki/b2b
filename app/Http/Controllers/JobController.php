<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

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
        return view('user.profile', ['jobs' => Job::All()]);
    }

}