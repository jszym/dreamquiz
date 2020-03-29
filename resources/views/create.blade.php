@extends('layout')

@section('title', 'Create Quiz')

@section('content')
<h1>Create a Quiz</h1>

<form action="/create" method="post">
@csrf
  <div class="form-group">
    <label for="quiz_name">Quiz Title</label>
    <input type="input" class="form-control" name="quiz_title" id="quiz_title" aria-describedby="quizTitleHelp">
    <small id="quizTitleHelp" class="form-text text-muted">The title of the quiz. It'll make it easier to find.</small>
  </div>
  <div class="form-group">
    <label for="quiz_description">Quiz Description</label>
    <input type="input" class="form-control" name="quiz_description" id="quiz_description" aria-describedby="quizDescriptionHelp">
    <small id="quizDescriptionHelp" class="form-text text-muted">A description of the quiz which is worst case useless and best case useless.</small>
  </div>
  <div class="form-group">
    <label for="quizmaster">Who are you?</label>
    <select class="form-control" id="quizmaster" name="quizmaster"  aria-describedby="quizmasterHelp">
      <option value=1>James or Andrew Dixon & Al Koiman</option>
      <option value=2>Phil Hwang</option>
      <option value=3>George Kefalas</option>
      <option value=4>Alexandra Lewis</option>
      <option value=5>Joseph Szymborski</option>
      <option value=6>Adam Verillo</option>
    </select>
    <small id="quizmasterHelp" class="form-text text-muted">You will henceforth be known as this quiz's quizmaster.</small>
  </div>
  <button type="submit" class="btn btn-dark">Create</button>
</form>
@endsection