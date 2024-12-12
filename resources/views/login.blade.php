@extends('outside')
@section('title', 'Login')
@section('content')
<div class="card container-sm p-5 mt-5">
    <div class="container">
        <form action="{{route('login.post')}}" method="POST" class="ms-auto me-auto mt-auto">
            @csrf
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Log In</button>
            <div>
                <a href="/registration">Create account?</a>
            </div>
        </form>
    </div>
</div>

@endsection
