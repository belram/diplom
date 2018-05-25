<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use DB;

class TopicsController extends Controller
{
    //

    public function execute(Request $request, $alias = NULL)
    {


        if ($request->isMethod('post')) {

            $result = DB::table('questions')->where('alias', $alias)->delete();

            if ($result) {
                return redirect()->route('topics')->with('status', "Тема $alias удалена!");
            }

        }



		$topics = Question::distinct()->get(['topic'])->toArray();
		$temp = [];

		foreach ($topics as $topic) {
			$temp[] = $topic['topic'];
		}

		$data = [];
		$i = 1;

		foreach ($temp as $value) {
			$data[$value]['alias'] = Question::where('topic', "$value")->value('alias');
			$data[$value]['wait'] = Question::where([['topic', "$value"], ['status', 1]])->count();
			$data[$value]['published'] = Question::where([['topic', "$value"], ['status', 2]])->count();
			$data[$value]['hidden'] = Question::where([['topic', "$value"], ['status', 3]])->count();
			$data[$value]['total'] = Question::where([['topic', "$value"], ['status', '>', 0]])->count();
			$data[$value]['i'] = $i++;
		}

		return view('site.topics', compact('data'));

    }
}
