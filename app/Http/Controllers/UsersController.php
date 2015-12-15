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
        $user = \PeerReview\User::with('areas')->find(\Auth::user()->id);

        // Grab all Areas of expertise to display on checkboxes
        $areaModel = new \PeerReview\Area();
        $areas_for_checkbox = $areaModel->getAreasForCheckboxes();

        //Use this array to show which areas are already associated with the user
        $areas_for_this_user = [];
        foreach ($user->areas as $area) {
            $areas_for_this_user[] = $area->area;
        }

        return view('auth.profile')
            ->with([
                'areas_for_checkbox' => $areas_for_checkbox,
                'areas_for_this_user' => $areas_for_this_user,
            ]);
    }
    public function postProfile(Request $request)
    {
        $user = \PeerReview\User::find(\Auth::user()->id);

        $this->validate($request, [
            'first' => 'required|max:255',
            'last' => 'required|max:255',
            'email' => 'required|email|max:255',
            'institution' => 'string',
            'city' => 'string',
            'state' => 'string',
            'zip' => 'string',
            'country' => 'string',
        ]);
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

        // update areas of expertise if there are any otherwise save emtpy array
        if ($request->areas)
        {
            $areas = $request->areas;
        } else
        {
            $areas = [];
        }
        $user->areas()->sync($areas);

        \Session::flash('flash_message', 'Your profile information has been updated.');
        return redirect()->back()->with('user', $user);
    }

    public function getTravel()
    {
        return view('auth.travel');
    }
    public function postTravel(Request $request)
    {
        $this->validate($request, [
            'fromcity' => 'string',
            'fromstate' => 'string',
            'fromcountry' => 'string',
            'arrivedate' => 'date',
            'tocity' => 'string',
            'tostate' => 'string',
            'tocountry' => 'string',
            'departdate' => 'date',
        ]);

        $user = \PeerReview\User::find(\Auth::user()->id);

        if ($request['submit'] == 'Update Travel Prefs') {
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
        } else {
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
