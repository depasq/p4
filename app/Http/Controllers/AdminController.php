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

        return view('admin.dashboard')
            ->with('reviewers_for_dropdown', $reviewers_for_dropdown);
    }
    public function postDashboard(Request $request)
    {
        // dd($request['reviewer']);
        $reviewer = \PeerReview\User::find($request['reviewer']);
        $userModel = new \PeerReview\User();
        $reviewers_for_dropdown = $userModel->getUsersForDropdown();
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

        \Session::flash('flash_message',$user->first." ".$user->last."'s profile was updated.");
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

        \Session::flash('flash_message', 'Your contact information has been updated.');
        return redirect()->back()->with('user', $user);
    }
    public function getCreateUser()
    {
         return view('admin.create-user');
    }
    public function postCreateUser(Request $request)
    {
        $reviewer = \PeerReview\User::create([
            'first' => $request['first'],
            'last' => $request['last'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        if ($request['admin'] == 'on')
        {
            $role = \PeerReview\Role::find('1');
        }
        else
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
        \Session::flash('flash_message', 'New user has been created');
        return redirect('/dashboard');
    }
    public function getConfirmDelete($reviewer_id)
    {
        $reviewer = \PeerReview\User::find($reviewer_id);
        return view('admin.delete')
            ->with('reviewer', $reviewer);
    }

    public function getDoDelete($reviewer_id)
    {

        $reviewer = \PeerReview\User::find($reviewer_id);

        if(is_null($reviewer)) {
            \Session::flash('flash_message', 'Reviewer not found.');
            return redirect('/dashboard');
        }
        $reviewer->delete();

        \Session::flash('flash_message', $reviewer->first.' '.$reviewer->last.' was deleted.');
        return redirect('/dashboard');
    }
}
