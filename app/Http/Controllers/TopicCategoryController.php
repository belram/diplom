<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use DB;

class TopicCategoryController extends Controller
{
    //

    public function execute(Request $request, $topic = NULL)
    {


		if ($request->isMethod('post')) {

            $temp = $request->except('_token');

            //dd($temp);

            if ($temp['action'] == 'Delete') {
            
                $result = DB::table('questions')->where('id', $topic)->delete();

                if ($result) {
                    return redirect()->route('topicsCategory', ['topic'=>$temp['topic']])->with('status', "Вопрос удален!");
                }

            }

            if ($temp['action'] == 'Hide') {

                $change_status = Question::where('id', $topic)->first();

                $change_status->status = 3;

                if ($change_status->save()) {
                    return redirect()->route('topicsCategory', ['topic'=>$temp['topic']])->with('status', "Вопрос с id = $topic скрыт!");
                }
            
            }

            if ($temp['action'] == 'Public') {

                $change_status = Question::where('id', $topic)->first();

                $change_status->status = 2;

                if ($change_status->save()) {
                    return redirect()->route('topicsCategory', ['topic'=>$temp['topic']])->with('status', "Вопрос с id = $topic опубликован!");
                }
            
            }           

		}

    	if (view()->exists('site.category')) {

    		$data = Question::where([['topic', "$topic"], ['status', '>', 0]])->get()->toArray();

            foreach ($data as $key => $value) {
                if (is_null( $value['answer'])) {
                    $data[$key]['answer'] = '';
                    $data[$key]['status'] = 'No answer';
                    $data[$key]['change_status'] = 'Answer';
                }

                if ( $value['status'] == 2) {
                    $data[$key]['status'] = 'Published';
                    $data[$key]['change_status'] = 'Hide';
                } elseif ( $value['status'] == 3) {
                    $data[$key]['status'] = 'Hidden';
                    $data[$key]['change_status'] = 'Public';
                }


            }

    		return view('site.category', ['data' => $data]);

		} else {
			abort(404);
		}

    }
}
