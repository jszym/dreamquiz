<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Quiz;
use App\Question;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/create', function (){
    return view('create');
});

Route::post('/create', function (Request $request){

    $code = strtoupper(substr(base64_encode(Hash::make(time())),-15,15));


    if ($request->quizmaster > 6 ||  $request->quizmaster < 1) {
        return abort(404);
    }

    $quiz = new Quiz;
    $quiz->title = $request->quiz_title;
    $quiz->description = $request->quiz_description;
    $quiz->quiz_master = $request->quizmaster;
    $quiz->code = $code;
    $quiz->save();
    $quiz_id = $quiz->id;

    return view('quiz_created', ['quiz_title'=>$request->quiz_title, 'quiz_id'=>$quiz_id, 'quiz_code'=>$code]);
});

Route::get('/manage/{id}/{code}', function ($id, $code) {
    $quiz = App\Quiz::find($id);

    if ($quiz == null) {
        return redirect('/')->with("error_message", "YSAI the quiz you're trying to manage doesn't exist.");
    }

    if ($quiz->code != strtoupper($code)){
        return redirect('/')->with("error_message", "YSAI that's the wrong code.");
    }

    $quiz_master_lookup = array(
        1 => "James or Andrew Dixon-Tyconderoga & Al Coolguy",
        2 => "Don Hwang",
        3 => "George Kefalas",
        4 => "Alexandra (It's) Lupus",
        5 => "Joseph Zimbabwe",
        6 => "Adam Vermicelli"
    );

    $quiz_master = $quiz_master_lookup[$quiz->quiz_master];

    $num_qs = array(
        App\Question::where('author', 1)->where('quiz_id', $id)->count(),
        App\Question::where('author', 2)->where('quiz_id', $id)->count(),
        App\Question::where('author', 3)->where('quiz_id', $id)->count(),
        App\Question::where('author', 4)->where('quiz_id', $id)->count(),
        App\Question::where('author', 5)->where('quiz_id', $id)->count(),
        App\Question::where('author', 6)->where('quiz_id', $id)->count()
    );

    $num_answers = 0;

    foreach ($quiz->questions as $question) {
        $num_answers = $num_answers + $question->answers->count();
    }

    return view('manage', ['num_answers'=>$num_answers, 'quiz'=>$quiz, 'quiz_master'=>$quiz_master, 'code'=>$code, 'num_qs'=>$num_qs]);
});

Route::post("/manage", function (Request $request){

    $quiz = App\Quiz::find($request->id);
    if ($quiz == null) {
        return redirect('/')->with("error_message", "YSAI the quiz you're trying to manage doesn't exist.");
    }
    if ($quiz->code != strtoupper($request->code)){
        return redirect('/')->with("error_message", "YSAI that's the wrong code.");
    }
    if ($request->quizAction > 3 || $request->quizAction < 1) {
        return redirect('/manage/'.$quiz->id.'/'.$quiz->code)->with("error_message", "Deleted quiz \"$quiz->title\".");
    }

    if ($request->quizAction == 1){
        $qid = $quiz->id;
        $qcode = $quiz->code;
        $qtitle = $quiz->title;
        $quiz->answers()->delete();
        $quiz->questions()->delete();
        $quiz->delete();
        return redirect('/')->with("success_message", "Deleted quiz \"$qtitle\".");
    }

    if ($request->quizAction == 2){
        $quiz->update(['active' => true]);
        return redirect('/manage/'.$quiz->id.'/'.$quiz->code)->with("success_message", "Activated quiz \"$quiz->title\".");
    }

    if ($request->quizAction == 3){
        $quiz->update(['active' => false]);
        return redirect('/manage/'.$quiz->id.'/'.$quiz->code)->with("success_message", "Inactivated quiz \"$quiz->title\".");
    }

});

Route::get("/questions", function(){
    $quizzes = App\Quiz::where('active', false)->get();
    return view('questions_quizzes', ['quizzes' => $quizzes]);
});

Route::get("/questions/{id}", function($id){
    $quiz = App\Quiz::where('id', $id)->where('active', false)->first();

    if ($quiz == null) {
        return redirect('/')->with("error_message", "YSAI you can't write questions for an active exam, or an exam that doesn't exist.");
    }


    $quiz_master_lookup = array(
        1 => "James or Andrew Dixon-Tyconderoga & Al Coolguy",
        2 => "Don Hwang",
        3 => "George Kefalas",
        4 => "Alexandra (It's) Lupus",
        5 => "Joseph Zimbabwe",
        6 => "Adam Vermicelli"
    );

    $num_qs = array(
        App\Question::where('author', 1)->where('quiz_id', $id)->count(),
        App\Question::where('author', 2)->where('quiz_id', $id)->count(),
        App\Question::where('author', 3)->where('quiz_id', $id)->count(),
        App\Question::where('author', 4)->where('quiz_id', $id)->count(),
        App\Question::where('author', 5)->where('quiz_id', $id)->count(),
        App\Question::where('author', 6)->where('quiz_id', $id)->count()
    );


    $quiz_master = $quiz_master_lookup[$quiz->quiz_master];

    return view('write_question', ['quiz'=>$quiz, 'id'=>$id, 'quiz_master'=>$quiz_master, 'num_qs'=>$num_qs]);
});

