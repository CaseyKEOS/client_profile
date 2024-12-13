@extends('outside')
@section('title', 'Login')
@section('content')

<div class="card rounded-sm mx-auto p-4 position-absolute top-50 start-50 translate-middle" style="width: 500px; background-color: #FBFBFB;">
    <div class="container">
        <form action="{{route('login.post')}}" method="POST" class="ms-auto me-auto mt-auto">
            @csrf
            <h1 align="center" style="color: #040815"><b>Client Profile</b></h1>
            <div class="form-floating mb-3 mt-5">
                <input type="text" class="form-control" id="email" placeholder="name@example.com" name="login">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <button type="submit" class="btn btn-success container" >Log In</button>
        </form>
    </div>
</div>

@endsection
