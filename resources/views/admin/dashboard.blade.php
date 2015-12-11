@extends('layouts.master')

@section('title')
    Chandra Peer Review | Profile
@stop

@section('content')



<div class="container">
    <div>
        @if(Auth::check())
            <h3>Admin Dashboard</h3>
            <p>Welcome to your dashboard page, {!! $user->first !!} {!! $user->last !!}.<br>
            Here you can interact with the reviewers database.
            <br>

            <div class="container-fluid">

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
                     {!! Form::submit('Find Reviewer', ['class' => 'btn btn-primary']) !!}
                     or <a class="btn btn-success" href="/create-user" role="button">Create New Reviewer</a>
                     {!!  Form::close() !!}
                </div><hr>
                @if(isset($reviewer))
                    <h4>Edit Reviewer's information</h4>
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
                    </div>
                        {{-- Use a hidden form element to pass the user id to the AdminController! --}}
                        {!! Form::hidden('reviewer_id', $reviewer->id ) !!}
                        {!! Form::submit('Update Reviewer Info', ['class' => 'btn btn-primary']) !!}
                        <a class="btn btn-danger" href="/confirm-delete/{{$reviewer->id}}" role="button">Delete User!</a>
                        {!!  Form::close() !!}
                </div>
            </div>
            @endif
        @endif
    </div>
</div>@stop
