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
      <option value=1>James or Andrew Dixon-Tyconderoga & Al Coolguy</option>
      <option value=2>Don Hwang</option>
      <option value=3>George Kefalas</option>
      <option value=4>Alexandra (It's) Lupus</option>
      <option value=5>Joseph Zimbabwe</option>
      <option value=6>Adam Vermicelli</option>
    </select>
  </div>
<div class="form-group">
    <label for="question">Question</label>
    <textarea class="form-control" name="question" id="question" rows="7" placeholder="Who killed Jesse Gelsinger:

(A) Coronavirus
(B) Failure to Thrive
(C) James or Andrew Dixon-Tyconderoga & Al Coolguy
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
      <li>James or Andrew Dixon-Tyconderoga & Al Coolguy: {{$num_qs[0]}}</li>
      <li>Don Hwang: {{$num_qs[1]}}</li>
      <li>George Kefalas: {{$num_qs[2]}}</li>
      <li>Alexandra (It's) Lupus: {{$num_qs[3]}}</li>
      <li>Joseph Zimbabwe: {{$num_qs[4]}}</li>
      <li>Adam Vermicelli: {{$num_qs[5]}}</li>
</ul>
@endsection