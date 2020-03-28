@extends('layout')

@section('title', 'Manage “'.$quiz->title.'”')

@section('content')
<h1>Manage 	&#8220;{{$quiz->title}}&#8221;</h1>
<h2>Quiz Info</h2>
<ul>
  <li><strong>Quiz Title:</strong> {{$quiz->title}}</li>
  <li><strong>Quiz Description:</strong> {{$quiz->description}}</li>
  <li><strong>Quiz Master:</strong> {{$quiz_master}}</li>
  <li><strong>Created On:</strong> {{$quiz->created_at}}</li>
  @if ($quiz->active)
    <li><strong>Status:</strong> Active</li>
  @else
    <li><strong>Status:</strong> Inactive</li>
  @endif
</ul>
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
<h2>Answer Stats for {{$quiz->title}}</h2>
Number of answers submitted: {{$num_answers}}/{{$quiz->questions->count()*6}}
<h2>Danger Zone</h2>
<form action="/manage" method="post">
@csrf
<input type="hidden" value="{{(int)($quiz->id)}}" name="id" />
<input type="hidden" value="{{$code}}" name="code" />

<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="cancel" name="quizAction" class="custom-control-input" value=1 checked>
  <label class="custom-control-label" for="cancel">Cancel this Quiz</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="activate" name="quizAction" class="custom-control-input" value=2>
  <label class="custom-control-label" for="activate">Activate Quiz</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="inactivate" name="quizAction" class="custom-control-input" value=3>
  <label class="custom-control-label" for="inactivate">Inactivate Quiz</label>
</div>
<br/><br/>

<button type="submit" class="btn btn-dark">Submit</button>
</form>
@endsection