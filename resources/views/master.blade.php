<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>One Mile With A Smile</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('img/1milesmile.png') }}" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        @auth
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contacts.index') }}">Contacts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('volunteers.index') }}">Volunteers</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="signupDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sign Ups
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="signupDropdown">
                    <a class="dropdown-item" href="/admin/signups/add">Add Sign Up</a>
                    <a class="dropdown-item" href="/admin/signups">View Sign Ups</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="resultsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Results
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="resultsDropdown">
                    <a class="dropdown-item" href="/admin/results/add">Add Results</a>
                    <a class="dropdown-item" href="/admin/results">View Results</a>
                </div>
            </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endauth
        </ul>
    </div>
    </div>
</nav>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@yield('content')
<footer>
    Footer
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ mix('/js/app.js') }}"></script>
@yield('js')
</body>
</html>