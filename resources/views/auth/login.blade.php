@extends('layouts.master')

@section('title')
    Chandra Peer Review | Login
@stop

@section('content')
<div class="container-fluid">
    <h1>Login to Peer Review</h1>

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-group">
        {!! Form::open( ['url' => 'login', 'method' => 'post'] ) !!}
        {!! Form::label('email','Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password', ['class' => 'form-control'] ) !!}
    </div>

    <div class='form-group'>
        <label>
            {!! Form::checkbox('remember', 'remember') !!} Remeber Me
        </label>
    </div>

    <div class="form-group">
        {!! Form::submit('Login', ['class' => 'btn btn-primary'] ) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
