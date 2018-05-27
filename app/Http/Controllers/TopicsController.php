<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use Validator;
use DB;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('site.topics_add');
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
                return redirect()->route('formTopicAdd')->withErrors($validator)->withInput();
            }

            $new_topic = new Question();

            $data['alias'] = mb_strtolower($data['topic']);

            $new_topic->fill($data);

            if ($new_topic->save()) {
                return redirect()->route('topics')->with('status', 'Новая тема добавлена!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($alias)
    {
        //
        return view('site.topics_change_name', compact('alias'));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $alias)
    {
        //
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
                return redirect()->route('formChangeNameTopic', ['alias'=>$alias])->withErrors($validator)->withInput();
            }

            $new_name_topic = Question::where('alias', $alias)->get();
            $data['alias'] = mb_strtolower($data['topic']);

            foreach ($new_name_topic as $value) {
                $value->topic = $data['topic'];
                $value->alias = $data['alias'];
                $value->save();
            }

            return redirect()->route('topics')->with('status', 'Название темы обновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($alias)
    {
        //
        $result = DB::table('questions')->where('alias', $alias)->delete();
        if ($result) {
            return redirect()->route('topics')->with('status', "Тема $alias удалена!");
        }
    }
}