Route::post("/questions/{id}", function ($id, Request $request){
    $question = new App\Question;
    $question->question = $request->question;
    $question->answer = $request->answer;
    $question->author = $request->author;
    if ($request->author < 1 || $request->author > 6) {
        return redirect('/questions/'.$id)->with("error_message", "YSAI invalid author ({$request->author}).");
    }
    if ($request->question == "" || $request->answer == "") {
        return redirect('/questions/'.$id)->with("error_message", "YSAI, you can't leave the question nor the answer blank.");;
    } 

    $quiz = App\Quiz::where('id', $id)->where('active', false)->first();

    if ($quiz == null) {
        return redirect('/')->with("error_message", "YSAI you can't write questions for an active exam, or an exam that doesn't exist.");
    }

    $quiz->questions()->save($question);

    return redirect('/questions/'.$id)->with("success_message", "Questions submitted!");;
});

Route::get("/take", function(){
    $quizzes = App\Quiz::where('active', true)->get();
    return view("take_list")->with("quizzes", $quizzes);
});

Route::get("/take/{id}", function($id){
    $quiz = App\Quiz::where('active', true)->where('id', $id)->first();
    if ($quiz == null) {
        return redirect('/')->with("error_message", "YSAI you can't take a quiz if the quiz is inactive.");
    }

    $quiz_master_lookup = array(
        1 => "James or Andrew Dixon-Tyconderoga, MSc & Al Coolguy, MD",
        2 => "Don Hwang, MSc",
        3 => "George Kefalas, MSc",
        4 => "Alexandra (It's) Lupus, MSc",
        5 => "Joseph Zimbabwe, MSc",
        6 => "Adam Vermicelli, BSc"
    );
    $quiz_master = $quiz_master_lookup[$quiz->quiz_master];

    return view("take_cover")->with("quiz", $quiz)->with("quiz_master", $quiz_master);
});

Route::get("/take/{id}/qs", function($id){
    $quiz = App\Quiz::where('active', true)->where('id', $id)->first();
    if ($quiz == null) {
        return redirect('/')->with("error_message", "YSAI you can't take a quiz if the quiz is inactive.");
    }

    $quiz_master_lookup = array(
        1 => "James or Andrew Dixon-Tyconderoga & Al Coolguy, MSc",
        2 => "Don Hwang, MSc",
        3 => "George Kefalas, MSc",
        4 => "Alexandra (It's) Lupus, MSc",
        5 => "Joseph Zimbabwe, MSc",
        6 => "Adam Vermicelli, BSc"
    );
    $quiz_master = $quiz_master_lookup[$quiz->quiz_master];

    return view("take")->with("quiz", $quiz)->with("quiz_master", $quiz_master);
});

Route::post("/take/{id}/qs", function($id, Request $request){
    $quiz = App\Quiz::where('active', true)->where('id', $id)->first();
    if ($quiz == null) {
        return redirect('/')->with("error_message", "YSAI you can't take a quiz if the quiz is inactive.");
    }

    $inputs = $request->all();

    foreach ($quiz->questions as $question) {
        $answer = new App\Answer;
        $answer->answer = $inputs["question".$question->id];
        $answer->author = $inputs["studentName"];
        $q = App\Question::find($question->id);
        $q->answers()->save($answer);
    }

    return redirect('/')->with("success_message", "Results submitted, good luck! Let's quantitatively measure how shit a friend you are.");
});

Route::get("/results", function(){
    $quizzes = App\Quiz::where('active', false)->get();
    return view("results_list")->with("quizzes", $quizzes);
});

Route::get("/results/{id}", function($id){
    $quiz = App\Quiz::where('active', false)->where('id', $id)->first();
    if ($quiz == null) {
        return redirect('/')->with("error_message", "YSAI you can't view the results for a quiz that is active, or for a quiz that doesn't exist.");
    }
    $author_lookup = array(
        1 => "J.A.D.",
        2 => "P.H.",
        3 => "G.K.",
        4 => "A.L.",
        5 => "J.S.",
        6 => "A.V."
    );

    if ($quiz->answers->count() == 0) {
        return redirect('/')->with("error_message", "YSAI No answer have been submitted yet.");
    }


    return view("results")->with("quiz", $quiz)->with("author_lookup", $author_lookup);
});