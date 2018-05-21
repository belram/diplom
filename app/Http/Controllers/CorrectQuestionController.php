<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use Validator;

class CorrectQuestionController extends Controller
{
    //
    public function execute(Request $request, $id = NULL)
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
				return redirect()->route('correctQuest', ['id' => $id])->withErrors($validator);
			}

			$new_question = Question::where('id', $id)->first();

			$new_question->question = $temp['question'];
			$new_question->author_question = $temp['author_name'];

			if ($new_question->save()) {
				return redirect()->route('withoutAnswer')->with('status', "Вопрос с id = $id изменен!");
			}

		}		

		if (view()->exists('site.correct_question')) {

			$question = [];
			$question['question'] = Question::where('id', $id)->value('question');
			$question['author'] = Question::where('id', $id)->value('author_question');

			$question['question_id'] = $id;

    		return view('site.correct_question', ['question' => $question]);

		} else {
			abort(404);
		}

	}










}
