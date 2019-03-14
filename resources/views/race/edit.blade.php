@extends('master')
@section('content')
    <div class="container raceinfo">
        <div class="row">
            <div class="col-lg-4">
                @include('side')
            </div>
            <div class="col-lg-8">
                <form method="post" action="/race/update/{{ $race->id }}">
                    @csrf
                    <div class="card mt-5">
                        <div class="card-header">
                            Edit Race
                        </div>
                        <div class="card-body">
                            <h1 class="card-title"></h1>
                            @if ($errors->any())
                                <div class="">
                                    <ul class="list-group">
                                        @foreach ($errors->all() as $error)
                                            <li class="list-group-item">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="race-name">Name</label>
                                <input type="text" name="name" class="form-control" id="race-name" value="{{ $race->name }}" placeholder="Name of Race">
                            </div>
                            <div class="form-group">
                                <label for="race-price">Price</label>
                                <input type="text" name="price" class="form-control" id="race-price" value="{{ $race->price }}" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label for="race-start-time">Start Date</label>
                                <input type="text" name="start_time" value="{{ $race->start_time }}" class="form-control" id="race-start-time">
                            </div>
                            <div class="form-group">
                                <label for="race-end-time">Start Date</label>
                                <input type="text" name="end_time" value="{{ $race->end_time }}" class="form-control" id="race-end-time">
                            </div>
                            <div class="form-group">
                                <label for="race-desc">Description</label>
                                <textarea name="description" class="form-control" id="race-desc" rows="3">{{ $race->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="race-desc">Awards</label>
                                <textarea name="awards" class="form-control" id="award-desc" rows="3">{{ $race->awards }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection