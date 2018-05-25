<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use Validator;

class ChangeCatController extends Controller
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
				'topic' => 'required'
			], $messages);

			if ($validator->fails()) {
				return redirect()->route('topicsCategory', ['topic' => $topic ])->withErrors($validator)->withInput();
			}

			$new_topic_name = Question::where('id', $topic)->first();

			$current_topic = $new_topic_name->topic;

			$new_topic_name->topic = $temp['topic'];
			$new_topic_name->alias = strtolower($temp['topic']);

			if ($new_topic_name->save()) {
				return redirect()->route('topicsCategory', ['topic' => $current_topic])->with('status', 'Тема вопроса изменена!');
			}

		}		



		$result = Question::distinct()->get(['topic'])->toArray();

		$lastTopic = Question::where('id', $topic)->value('topic');

		$topics = [];

		foreach ($result as $value) {
			$topics[] = $value['topic'];
		}

		return view('site.change_topic', ['topics' => $topics, 'topic_id' => $topic, 'lastTopic' => $lastTopic]);

	}


}
