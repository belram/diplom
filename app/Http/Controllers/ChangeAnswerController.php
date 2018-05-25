<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use Validator;

class ChangeAnswerController extends Controller
{
    //
    public function execute(Request $request, $topic = NULL)
    {

		if ($request->isMethod('post')) {

			$temp = $request->except('_token', 'save');

			$messages = [
				'required'=>'Поле :attribute обязательно к заполнению'
			];

			$validator = Validator::make($temp, [
				'answer' => 'required'
			], $messages);

			if ($validator->fails()) {
				return redirect()->route('changeAnswer', ['topic' => $topic])->withErrors($validator);
			}

			$new_answer = Question::where('id', $topic)->first();

			$current_topic = $new_answer->topic;

			$new_answer->answer = $temp['answer'];

			if ($new_answer->save()) {
				return redirect()->route('topicsCategory', ['topic' => $current_topic])->with('status', "Ответ с id = $topic изменен!");
			}

		}		



		$answer = [];
		$answer['answer'] = Question::where('id', "$topic")->value('answer');
		$lastTopic = Question::where('id', $topic)->value('topic');
		$answer['answer_id'] = $topic;

		return view('site.change_answer',  compact('answer', 'lastTopic'));



	}





}
