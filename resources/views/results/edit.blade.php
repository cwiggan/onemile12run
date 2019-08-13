@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        Edit Results
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">edit result</h5>
                        <form method="POST" action="/admin/results/update/{{ $result->id }}">
                            @csrf
                            <div class="form-group">
                                <label for="year">Distance</label>
                                <input type="number" name="distance" value="{{ $result->distance }}" class="form-control" id="year" aria-describedby="emailHelp" placeholder="Year">
                                <small id="emailHelp" class="form-text text-muted">Enter Year</small>
                            </div>
                            <div class="form-group">
                                <label for="laps">Laps</label>
                                <input type="number" name="laps" value="{{ $result->laps }}" class="form-control" id="year" aria-describedby="emailHelp" placeholder="Year">
                                <small id="emailHelp" class="form-text text-muted">Enter Year</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection