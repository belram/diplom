<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> <!-- Resource style -->
    <script src="{{ asset('assets/js/modernizr.js') }}"></script> <!-- Modernizr -->
    <title>FAQ</title>
</head>
<body>
<header>
    <h1>FAQ</h1>
</header>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
            <br>
            <a style="color: blue" href="{{ route('add_question') }}">Your Question</a>
            </br>
            <br>
            <a style="color: red" href="{{ route('admin_index') }}">For Admin</a>
            </br>
<section class="cd-faq">

    @yield('nav')

    <div class="cd-faq-items">
        
        @yield('content')

    </div> <!-- cd-faq-items -->
    <a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mobile.custom.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script> <!-- Resource jQuery -->
</body>
</html>
