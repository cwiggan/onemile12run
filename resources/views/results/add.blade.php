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
                        <form method="POST" enctype="multipart/form-data" action="/admin/results/create">
                            @csrf
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="number" name="year" class="form-control" id="year" aria-describedby="emailHelp" placeholder="Year">
                                <small id="emailHelp" class="form-text text-muted">Enter Year</small>
                            </div>
                            <div class="form-group">
                                <label for="file">Select File</label>
                                <input type="file" name="filecsv" class="form-control-file" id="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection