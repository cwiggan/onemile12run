@extends('master')

@section('content')
    <div class="container raceinfo">
        <div class="row">
            <div class="col-lg-4">
                @include('side')
            </div>
            <div class="col-lg-8">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Races</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-body">
                        @foreach($races as $race)
                            <a href="/race/edit/{{ $race->id }}" class="card-link">{{ $race->name }} {{ $race->start_time }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection