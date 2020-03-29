@extends('layout')

@section('title', 'Homepage')

@section('content')
<div class="jumbotron">
  <h1 class="display-4">DreamQuiz</h1>
  <p class="lead">Brought to you by Don and Joseph.</p>
  <hr class="my-4">
  <p>To enter your questions, click "Submit Questions". To take a quiz, click "Take Quiz".</p>
  <a class="btn btn-dark btn-lg" href="/create" role="button">Create Quiz</a>
  <a class="btn btn-dark btn-lg" href="/questions" role="button">Submit Questions</a>
  <a class="btn btn-dark btn-lg" href="/take" role="button">Take Quiz</a>
  <a class="btn btn-dark btn-lg" href="/results" role="button">View Results</a>

</div>
@endsection