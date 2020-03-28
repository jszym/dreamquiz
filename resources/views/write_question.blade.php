@extends('layout')

@section('title', 'Write Questions')

@section('content')
<h1>Submit Questions for &#8220;{{$quiz->title}}&#8221;</h1>
Quiz Master: {{$quiz_master}}, Quiz Created: {{$quiz->created_at}}
<hr/>
<form action="/questions/{{$id}}" method="post">
@csrf
<div class="form-group">
    <label for="exampleFormControlSelect1">Who are you?</label>
    <select name="author" class="form-control" id="exampleFormControlSelect1">
      <option value=1>James or Andrew Dixon</option>
      <option value=2>Phil Hwang</option>
      <option value=3>George Kafalis</option>
      <option value=4>Alexandra Lewis</option>
      <option value=5>Joseph Szymborski</option>
      <option value=6>Adam Verillo</option>
    </select>
  </div>
<div class="form-group">
    <label for="question">Question</label>
    <textarea class="form-control" name="question" id="question" rows="7" placeholder="Who killed Jesse Gelsinger:

(A) Coronavirus
(B) Failure to Thrive
(C) James or Andrew Dixon
(D) All of the above
(E) None of the above"></textarea>
  </div>
  <div class="form-group">
    <label for="answer">Correct Answer</label>
    <textarea class="form-control" name="answer" id="answer" rows="3" placeholder="(E) None of the above"></textarea>
  </div>
  <button type="submit" class="btn btn-dark">Submit</button>
</form>

<h2>Question Stats for {{$quiz->title}}</h2>
Number of questions submitted by members for this quiz:
<ul>
      <li>James or Andrew Dixon: {{$num_qs[0]}}</li>
      <li>Phil Hwang: {{$num_qs[1]}}</li>
      <li>George Kafalis: {{$num_qs[2]}}</li>
      <li>Alexandra Lewis: {{$num_qs[3]}}</li>
      <li>Joseph Szymborski: {{$num_qs[4]}}</li>
      <li>Adam Verillo: {{$num_qs[5]}}</li>
</ul>
@endsection