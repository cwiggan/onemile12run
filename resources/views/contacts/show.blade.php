@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        Contacts
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Contact {{ date('d/m/Y', strtotime($contact->created_at)) }}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Name: {{ $contact->name }}</li>
                            <li class="list-group-item">Email: {{ $contact->email }}</li>
                            <li class="list-group-item">Message: {{ $contact->message }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection