<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use DB;

class WithoutAnswerController extends Controller
{
    //

  public function execute(Request $request, $id = NULL)
  {


    if ($request->isMethod('post')) {

      $result = DB::table('questions')->where('id', $id)->delete();

      if ($result) {
        return redirect()->route('withoutAnswer')->with('status', "Вопрос с id = $id удален!");
      }

    }

		if (view()->exists('site.without_answer')) {

    	$data = Question::where([['question', '!=', NULL], ['answer', NULL]])
              ->orderBy('question_created_at')
    					->get(['id', 'topic' , 'question', 'question_created_at'])->toArray();

    	return view('site.without_answer', ['data' => $data]);

		} else {

			abort(404);

		}

  }




















}
