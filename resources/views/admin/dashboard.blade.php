@extends('layouts.master')

@section('title')
    Chandra Peer Review | Profile
@stop

@section('head')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@stop

@section('content')
<div class="container">
    @if(Auth::check())
        <h3>Admin Dashboard</h3>
        <p>Welcome to your dashboard page, {!! $user->first !!} {!! $user->last !!}.<br>
        Here you can interact with the reviewers database.
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7"><br>
                    <div class='form-group'>
                        {!!  Form::open( ['url' => 'dashboard', 'method' => 'post'] ) !!}
                         <label for='reviewer'>Find a Reviewer:</label>
                         <select name='reviewer' id='reviewer'>
                             @foreach($reviewers_for_dropdown as $reviewer_id => $reviewer_name)
                                    {{ $selected = '' }}
                                    @if(isset($reviewer))
                                        {{ $selected = ($reviewer_id == $reviewer->id) ? 'selected' : '' }}
                                    @endif
                                    <option value='{{ $reviewer_id }}' {{ $selected }}> {{ $reviewer_name->last.', '.$reviewer_name->first }} </option>
                             @endforeach
                         </select><br><br>
                         {!! Form::submit('Load Account', ['class' => 'btn btn-primary']) !!}
                         <a class="btn btn-success" href="/create-user" role="button">Create Account</a>
                         {!!  Form::close() !!}
                    </div>
                </div>
                {{-- <div class="col-md-5">
                    <br><br>
                    Search on Areas of Expertise
                </div> --}}
            </div>
            <hr>
            @if(count($errors) > 0)
                <ul class='errors'>
                    @foreach ($errors->all() as $error)
                        <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            @if(isset($reviewer))
                @if($reviewer->hasRole('admin'))
                    <h4 id="admin">Note this is an admin account!</h4>
                @endif
                <div class="row">
                    <div class="col-md-5"><br>
                        <h4>Edit Reviewer information</h4>
                        {!!  Form::open( ['url' => 'dashboard-edit', 'method' => 'post'] ) !!}
                        <div class="form-group">
                            {!! Form::label('first','First Name') !!}
                            {!! Form::text('first', $reviewer->first, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('last','Last Name') !!}
                            {!! Form::text('last', $reviewer->last, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email','Email') !!}
                            {!! Form::text('email', $reviewer->email, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('institution','Institution') !!}
                            {!! Form::text('institution', isset($reviewer->profile->institution) ? $reviewer->profile->institution : '', ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('street','Street') !!}
                            {!! Form::text('street', isset($reviewer->profile->street) ? $reviewer->profile->street : '', ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('city','City') !!}
                            {!! Form::text('city', isset($reviewer->profile->city) ? $reviewer->profile->city : '', ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('state','State') !!}
                            {!! Form::text('state', isset($reviewer->profile->state) ? $reviewer->profile->state : '', ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('zip','Zip') !!}
                            {!! Form::text('zip', isset($reviewer->profile->zip) ? $reviewer->profile->zip : '', ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('country','Country') !!}
                            {!! Form::text('country', isset($reviewer->profile->country) ? $reviewer->profile->country : '', ['class' => 'form-control'] ) !!}
                        </div><br>
                        {{-- Use a hidden form element to pass the reviewer id to the AdminController --}}
                        {!! Form::hidden('reviewer_id', $reviewer->id ) !!}
                        @if($reviewer->hasRole('admin'))
                            {!! Form::submit('Update Admin Info', ['class' => 'btn btn-primary']) !!}
                            <a class="btn btn-danger" href="/confirm-delete/{{$reviewer->id}}" role="button">Delete Admin</a>
                            {!!  Form::close() !!}<br><br>
                        @else
                            {!! Form::submit('Update Reviewer Info', ['class' => 'btn btn-primary']) !!}
                            <a class="btn btn-danger" href="/confirm-delete/{{$reviewer->id}}" role="button">Delete Reviewer</a>
                            {!!  Form::close() !!}<br><br>
                        @endif
                    </div>
                    <div class="col-md-7"><br>
                        {{-- only show travel info for reviewers (does not apply to admins) --}}
                        @if($reviewer->hasRole('standard'))
                            <h4>Reviewer Travel Prefs</h4>
                            {!!  Form::open( ['url' => 'dashboard-travel', 'method' => 'post'] ) !!}
                            Traveling to Boston, coming from:<br>
                            <div class="form-group">
                                {!! Form::label('fromcity','City') !!}
                                {!! Form::text('fromcity', isset($reviewer->travel->fromcity) ? $reviewer->travel->fromcity : '', ['class' => 'form-control'] ) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('fromstate','State') !!}
                                {!! Form::text('fromstate', isset($reviewer->travel->fromstate) ? $reviewer->travel->fromstate : '', ['class' => 'form-control'] ) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('fromcountry','Country') !!}
                                {!! Form::text('fromcountry', isset($reviewer->travel->fromcountry) ? $reviewer->travel->fromcountry : '', ['class' => 'form-control'] ) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('arrivedate','Date of Arrival to Boston') !!}
                                {!! Form::text('arrivedate', isset($reviewer->travel->arrivedate) ? $reviewer->travel->arrivedate : '', ['id' => 'datepicker', 'class' => 'form-control'] ) !!}
                            </div>
                            Traveling from Boston, going to:<br>
                            <div class="form-group">
                                {!! Form::label('tocity','City') !!}
                                {!! Form::text('tocity', isset($reviewer->travel->tocity) ? $reviewer->travel->tocity : '', ['class' => 'form-control'] ) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('tostate','State') !!}
                                {!! Form::text('tostate', isset($reviewer->travel->tostate) ? $reviewer->travel->tostate : '', ['class' => 'form-control'] ) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('tocountry','Country') !!}
                                {!! Form::text('tocountry', isset($reviewer->travel->tocountry) ? $reviewer->travel->tocountry : '', ['class' => 'form-control'] ) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('departdate','Date of Departure from Boston') !!}
                                {!! Form::text('departdate', isset($reviewer->travel->departdate) ? $reviewer->travel->departdate : '', ['id' => 'datepicker2', 'class' => 'form-control'] ) !!}
                            </div><br>
                            {!! Form::hidden('reviewer_id', $reviewer->id ) !!}
                            {!! Form::submit('Update Reviewer Travel Prefs', ['name' => 'submit', 'class' => 'btn btn-primary'] ) !!}
                            {!!  Form::close() !!}
                        @endif
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
@stop

@section('body')
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
 <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
 <script>
    $(function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker2" ).datepicker();
    });
 </script>
@stop
