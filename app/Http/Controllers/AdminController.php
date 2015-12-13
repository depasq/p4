<?php

namespace PeerReview\Http\Controllers;

use Illuminate\Http\Request;

use PeerReview\Http\Requests;
use PeerReview\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboard()
    {
        $userModel = new \PeerReview\User();
        $reviewers_for_dropdown = $userModel->getUsersForDropdown();
        # show admin dashboard with reviewers populated in dropdown menu
        return view('admin.dashboard')
            ->with('reviewers_for_dropdown', $reviewers_for_dropdown);
    }
    public function postDashboard(Request $request)
    {
        // dd($request['reviewer']);
        $reviewer = \PeerReview\User::find($request['reviewer']);
        $userModel = new \PeerReview\User();
        $reviewers_for_dropdown = $userModel->getUsersForDropdown();
        #show dashboard after selecting a reviewer
        return view('admin.dashboard')
            ->with('reviewers_for_dropdown', $reviewers_for_dropdown)
            ->with('reviewer', $reviewer);
    }
    public function postDashboardEdit(Request $request)
    {
        $user = \PeerReview\User::find($request['reviewer_id']);

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

        #save changes to selected reviewer and send a session message back to the admin
        \Session::flash('flash_message', $user->first." ".$user->last."'s profile was updated.");
        return redirect()->back()->with('reviewer', $user);
    }
    public function postDashboardTravel(Request $request)
    {
        #validation for travel dates
        $this->validate($request, [
            'arrivedate' => 'date',
            'departdate' => 'date',
        ]);

        $user = \PeerReview\User::find($request['reviewer_id']);

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

        # update travel info for selected reviewer and send session message back to admin
        \Session::flash('flash_message', $user->first." ".$user->last."'s travel info was updated.");
        return redirect()->back()->with('reviewer', $user);
    }

    public function getAdmin()
    {
         return view('admin.admin');
    }
    public function postAdmin(Request $request)
    {
        $user = \PeerReview\User::find(\Auth::user()->id);

        $user->first = $request['first'];
        $user->last = $request['last'];
        $user->email = $request['email'];

        #make changes to admin info and send session message back to confirm changes
        \Session::flash('flash_message', 'Your contact information has been updated.');
        return redirect()->back()->with('user', $user);
    }
    public function getCreateUser()
    {
         return view('admin.create-user');
    }
    public function postCreateUser(Request $request)
    {
        #validate form fields for creating new user
        $this->validate($request, [
            'first' => 'required|max:255',
            'last' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        $reviewer = \PeerReview\User::create([
            'first' => $request['first'],
            'last' => $request['last'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        # if selected, make new user an admin, or not... whatever, it's cool.
        if ($request['admin'] == 'on')
        {
            $role = \PeerReview\Role::find('1');
        } else
        {
            $role = \PeerReview\Role::find('2');
        }
        $profile = new \PeerReview\Profile();
        $travel = new \PeerReview\Travel();
        $travel->user_id = $reviewer->id;
        $profile->user_id = $reviewer->id;
        $reviewer->travel()->save($travel);
        $reviewer->profile()->save($profile);
        $reviewer->attachRole($role);
        # create new user and send session message back to admin
        \Session::flash('flash_message', 'New user has been created');
        return redirect('/dashboard');
    }
    public function getConfirmDelete($reviewer_id)
    {
        # if delete user selected, send admin to confirmation page first
        $reviewer = \PeerReview\User::find($reviewer_id);
        return view('admin.delete')
            ->with('reviewer', $reviewer);
    }

    public function getDoDelete($reviewer_id)
    {
        # if they really want to do it, delete user
        $reviewer = \PeerReview\User::find($reviewer_id);

        #make sure there is a user selected to delete
        if (is_null($reviewer)) {
            \Session::flash('flash_message', 'Reviewer not found.');
            return redirect('/dashboard');
        }
        # check to make sure admin is not trying to delete their own account, because
        # that would be awfully strange.
        if ($reviewer_id != \Auth::user()->id)
        {
            $reviewer->delete();
            \Session::flash('flash_message', $reviewer->first.' '.$reviewer->last.' was deleted.');
            return redirect('/dashboard');
        } else {
            \Session::flash('flash_message', "Sorry, you can't delete yourself!");
            return redirect('/dashboard');
        }
    }
}
