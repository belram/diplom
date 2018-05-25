<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use Validator;

class ChangeQuestController extends Controller
{
    //

    public function execute(Request $request, $topic = NULL)
    {

		if ($request->isMethod('post')) {

			$temp = $request->except('_token', 'save');

			//dd($temp);

			$messages = [
				'required'=>'Поле :attribute обязательно к заполнению',
				'maX'=>'Значение поля :attribute должно быть меннее 255 символов'
			];

			$validator = Validator::make($temp, [
				'question' => 'required',
				'author_name' => 'required|max:255'
			], $messages);

			if ($validator->fails()) {
				return redirect()->route('changeQuestion', ['topic' => $topic ])->withErrors($validator);
			}

			$new_question = Question::where('id', $topic)->first();

			$current_topic = $new_question->topic;

			$new_question->question = $temp['question'];
			$new_question->author_question = $temp['author_name'];

			if ($new_question->save()) {
				return redirect()->route('topicsCategory', ['topic' => $current_topic])->with('status', "Вопрос с id = $topic изменен!");
			}

		}		


			$question = [];
			$question['question'] = Question::where('id', $topic)->value('question');
			$question['author'] = Question::where('id', $topic)->value('author_question');

			$lastTopic = Question::where('id', $topic)->value('topic');
			$question['question_id'] = $topic;

    		return view('site.change_question', compact('question', 'lastTopic'));

	}

}
