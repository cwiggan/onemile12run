@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        Volunteer
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Date {{ date('m/d/Y', strtotime($volunteer->created_at)) }}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Name: {{ $volunteer->name }}</li>
                            <li class="list-group-item">Email: {{ $volunteer->email }}</li>
                            <li class="list-group-item">Shirt: {{ $volunteer->t_shirt }}</li>
                            <li class="list-group-item">Phone: {{ $volunteer->phone }}</li>
                            <li class="list-group-item">Message: {{ $volunteer->comments }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection