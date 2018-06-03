<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Topic;
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
            return redirect()->route('formChangeTopic', ['id' => $temp['question_id'] ])->withErrors($validator);
        }
        Question::sameId($temp['question_id'])->update(['topic_id' => $temp['topic']]);

        return redirect()->route('category', ['id' => $temp['lastTopic']])->with('status', 'Тема вопроса изменена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $data = Topic::find($id)->questions()->get()->toArray();
        $result = Topic::find($id);
        foreach ($data as $key => $value) {
            $data[$key]['topic'] = $result->topic;
            $data[$key]['alias'] = $result->alias;
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
    public function edit($id)
    {
        //
        $topics = Topic::get(['id','topic']);
        $tmp = Question::find($id);
        $lastTopic = $tmp->topic_id;

        return view('site.change_topic', ['topics' => $topics, 'question_id' => $id, 'lastTopic' => $lastTopic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $temp = $request->except('_token');
        $question = Question::find($id);
        if ($temp['action'] == 'Hide') {
            $question->update(['status' => 3]);
            return redirect()->route('category', ['topic'=>$temp['topic']])->with('status', "Вопрос с id = $id скрыт!");
        }
        if ($temp['action'] == 'Public') {
            $question->update(['status' => 2]);
            return redirect()->route('category', ['topic'=>$temp['topic']])->with('status', "Вопрос с id = $id опубликован!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        Question::find($id)->delete();
        return redirect()->route('category', ['id'=>$request->topic])->with('status', "Вопрос удален!");
    }
}
