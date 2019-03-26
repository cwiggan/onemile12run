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
                        <h5 class="card-title">Contact Form</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">T Shirt</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($volunteers as $volunteer)
                                <tr>
                                    <th scope="row">{{ $volunteer->id }}</th>
                                    <td>{{ $volunteer->name }}</td>
                                    <td>{{ $volunteer->email }}</td>
                                    <td>{{ $volunteer->t_shirt }}</td>
                                    <td>{{ date('m/d/Y', strtotime($volunteer->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('volunteers.show', $volunteer->id) }}" class="btn btn-primary btn-sm">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection