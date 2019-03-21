<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="One Mile With A Smile 12 Hour Endurance Run. If you enjoy pushing yourself sign up for the 12 hour run">
    <meta name="keywords" content="ultra run, 12 hour run, running">
    <meta property="og:title" content="One Mile With A Smile 12 Hour Run">
    <meta property="og:description" content="One Mile With A Smile 12 Hour Endurance Run. If you enjoy pushing yourself sign up for the 12 hour run">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>One Mile With A Smile 12 Hour Run</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
<div id="root"></div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ mix('/js/app.js') }}"></script>
@yield('js')
</body>
</html>