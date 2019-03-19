@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        Import Results
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Distance</th>
                                <th scope="col">Year</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($results as $result)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $result->first_name }}</td>
                                <td>{{ $result->last_name }}</td>
                                <td>{{ $result->distance }}</td>
                                <td>{{ $result->year }}</td>
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