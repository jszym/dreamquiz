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
<div class="container">
<ul class="list-unstyled">
  <h3>About DreamQuiz</h3>
  <li class="media">
    <img src="/imgs/ted_phil.png" class="mr-3" alt="...">
    <div class="media-body">
      <h5 class="mt-0 mb-1">&#8220;The quizification of friendship is the future of successful living.&#8221;</h5>
      Don Hwang is an expert in &#8220;living examination&#8221; theory, a field he started in 2015 after successfully completing an undergraduate degree in Biochemistry and East Asian Minors. His teachings have inspired hundreds of thousands to question not only themselves, but others. This form of introsepction as applied to friends, so called exointrospection, is at the root of Lt. Hwang's teachings. &#8220;DreamQuiz...&#8221;, Don said to attendees of his award-wining masterclass in living examination theory, &#8220;...is the technological embodiment of exointrospection. It is easy to see it is our new robot Jesus. Our technolojesus.&#8221;
    </div>
  </li>
  <li class="media" style="text-align:right;padding-top:30px;">
    <div class="media-body" style="text-align:right;">
      <h5 class="mt-0 mb-1">&#8220;DreamQuiz embiggens the friendship receptors and will defeat COVID-19, the disease that arises from SARS-CoV-2.&#8221;</h5>
      &#8220;&alpha;-ketogluterate is a member of the Krebs cycle&#8221;, begins a paper by Joseph Szymborski's attorney published in Intergalactic Annals of the Anus, Virus, and Friendship Association. The paper continues &#8220;...just as I know that bit of biology, I also know that frienship is stored in the brain and pee is stored in the balls.&#8220; The conclusive evidence that Joseph Szymbobo continues to dig up from an ancient Mayan chest he found while vacationing in Laval provide the scientific basis for the most cromulent technology before you today.
    </div>
    <img src="/imgs/joseph_brain.png" class="mr-3" alt="...">
  </li>
</ul>
<h3>Powered By</h3>
<img src="/imgs/noteafloat.png" />
</div>
@endsection