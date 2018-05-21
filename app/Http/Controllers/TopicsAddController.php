<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use Validator;

class TopicsAddController extends Controller
{
    //
    public function addTopic(Request $request)
    {

		if ($request->isMethod('post')) {

			$messages = [
				'required'=>'Поле :attribute обязательно к заполнению',
				'max'=>'Поле :attribute должно быть не более 255 символов',
				'unique'=>'Поле :attribute должно быть уникальным'
			];

			$data = $request->except('_token', 'save');

			$validator = Validator::make($data, [
				'topic' => 'required|max:255|unique:questions',
			], $messages);

			if ($validator->fails()) {
				return redirect()->route('topicsAdd')->withErrors($validator)->withInput();
			}

			$new_topic = new Question();

			$data['alias'] = mb_strtolower($data['topic']);

			$new_topic->fill($data);

			if ($new_topic->save()) {
				return redirect()->route('topics')->with('status', 'Новая тема добавлена!');
			}

		}		

		if (view()->exists('site.topics_add')) {

    		return view('site.topics_add');

		} else {
			abort(404);
		}

	}

}
