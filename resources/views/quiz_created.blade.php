@extends('layout')

@section('title', 'Quiz Created!')

@section('content')
<h1>&#8220;{{$quiz_title}}&#8221; Created.</h1>
<h2 class="text-muted">This quiz better not be shitty.</h2>

<p>Let the team know to submit questions by visiting the link below:</p>
<code><pre>{{url("/questions/{$quiz_id}")}}</pre></code>

<p>To make the quiz available to take, or cancel it, use the link below:</p>
<code><pre>{{url("/manage/{$quiz_id}/{$quiz_code}")}}</pre></code>
@endsection