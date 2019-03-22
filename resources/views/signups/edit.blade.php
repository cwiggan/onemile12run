@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        Sign Up
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $signup->first_name }} {{ $signup->last_name }}</h5>
                        <form action="post" action="/signup/update">
                            <div class="form-group">
                                <label for="email">First Name</label>
                                <input type="email" class="form-control" id=email" placeholder="Email" value="{{ $signup->first_name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Last Name</label>
                                <input type="email" class="form-control" id=email" placeholder="Email" value="{{ $signup->last_name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id=email" placeholder="Email" value="{{ $signup->email }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Birthday</label>
                                <input type="email" class="form-control" id=email" placeholder="Email" value="{{ $signup->birth_date }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Gender</label>
                                <input type="email" class="form-control" id=email" placeholder="Email" value="{{ $signup->gender }}">
                            </div>
                            <div class="form-group">
                                <label for=eaddress">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Email" value="{{ $signup->address }}">
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" placeholder="City" value="{{ $signup->city }}">
                            </div>
                            <div class="form-group">
                                <label for="state">state</label>
                                <input type="text" class="form-control" id="state" placeholder="State" value="{{ $signup->state }}">
                            </div>
                            <div class="form-group">
                                <label for="t_shirt">T-Shirt</label>
                                <input type="text" class="form-control" id="t_shirt" placeholder="T Shirtl" value="{{ $signup->t_shirt }}">
                            </div>
                            <div class="form-group">
                                <label for="email">emergency</label>
                                <input type="text" class="form-control" id="emergency_name" placeholder="Email" value="{{ $signup->emergency_name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">state</label>
                                <input type="text" class="form-control" id="emergency_phone" placeholder="Email" value="{{ $signup->emergency_phone }}">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection