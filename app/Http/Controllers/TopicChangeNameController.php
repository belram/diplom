<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use Validator;

class TopicChangeNameController extends Controller
{
    //
	public function changeName(Request $request, $alias)
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
				return redirect()->route('changeName', ['alias'=>$alias])->withErrors($validator)->withInput();
			}

			$new_name_topic = Question::where('alias', $alias)->get();

			$data['alias'] = mb_strtolower($data['topic']);

			foreach ($new_name_topic as $value) {
				$value->topic = $data['topic'];
				$value->alias = $data['alias'];
				$value->save();
			}


			// if ($new_topic->save()) {
				return redirect()->route('topics')->with('status', 'Название темы обновлено!');
			// }

		}	



		return view('site.topics_change_name', compact('alias'));


	}


}
