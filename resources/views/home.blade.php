@extends('master')
@section('content')
    <div class="hero_img">
        <img class="back" src="{{ asset('img/home.png') }}">
        <div class="overlay">
            <div class="container">
                <h1 class="text-center">
                    <span class="top">One Mile With a Smile Run Series</span>
                    <span class="mid">August 11, 2018</span>
                    <span class="last">@Oak Grove Lake Park, Chesapeake, VA</span>
                </h1>
            </div>
        </div>
    </div>
    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>One Mile With A Smile</h1>
                    <p>
                        The One Mile With a Smile Running Series is an event throughout the year featuring 5ks, 1 Mile and the 12 hour endurance run.  These events provide fun for individuals of different fitness level. It does not matter how fast or slow you run we welcome everyone.
                    </p>
                    <p>
                    If you enjoy pushing yourself sign up for the 12 hour run. If you like a little workout try the 5k. If you just want to try a first time race the 1 mile might be pleasing.
                    </p>
                    <p>
                        There is something for everyone!
                    </p>


                    <div class="fb-like" data-href="https://www.facebook.com/onemilewithasmile/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('img/about-img.png') }}">
                </div>
            </div>
        </div>
    </div>
    <div class="volunteer">
        <img src="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h3>Become a Volunteer</h3>
                    <p>Running not your thing but don’t want to miss the experience? Volunteer for the 1 Mile With A Smile Run and get a free t-shirt and a chance to be part of this great event.</p>
                    <a href="">Volunteer</a>
                </div>
            </div>
        </div>
    </div>
@endsection