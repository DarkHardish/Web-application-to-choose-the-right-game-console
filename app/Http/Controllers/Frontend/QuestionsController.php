<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\questionzs;
use App\Models\Konsole;
use App\Models\pytanska;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class QuestionsController extends Controller
{


    public function firstQuestion()
    {
        $question = pytanska::find(1);
        return view('first_question', compact('question'));
    }

    public function handleFirstQuestion(Request $request)
    {
        $answer = $request->get('answer');
       
        session(['answer' => $answer]);
        if ($answer == 'yes') {
            $questionIds = [3,5,6,7,11,13,14,2];
            session(['questionIds' => $questionIds]);
            session(['answers' => []]);
            return redirect()->route('next_question');
            
        } else {
            $questionIds = [3,4,5,6,7,10,11,12,14];
            session(['questionIds' => $questionIds]);
            session(['answers' => []]);
            return redirect()->route('next_question');
            
        }
    
    }
    public function nextQuestion()
{
   
    $questionIds = session('questionIds');
    $answers = session('answers');
    if (empty($questionIds)) 
    {
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
    $onlyAnswers = array_column($answers, 'answer');
   //dd($answers);
  $answer = session('answer');
    //return view('show_answers', compact('answers'));
    if(!empty($onlyAnswers))
    {
   return $this->saveAnswersToTable( $onlyAnswers, $answer);
    }
}

/*
    function test($id) 
    {
      
      $questions = pytanska::all();
      $question = pytanska::find($id);
      // Initialize the tabliczka array
      $answer = request()->input('answer',[]);

  
      if ($id) {
        if(request()->has('answer')){
        $answer = request()->input('answer',[]);
       
        $answers = Session::get('answers', []);
        $answers[$id-1] = $answer;
        Session::put('answers', $answers);
       // dd($answers);
        }
        
        }
       if (!$question) {
         if(!empty($answers)){
        return $this->saveAnswersToTable($answers);
        //Session::forget('answers');
         }
        }

        return view('test', ['question' => $question, 'questions' => $questions, 'answer' => $answer]);
      }
*/



      public function saveAnswersToTable($onlyAnswers,$answer){
        $tabliczka = [];
       
   
        foreach(pytanska::all() as $pytanka)
        {
            foreach(Konsole::all() as $console) 
            {

              /*  if ($pytanka->id == 1 ) {
                    if ($console->podroze == $answers[1]) {
                       
                        $tabliczka[$pytanka->id][$console->id] = 1;
                    } else  {
                        $tabliczka[$pytanka->id][$console->id] = 0;
                    }
                } */
                if($answer == 'no'){
                
                if ($pytanka->id == 3) {
                    if  ($console->price <= $onlyAnswers[0]) {
                        $tabliczka[$pytanka->id][$console->id] = 1;
                    } else {
                        $tabliczka[$pytanka->id][$console->id] = 0;
                    }
                }elseif ($pytanka->id == 4){
                    if($console->GB >= $onlyAnswers[1]){
                        $tabliczka[$pytanka->id][$console->id] = 1;
                    } else {
                        $tabliczka[$pytanka->id][$console->id] = 0;
                    }
                }elseif ( $pytanka->id == 5){
                    $checkboxes = $onlyAnswers[2];
                    $match = false;
                    foreach ($checkboxes as $checkbox) {
                        if (strpos($console->IO, $checkbox) !== false) {
                        $match = true;
                        break;
                        }
                        }
                        if ($match) {
                        $tabliczka[$pytanka->id][$console->id] = 1;
                        } else {
                        $tabliczka[$pytanka->id][$console->id] = 0;
                        }
                    }elseif ($pytanka->id == 6){
                        $checkboxes = $onlyAnswers[3];
                        $match = false;
                        foreach ($checkboxes as $checkbox) {
                            if (strpos($console->rozdzielczosc, $checkbox) !== false) {
                            $match = true;
                            break;
                            }
                            }
                            if ($match) {
                            $tabliczka[$pytanka->id][$console->id] = 1;
                            } else {
                            $tabliczka[$pytanka->id][$console->id] = 0;
                            }
                        }elseif ($pytanka->id == 7 ) {
                            if ($console->kompatybilnosc == $onlyAnswers[4]) {
                                $tabliczka[$pytanka->id][$console->id] = 1;
                            } else  {
                                $tabliczka[$pytanka->id][$console->id] = 0;
                            }
                        }elseif ($pytanka->id == 11) {
                            if ($console->aktywnosc_fizyczna == $onlyAnswers[5]) {
                                $tabliczka[$pytanka->id][$console->id] = 1;
                            } else  {
                                $tabliczka[$pytanka->id][$console->id] = 0;
                            }
                        }elseif ($pytanka->id == 10) {
                            if ($console->dluga_praca_baterii == $onlyAnswers[6]) {
                                $tabliczka[$pytanka->id][$console->id] = 1;
                            } else  {
                                $tabliczka[$pytanka->id][$console->id] = 0;
                            }
                        }elseif ($pytanka->id == 12) {
                            if ($console->wbudowane_glosniki == $onlyAnswers[7]) {
                                $tabliczka[$pytanka->id][$console->id] = 1;
                            } else  {
                                $tabliczka[$pytanka->id][$console->id] = 0;
                            }
                        }elseif ($pytanka->id == 14) {
                            if ($console->wifi_bluetooth == $onlyAnswers[8]) {
                                $tabliczka[$pytanka->id][$console->id] = 1;
                            } else  {
                                $tabliczka[$pytanka->id][$console->id] = 0;
                            }
                        }
            
            }if($answer == 'yes'){
               

                if ($pytanka->id == 3) {
                    if  ($console->price <= $onlyAnswers[0]) {
                        $tabliczka[$pytanka->id][$console->id] = 1;
                    } else {
                        $tabliczka[$pytanka->id][$console->id] = 0;
                    }
                }elseif ( $pytanka->id == 5){
                    $checkboxes = $onlyAnswers[1];
                    $match = false;
                    foreach ($checkboxes as $checkbox) {
                        if (strpos($console->IO, $checkbox) !== false) {
                        $match = true;
                        break;
                        }
                        }
                        if ($match) {
                        $tabliczka[$pytanka->id][$console->id] = 1;
                        } else {
                        $tabliczka[$pytanka->id][$console->id] = 0;
                        }
                    }elseif ($pytanka->id == 6){
                $checkboxes = $onlyAnswers[2];
                $match = false;
                foreach ($checkboxes as $checkbox) {
                    if (strpos($console->rozdzielczosc, $checkbox) !== false) {
                    $match = true;
                    break;
                    }
                    }
                    if ($match) {
                    $tabliczka[$pytanka->id][$console->id] = 1;
                    } else {
                    $tabliczka[$pytanka->id][$console->id] = 0;
                    }
                }elseif ($pytanka->id == 7 ) {
                    if ($console->kompatybilnosc == $onlyAnswers[3]) {
                        $tabliczka[$pytanka->id][$console->id] = 1;
                    } else  {
                        $tabliczka[$pytanka->id][$console->id] = 0;
                    }
                } if ($pytanka->id == 2) {
                    if ($console->VR !== $onlyAnswers[4]) {
                        $tabliczka[$pytanka->id][$console->id] = 1;
                    } else  {
                        $tabliczka[$pytanka->id][$console->id] = 0;
                    }
                }elseif ($pytanka->id == 11) {
                    if ($console->aktywnosc_fizyczna == $onlyAnswers[5]) {
                        $tabliczka[$pytanka->id][$console->id] = 1;
                    } else  {
                        $tabliczka[$pytanka->id][$console->id] = 0;
                    }
                }
                elseif ($pytanka->id == 13) {
                    if ($console->modyfikacje == $onlyAnswers[6]) {
                        $tabliczka[$pytanka->id][$console->id] = 1;
                    } else  {
                        $tabliczka[$pytanka->id][$console->id] = 0;
                    }
                }
                elseif ($pytanka->id == 14) {
                    if ($console->wifi_bluetooth == $onlyAnswers[7]) {
                        $tabliczka[$pytanka->id][$console->id] = 1;
                    } else  {
                        $tabliczka[$pytanka->id][$console->id] = 0;
                    }
                }

            }
        }
    } //dd($onlyAnswers);
        return $this->congratulations($onlyAnswers,$tabliczka);
      }




      
      public function congratulations($onlyAnswers, $tabliczka) {
        
        $questions = pytanska::all();
        $questionsAndAnswers = [];
        foreach ($questions as $question) {
        $answer = isset($onlyAnswers[$question->id]) ? $onlyAnswers[$question->id] : '';
        $questionsAndAnswers[$question->id] = [
          'question' => $question->Pytanie,
          'answer' => $answer
    ];
    
}
          ksort($questionsAndAnswers);


          $points = array();

        // Loop through the tabliczka array and add the points for each console
        foreach ($tabliczka as $question) {
            foreach ($question as $consoleId => $consolePoints) {
                if(isset($points[$consoleId])){
                    $points[$consoleId] += $consolePoints;
                }else{
                    $points[$consoleId] = $consolePoints;
                }
            }
        }
        // Get the records from the Konsole table based on the user's onlyAnswers
        $konsole = DB::table('konsoles')->get();
        $consolePoints = array();
        foreach ($konsole as $console) {
            if(isset($points[$console->id])){
                $percentage = ($points[$console->id] / count($tabliczka)) * 100;
                $consolePoints[] = ['console' => $console->nazwa, 'image' =>$console->image ,'points' => $points[$console->id], 'percentage' => $percentage, 'id'=>$console->id, 'nazwa'=>$console->nazwa];
            }
        }
        usort($consolePoints, function($a, $b) {
            return $b['percentage'] <=> $a['percentage'];
        });

        


        foreach($consolePoints as $key => $console) {
            $consolePoints[$key]['questions'] = array();
            foreach($tabliczka as $questionId => $question) {
                $consoleId = Konsole::where('nazwa', $console['console'])->first()->id;
                if ($question[$consoleId] == 1) {
                $question = str_replace(array("{","}"), "", $question);
                $consolePoints[$key]['questions'][] = '<span class="green">' .pytanska::find($questionId)->Pytanie.'</span>';
            }else{
                 $consolePoints[$key]['questions'][] = '<span class="red">' .pytanska::find($questionId)->Pytanie.'</span>';
            }
        }}
        


/*        // Get the records from the Konsole table based on the user's answers
        $konsole = DB::table('konsoles')
            ->when(isset($answers[1]), function ($query) use ($answers) {
                return $query->where('podroze', $answers[1]);
            })
            ->when(isset($answers[2]), function ($query) use ($answers) {
                return $query->where('VR', $answers[2]);
            })
            ->when(isset($answers[3]),function($query) use ($answers){
              return $query->where('price','<=', $answers[3]);
            })
            ->when(isset($answers[4]),function($query) use ($answers){
                return $query->where('GB','>=', $answers[4]);
            })
            ->when(isset($answers[5]), function ($query) use ($answers) {
                $checkboxes = $answers[5];
                $query->where(function($query) use ($checkboxes){
                foreach ($checkboxes as $checkbox) {
                $query->orWhere('IO', 'LIKE', '%' . $checkbox . '%');
                }
                });
                return $query;
            })
            ->when(isset($answers[6]), function ($query) use ($answers) {
                $checkboxes = $answers[6];
                $query->where(function($query) use ($checkboxes){
                foreach ($checkboxes as $checkbox) {
                $query->orWhere('rozdzielczosc', 'LIKE', '%' . $checkbox . '%');
                }
            });
                return $query;
            })
            ->when(isset($answers[7]), function ($query) use ($answers) {
                    return $query->where('kompatybilnosc', $answers[7]);
            })
            ->when(isset($answers[8]), function ($query) use ($answers) {
                return $query->where('wifi', $answers[8]);
            })
            ->when(isset($answers[9]), function ($query) use ($answers) {
                return $query->where('bluetooth', $answers[9]);
            })
            ->get();

*/

/*
            $tabliczka[1]['importance'] = 2; // set high importance to question 1
            $tabliczka[2]['importance'] = 1;
            $tabliczka[3]['importance'] = 1;
            $tabliczka[4]['importance'] = 1;
            $tabliczka[5]['importance'] = 1;
            $tabliczka[6]['importance'] = 1;
            $tabliczka[7]['importance'] = 1;
            $tabliczka[8]['importance'] = 1;
            $tabliczka[9]['importance'] = 1;
    
            // Sort the consolePoints array by percentage in descending order
            usort($consolePoints, function($a, $b) use ($tabliczka) {
                $aPoints = $a['points'];
                $bPoints = $b['points'];
    
                $consoleIdA = Konsole::where('nazwa', $a['console'])->first()->id;
                $consoleIdB = Konsole::where('nazwa', $b['console'])->first()->id;
    
                // Check if question 1 has 1 for A
                if ($tabliczka[1][$consoleIdA] == 1) {
                    $aPoints += $tabliczka[1]['importance'];
                }
                // Check if question 1 has 1 for B
                if ($tabliczka[1][$consoleIdB] == 1) {
                    $bPoints += $tabliczka[1]['importance'];
                }
                return $bPoints <=> $aPoints;
            });
*/




            
            return view('congratulations', compact('questionsAndAnswers', 'konsole','tabliczka','onlyAnswers','questions','consolePoints'));  
      
          }
        
    public function pytania(){
        return view('pytania');
    }
}