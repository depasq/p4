@extends('layouts.master')

@section('title')
    Chandra Peer Review | Confirm Delete
@stop

@section('content')
<h1>Delete User?</h1>
<p>Are you sure you want to delete {{ $reviewer->first .' '. $reviewer->last}}?<br><br>
<a class = "btn btn-danger" href="/delete/{{$reviewer->id}}">Yes</a>
</p>
@stop
