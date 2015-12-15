@extends('layouts.master')

@section('title')
    Chandra Peer Review | Profile
@stop

@section('head')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@stop

@section('content')

<div class="container">
    <div>
        @if(Auth::check())
            <p>Please indicate your travel preferences here.</p>
            <br>
            @if(count($errors) > 0)
                <ul class='errors'>
                    @foreach ($errors->all() as $error)
                        <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!!  Form::open( ['url' => 'travel', 'method' => 'post'] ) !!}
            Traveling to Boston, please indicate where you're coming from:<br>
            <div class="form-group">
                {!! Form::label('fromcity','City') !!}
                {!! Form::text('fromcity', isset($user->travel->fromcity) ? $user->travel->fromcity : '', ['class' => 'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fromstate','State') !!}
                {!! Form::text('fromstate', isset($user->travel->fromstate) ? $user->travel->fromstate : '', ['class' => 'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fromcountry','Country') !!}
                {!! Form::text('fromcountry', isset($user->travel->fromcountry) ? $user->travel->fromcountry : '', ['class' => 'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('arrivedate','Date of Arrival to Boston') !!}
                {!! Form::text('arrivedate', isset($user->travel->arrivedate) ? $user->travel->arrivedate : '', ['id' => 'datepicker', 'class' => 'form-control'] ) !!}
            </div>
            <br>
            Traveling from Boston, please indicate where you're going:<br>
            <div class="form-group">
                {!! Form::label('tocity','City') !!}
                {!! Form::text('tocity', isset($user->travel->tocity) ? $user->travel->tocity : '', ['class' => 'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tostate','State') !!}
                {!! Form::text('tostate', isset($user->travel->tostate) ? $user->travel->tostate : '', ['class' => 'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tocountry','Country') !!}
                {!! Form::text('tocountry', isset($user->travel->tocountry) ? $user->travel->tocountry : '', ['class' => 'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('departdate','Date of Departure from Boston') !!}
                {!! Form::text('departdate', isset($user->travel->departdate) ? $user->travel->departdate : '', ['id' => 'datepicker2', 'class' => 'form-control'] ) !!}
            </div>
            {!! Form::submit('Update Travel Prefs', ['name' => 'submit', 'class' => 'btn btn-primary'] ) !!}
            {!! Form::submit('Clear Travel Prefs', ['name' => 'delete', 'class' => 'btn btn-danger'] ) !!}
            {!!  Form::close() !!}
        @endif
    </div>
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
