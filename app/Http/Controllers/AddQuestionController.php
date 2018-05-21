<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use Validator;

class AddQuestionController extends Controller
{
    //

	public function add_question(Request $request)
	{

		if ($request->isMethod('post')) {

			$messages = [
				'required'=>'Поле :attribute обязательно к заполнению',
				'email'=>'Поле :attribute должно соответствовать email адресу',
				'maX'=>'Значение поля :attribute должно быть меннее 255 символов'
			];

			$data = $request->except('_token', 'save');

			$validator = Validator::make($data, [
				'name' => 'required|max:255',
				'email' => 'required|email',
				'topic' => 'required',
				'question' => 'required'
			], $messages);

			if ($validator->fails()) {
				return redirect()->route('add_question')->withErrors($validator)->withInput();
			}

			$empty_place = Question::where([['topic', $data['topic']], ['question', NULL]])->first();

			if ($empty_place) {
				$empty_place->question = $data['question'];
				$empty_place->author_question = $data['name'];
				$empty_place->author_email = $data['email'];
				$empty_place->status = 1;
				$empty_place->answer_created_at = date('Y-m-d H:i:s');

				if ($empty_place->save()) {
					return redirect()->route('home')->with('status', 'Ваш вопрос добавлен!');
				}

			} else {

				$new_question = new Question();

				$data['alias'] = mb_strtolower($data['topic']);
				$data['author_question'] = $data['name'];
				$data['author_email'] = $data['email'];
				$data['status'] = 1;
				
				unset($data['name']);
				unset($data['email']);

				$new_question->fill($data);

				if ($new_question->save()) {
					return redirect()->route('home')->with('status', 'Ваш вопрос добавлен!');
				}			

			}

		}		

		if (view()->exists('site.add_question')) {
			$result = Question::distinct()->get(['topic'])->toArray();

    		$topics = [];

    		foreach ($result as $value) {
    			$topics[] = $value['topic'];
    		}

    		return view('site.add_question', ['topics'=>$topics]);
		} else {
			abort(404);
		}

	}


}
