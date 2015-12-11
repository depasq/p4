@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h2>Create a New Reviewer Account</h2>

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!!  Form::open( ['url' => 'create', 'method' => 'post'] ) !!}
    <div class="form-group">
        {!! Form::label('first','First Name') !!}
        {!! Form::text('first', null, ['class' => 'form-control'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('last','Last Name') !!}
        {!! Form::text('last', null, ['class' => 'form-control'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password', ['class' => 'form-control'] ) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('password_confirmation', 'Confirm Password') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control'] ) !!}
    </div>
    {!! Form::submit('Create Reviewer', ['class' => 'btn btn-primary'] ) !!}
    {!!  Form::close() !!}
</div>

@stop
