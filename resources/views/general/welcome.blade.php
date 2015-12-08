@extends('layouts.master')

@section('title')
    Chandra Peer Review | Welcome
@stop

@section('content')
<h1>Peer Review Overview</h1>
<p>Each panel will include 5-7 panelists, one chair and one deputy chair.
    We aim for 10 primary and 10 secondary proposals per panel member. The
    chair will not be given a full load. Proposals will be sent to reviewers
    4 weeks prior to the review. We request preliminary grades to be sent
    electronically to the CXC in advance of the review in order to aid with
    prioritization during the review itself.<br><br>
    @if(Auth::check())
        More information will be presented to the logged in user.
    @else <a href="login">Login</a> or <a href="register">Register</a> for more information.
    @endif
</p>
@stop
