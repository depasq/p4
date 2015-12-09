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
         return view('admin.dashboard');
    }
    public function postDashboard(Request $request)
    {
        $user = \PeerReview\User::find(\Auth::user()->id);

        $user->first = $request['first'];
        $user->last = $request['last'];
        $user->email = $request['email'];

        \Session::flash('flash_message', 'Your contact information has been updated.');
        return redirect()->back()->with('user', $user);
    }
    public function getManage()
    {
         return view('admin.manage');
    }
    public function postManage(Request $request)
    {
        $user = \PeerReview\User::find(\Auth::user()->id);

        $user->first = $request['first'];
        $user->last = $request['last'];
        $user->email = $request['email'];

        \Session::flash('flash_message', 'Your contact information has been updated.');
        return redirect()->back()->with('user', $user);
    }
}
