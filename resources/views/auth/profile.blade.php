@extends('layouts.master')

@section('title')
    Chandra Peer Review | Profile
@stop

@section('content')



<div class="container">
    <div>
        @if(Auth::check())
            <p>Welcome to your profile page, {!! $user->first !!} {!! $user->last !!}.<br><br>
            Please confirm your contact information as soon as possible so
            that we may begin processing your travel and accommodation.<br>When you've updated your
            contact information, please indicate your <a href="/travel">travel</a> preferences.</p>
            <br>

            @if($user->hasRole('admin'))
                <p>You are special!!</p>
            @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5"><br>
                    {!!  Form::open( ['url' => 'profile', 'method' => 'post'] ) !!}
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
                    <div class="form-group">
                        {!! Form::label('institution','Institution') !!}
                        {!! Form::text('institution', isset($user->profile->institution) ? $user->profile->institution : '', ['class' => 'form-control'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('street','Street') !!}
                        {!! Form::text('street', isset($user->profile->street) ? $user->profile->street : '', ['class' => 'form-control'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('city','City') !!}
                        {!! Form::text('city', isset($user->profile->city) ? $user->profile->city : '', ['class' => 'form-control'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('state','State') !!}
                        {!! Form::text('state', isset($user->profile->state) ? $user->profile->state : '', ['class' => 'form-control'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('zip','Zip') !!}
                        {!! Form::text('zip', isset($user->profile->zip) ? $user->profile->zip : '', ['class' => 'form-control'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('country','Country') !!}
                        {!! Form::text('country', isset($user->profile->country) ? $user->profile->country : '', ['class' => 'form-control'] ) !!}
                    </div>
                </div>
                <div class="col-md-7"><br>
                    <h4>Areas of Expertise</h4>
                    <div class='form-group'>
                        @foreach($areas_for_checkbox as $area_id => $area)
                          <?php $checked = (in_array($area['area'],$areas_for_this_user)) ? 'CHECKED' : '' ?>
                          <input {{ $checked }} type='checkbox' name='areas[]' value='{{$area_id}}'> {{ $area['area'] }}<br>
                        @endforeach
                    </div>
                </div>
            </div>
            <br><br>
            {!! Form::submit('Update My Info', ['class' => 'btn btn-primary']) !!}
            {!!  Form::close() !!}
        </div>
        @endif
    </div>
</div>@stop
