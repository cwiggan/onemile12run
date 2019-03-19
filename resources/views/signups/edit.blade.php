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
                                <label for="email">Address</label>
                                <input type="email" class="form-control" id=email" placeholder="Email" value="{{ $signup->address }}">
                            </div>
                            <div class="form-group">
                                <label for="email">City</label>
                                <input type="email" class="form-control" id=email" placeholder="Email" value="{{ $signup->city }}">
                            </div>
                            <div class="form-group">
                                <label for="email">state</label>
                                <input type="email" class="form-control" id=email" placeholder="Email" value="{{ $signup->state }}">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection