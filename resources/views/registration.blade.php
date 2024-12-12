@extends('layout')
@section('title', 'Registration')
@section('content')
    <div class="container">
        <div class="mt-5">
            @if ($errors->any())
                <div class="col-12">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif

            @if (session()->has('error'))

            @endif
        </div>
        <form action="{{route('registration.post')}}" method="POST" class="ms-auto me-auto mt-auto">
            @csrf
            <div class="mb-3">
                <div class="row g-2">
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="username" placeholder="name@example.com" name="username">
                        <label for="username">Username</label>
                      </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="phonenum" placeholder="name@example.com" name="phonenum">
                          <label for="phonenum">Phone No.</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row g-2">
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                        <label for="email">Email address</label>
                      </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="password" placeholder="name@example.com" name="password">
                          <label for="password">Password</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row g-2">
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="firstname" placeholder="name@example.com" name="firstname">
                        <label for="firstname">First Name</label>
                      </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="middlename" placeholder="name@example.com" name="middlename">
                          <label for="middlename">Middle Initial</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="surname" placeholder="name@example.com" name="surname">
                          <label for="surname">Surname</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row g-2">
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="address" placeholder="name@example.com" name="address">
                        <label for="address">Address</label>
                      </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Register</button>
            <div>Already have an account? <a href="/login">Login Now</a></div>

        </form>
    </div>
@endsection
