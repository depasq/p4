@extends('layouts.master')

@section('title')
    Chandra Peer Review | Profile
@stop

@section('content')



<div class="container">
    <div>
        @if(Auth::check())
            <h3>Admin Profile</h3>
            <p>Welcome to your admin page, {!! $user->first !!} {!! $user->last !!}.<br>
            As an admin, you can manage the reviewers database from your <a href="/dashboard">dashboard</a>.
            <br>
            <div class="container-fluid">
                @if(count($errors) > 0)
                    <ul class='errors'>
                        @foreach ($errors->all() as $error)
                            <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="row">
                    <div class="col-md-5"><br>
                        <h4>Your Contact Information</h4>
                        {!!  Form::open( ['url' => 'admin', 'method' => 'post'] ) !!}
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
