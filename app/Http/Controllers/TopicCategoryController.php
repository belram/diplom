<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use DB;
use Validator;

class TopicCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $temp = $request->except('_token', 'save');

        $messages = [
            'required'=>'Поле :attribute обязательно к заполнению'
        ];

        $validator = Validator::make($temp, [
            'topic' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('formChangeTopic', ['topic' => $temp['topic_id'] ])->withErrors($validator)->withInput();
        }

        $new_topic_name = Question::find($temp['topic_id']);

        $current_topic = $new_topic_name->topic;

        $new_topic_name->topic = $temp['topic'];
        $new_topic_name->alias = strtolower($temp['topic']);

        if ($new_topic_name->save()) {
            return redirect()->route('category', ['topic' => $current_topic])->with('status', 'Тема вопроса изменена!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($topic)
    {
        //
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

        return view('site.category', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($topic)
    {
        //
        $result = Question::distinct()->get(['topic'])->toArray();

        $tmp = Question::find($topic);

        $lastTopic = $tmp->topic;

        $topics = [];

        foreach ($result as $value) {
            $topics[] = $value['topic'];
        }

        return view('site.change_topic', ['topics' => $topics, 'topic_id' => $topic, 'lastTopic' => $lastTopic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $topic)
    {
        //
        $temp = $request->except('_token');

        if ($temp['action'] == 'Hide') {

            $change_status = Question::find($topic);

            $change_status->status = 3;

            if ($change_status->save()) {
                return redirect()->route('category', ['topic'=>$temp['topic']])->with('status', "Вопрос с id = $topic скрыт!");
            }
        }

        if ($temp['action'] == 'Public') {

            $change_status = Question::find($topic);

            $change_status->status = 2;

            if ($change_status->save()) {
                return redirect()->route('category', ['topic'=>$temp['topic']])->with('status', "Вопрос с id = $topic опубликован!");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $topic)
    {
        //
        $temp = $request->except('_token');

        $result = Question::find($topic)->delete();

        if ($result) {
            return redirect()->route('category', ['topic'=>$temp['topic']])->with('status', "Вопрос удален!");
        }
    }
}
