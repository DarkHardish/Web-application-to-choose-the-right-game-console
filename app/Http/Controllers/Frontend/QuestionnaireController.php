<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konsole;
use Illuminate\Support\Facades\DB;
use App\Models\pytanska;
use Session;


class QuestionnaireController extends Controller
{/*
    public function firstQuestion()
    {
        $question = pytanska::find(1);
        return view('first_question', compact('question'));
    }

    public function handleFirstQuestion(Request $request)
    {
        $answer = $request->get('answer');

        if ($answer == 'yes') {
            $questionIds = [5, 6, 7];
            session(['questionIds' => $questionIds]);
            session(['answers' => []]);
            return redirect()->route('next_question');
        } else {
            $questionIds = [2, 3, 4];
            session(['questionIds' => $questionIds]);
            session(['answers' => []]);
            return redirect()->route('next_question');
        }
    }
    public function nextQuestion()
{
    $questionIds = session('questionIds');
    $answers = session('answers');
    if (empty($questionIds)) {
        return redirect()->route('show_answers');
    }
    $nextQuestionId = array_shift($questionIds);
    session(['questionIds' => $questionIds]);
    $question = pytanska::find($nextQuestionId);
    return view('next_question', compact('question'));
}
public function handleNextQuestion(Request $request)
{
    $answers = session('answers');
    $question = pytanska::find($request->get('question_id'));
    $answers[] = [
        'question' => $question->Pytanie,
        'answer' => $request->get('answer')
    ];
    session(['answers' => $answers]);
    return redirect()->route('next_question');
}
public function showAnswers()
{
    $answers = session('answers');
    return view('show_answers', compact('answers'));
}*/
}
