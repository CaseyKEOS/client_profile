@extends('layout')
@section('title', 'Login')
@section('content')
    <div class="userdetails">
        <h1>Welcome to Wildrift</h1>
        <h2>{{Auth::user()->username}}</h2>
        <h2>{{Auth::user()->id}}</h2>
    </div>
@endsection
