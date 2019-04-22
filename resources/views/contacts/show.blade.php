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
                            <li class="list-group-item">Reply: <br/> {{ $contact->reply }}</li>
                        </ul>
                        <h5 class="card-title">Reply</h5>
                        <form method="post" action="/admin/contacts/{{ $contact->id }}">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">message</label>
                                <textarea class="form-control" name="reply" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <input type="hidden" name="email" value="{{ $contact->email }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection