@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        Sign Ups
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Race Sign Ups</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Transaction Id</th>
                                <th scope="col">State</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($signups as $signup)
                                <tr>
                                    <td>{{ $signup->first_name }}</td>
                                    <td>{{ $signup->last_name }}</td>
                                    <td>{{ $signup->email }}</td>
                                    <td>{{ $signup->transaction_id }}</td>
                                    <td>{{ $signup->city }}</td>
                                    <td>{{ $signup->state }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="/admin/signup/{{ $signup->id }}">view</a>
                                        <a class="btn btn-primary btn-sm" href="/admin/signup/{{ $signup->id }}/edit">edit</a>
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