<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:700&display=swap" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css" >

    <title>@yield('title') - DreamQuiz</title>
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/">DreamQuiz <small>v0.0</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/questions/">Submit Questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/take">Take Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/create">Create Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/results">View Results</a>
                </li>
                </ul>
            </div>
        </nav>
        <br/>
        @if (session('success_message'))
<div class="alert alert-success" role="alert">
    {{session('success_message')}}
</div>
@endif
@if (session('error_message'))
<div class="alert alert-danger" role="alert">
    {{session('error_message')}}
</div>
@endif

        @yield('content')

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>