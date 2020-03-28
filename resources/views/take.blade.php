@extends('layout')

@section('title', 'Taking '.$quiz->title)

@section('content')
<h3 class="allcaps">{{$quiz->title}}</h3>
<form action="/take/{{$quiz->id}}/qs" method="post">

<div class="form-row">
<div class="form-group col-md-6">
    <label for="studentName"><strong>Student Name</strong></label>
    <select class="form-control" id="studentName" name="studentName">
      <option value=1>James or Andrew Dixon</option>
      <option value=2>Phil Hwang</option>
      <option value=3>George Kafalis</option>
      <option value=4>Alexandra Lewis</option>
      <option value=5>Joseph Szymborski</option>
      <option value=6>Adam Verillo</option>
    </select>  </div>
  <div class="form-group col-md-6">
    <label for="studentId"><strong>Student ID</strong></label>
    <input type="input" class="form-control" id="studentId" name="studentId">
  </div>
  </div>
<?php $i = 0; ?>
@foreach ($quiz->questions as $question)
<?php $i++; ?>
<div class="form-group">
    <label for="question{{$question->id}}"><strong>({{$i}}) {{$question->question}}</strong></label>
    <textarea class="form-control" name="question{{$question->id}}" id="question{{$question->id}}" rows="3"></textarea>
</div>
@endforeach
@csrf
<button type="submit" class="btn btn-dark">Final Answer, Regis</button>
</form>
@endsection