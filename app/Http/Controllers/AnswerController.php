<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use Auth;
use Validator;

class AnswerController extends Controller
{
    
    public function execute(Request $request, $topic = NULL)
    {

		if ($request->isMethod('post')) {

            $temp = $request->except('_token');

			$messages = [
				'required'=>'Поле :attribute обязательно к заполнению'
			];


			$validator = Validator::make($temp, [
				'answer' => 'required'
			], $messages);

			if ($validator->fails()) {
				return redirect()->route('answer', ['topic' =>  $topic])->withErrors($validator)->withInput();
			}

			$new_answer = Question::where('id', $topic)->first();

			$current_topic = $new_answer->topic;			

            $new_answer->answer = $temp['answer'];
            $new_answer->answer_created_at = date('Y-m-d H:i:s');
            $new_answer->author_answer = Auth::user()->name;

            if ($temp['action'] == 'Save and hide') {
            	$new_answer->status = 3;
            }else{
            	$new_answer->status = 2;
            }

			if ($new_answer->save()) {
				return redirect()->route('topicsCategory', ['topic' => $current_topic])->with('status', 'Ваш ответ добавлен!');
			}

		}

		if (view()->exists('site.answer')) {


			$question = [];
			$question['question'] = Question::where('id', "$topic")->value('question');
			$question['question_id'] = $topic;

			return view('site.answer', ['question' => $question]);

		} else {
			abort(404);
		}

	}
    
}
