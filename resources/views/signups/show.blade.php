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
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $signup->email }}</li>
                            <li class="list-group-item">{{ $signup->phone }}</li>
                            <li class="list-group-item">{{ $signup->address }}</li>
                            <li class="list-group-item">{{ $signup->city }}</li>
                            <li class="list-group-item">{{ $signup->state }}</li>
                            <li class="list-group-item">{{ $signup->zip_code}}</li>
                            <li class="list-group-item">{{ $signup->gender }}</li>
                            <li class="list-group-item">{{ $signup->birth_date }}</li>
                            <li class="list-group-item">{{ $signup->t_shirt }}</li>
                            <li class="list-group-item">{{ $signup->transaction_id}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection