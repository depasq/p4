@extends('layouts.master')

@section('title')
    Chandra Peer Review | Profile
@stop

@section('content')



<div class="container">
    <div>
        @if(Auth::check())
            <h3>Admin Dashboard</h3>
            <p>Welcome to your admin page, {!! $user->first !!} {!! $user->last !!}.<br>
            As an admin, you can <a href="/manage">manage</a> the reviewers database.
            <br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5"><br>
                        <h4>Your Contact Information</h4>
                        {!!  Form::open( ['url' => 'dashboard', 'method' => 'post'] ) !!}
                        <div class="form-group">
                            {!! Form::label('first','First Name') !!}
                            {!! Form::text('first', $user->first, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('last','Last Name') !!}
                            {!! Form::text('last', $user->last, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email','Email') !!}
                            {!! Form::text('email', $user->email, ['class' => 'form-control'] ) !!}
                        </div>
                        {!! Form::submit('Update My Info', ['class' => 'btn btn-primary']) !!}
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>

        @endif
    </div>
</div>@stop
