@extends('layouts.layout')
@section('title', 'Users')
@section('content')
    <div class="userdetails">
        <h1>Admins</h1>
        <div class="container">
            <button class="btn btn-primary" data-bs-target="#viewAdminToggle" data-bs-toggle="modal">Add New User</button>
            {{-- modal --}}
            <div class="modal fade" id="viewAdminToggle" aria-hidden="true" aria-labelledby="viewAdminToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="viewAdminToggleLabel">Register New User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('registration.post') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="container">
                                    <div class="">
                                        @if ($errors->any())
                                            <div class="col-12">
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger">{{ $error }}</div>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if (session()->has('error'))
                                        @endif
                                    </div>

                                    @csrf
                                    <div class="mb-3">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="username"
                                                        placeholder="name@example.com" name="username">
                                                    <label for="username">Username</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="phonenum"
                                                        placeholder="name@example.com" name="phonenum">
                                                    <label for="phonenum">Phone No.</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="name@example.com" name="email">
                                                    <label for="email">Email address</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="password"
                                                        placeholder="name@example.com" name="password">
                                                    <label for="password">Password</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="firstname"
                                                        placeholder="name@example.com" name="firstname">
                                                    <label for="firstname">First Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="middlename"
                                                        placeholder="name@example.com" name="middlename">
                                                    <label for="middlename">Middle Initial</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="surname"
                                                        placeholder="name@example.com" name="surname">
                                                    <label for="surname">Surname</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="address"
                                                        placeholder="name@example.com" name="address">
                                                    <label for="address">Address</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-target="#viewAdminToggle2"
                                    data-bs-toggle="modal">Register</button>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="viewAdminToggle2" aria-hidden="true"
                aria-labelledby="viewAdminToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="viewAdminToggleLabel2">Register Confirmation</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to create this user?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-target="#viewAdminToggle"
                                data-bs-toggle="modal">Go back</button>
                            <button type="submit" class="btn btn-success">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <section class="mt-5">
            <div class="container-fluid">
                @if (empty($users))
                    <p>No users found</p>
                @else
                    <table class="table container">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewAdmin">View</button>
                                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="viewAdmin" tabindex="-1" aria-labelledby="viewAdminLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewAdminLabel">User Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div></div>
                    </div>

                </div>
                </div>
            </div>
        </section>
    </div>
@endsection
