@extends('layout')

@section('title', 'View Results')

@section('content')
<h1>Results for &ldquo;{{$quiz->title}}&rdquo;</h1>


@foreach ($quiz->questions as $question)
<p><strong>{{$question->question}}</strong></p>
<ul>
    <li><strong>Correct answer:</strong> {{$question->answer}} ({{$author_lookup[$question->author]}})</li>
    @foreach($question->answers as $answer)
        <li>{{$author_lookup[$answer->author]}}: <em>&ldquo;{{$answer->answer}}&rdquo;</em></li>
    @endforeach
</ul>
@endforeach

@endsection