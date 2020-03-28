@extends('layout')

@section('title', 'Submit Questions')

@section('content')
<h1>Submit Questions</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Created On</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($quizzes as $quiz)
    <tr>
      <th scope="row">{{$quiz->id}}</th>
      <td><a href="/questions/{{$quiz->id}}">{{$quiz->title}}</a></td>
      <td>{{$quiz->description}}</td>
      <td>{{$quiz->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection