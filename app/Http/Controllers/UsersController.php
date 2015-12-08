<?php

namespace PeerReview\Http\Controllers;

use Illuminate\Http\Request;

use PeerReview\Http\Requests;
use PeerReview\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProfile()
    {
        return view('auth.profile');
    }
    public function postProfile(Request $request)
    {
        $user = \PeerReview\User::find(\Auth::user()->id);

        $user->first = $request['first'];
        $user->last = $request['last'];
        $user->email = $request['email'];
        $user->profile->institution = $request['institution'];
        $user->profile->street = $request['street'];
        $user->profile->city = $request['city'];
        $user->profile->state = $request['state'];
        $user->profile->zip = $request['zip'];
        $user->profile->country = $request['country'];
        $user->save();
        $user->profile->save();
        \Session::flash('flash_message', 'Your profile information has been updated.');

        // return view('auth.profile');
        return redirect()->back()->with('user', $user);
    }
    public function getTravel()
    {
        return view('auth.travel');
    }
    public function postTravel(Request $request)
    {
        $user = \PeerReview\User::find(\Auth::user()->id);

        if ($request['submit'] == 'Update Travel Prefs'){
            $user->travel->fromcity = $request['fromcity'];
            $user->travel->fromstate = $request['fromstate'];
            $user->travel->fromcountry = $request['fromcountry'];
            $user->travel->arrivedate = $request['arrivedate'];
            $user->travel->tocity = $request['tocity'];
            $user->travel->tostate = $request['tostate'];
            $user->travel->tocountry = $request['tocountry'];
            $user->travel->departdate = $request['departdate'];
            $user->save();
            $user->travel->save();
            \Session::flash('flash_message', 'Your travel information has been updated.');
        }
        else {
            $user->travel->fromcity = '';
            $user->travel->fromstate = '';
            $user->travel->fromcountry = '';
            $user->travel->arrivedate = '';
            $user->travel->tocity = '';
            $user->travel->tostate = '';
            $user->travel->tocountry = '';
            $user->travel->departdate = '';
            $user->save();
            $user->travel->save();
            \Session::flash('flash_message', 'Your have cleared your travel information.');
        }
        return redirect()->back()->with('user', $user);
    }
}
