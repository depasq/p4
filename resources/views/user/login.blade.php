@extends('layouts.master')

@section('title')
    Chandra Peer Review | Login
@stop

@section('content')
<div class="container-fluid">
    <h1>Login to Chandra Peer Review</h1>
    <div class="form-group">
        {!! Form::open( ['url' => 'login', 'method' => 'post'] ) !!}
        {!! Form::label('email','email') !!}
        {!! Form::text('email', null, ['class' => 'form-control'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password', ['class' => 'form-control'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Login', ['class' => 'btn btn-primary'] ) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
