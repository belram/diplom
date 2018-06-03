<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Topic;
use DB;
use Validator;

class IndexController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $pages = DB::table('topics')->leftJoin('questions', 'topics.id', '=', 'questions.topic_id')
                    ->where('status', 2)
                    ->distinct()
                    ->get(['topic_id','topic', 'alias']);
        $data = [];
        foreach ($pages as $value) {
            $temp = Topic::find($value->topic_id)->questions->where('status', 2);
            if ($temp->count() > 0) {
                $data[$value->alias] = $temp->values(['question', 'answer']);
            }
        }

        return view('site.index', compact('pages', 'data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::get(['topic']);
        return view('site.add_question', compact('topics'));
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
            return redirect()->route('create')->withErrors($validator)->withInput();
        }
        $topic = Topic::sameTopic($data['topic'])->get(['id']);
        $aaa = Question::create([
                'question' => $data['question'],
                'author_question' => $data['name'],
                'author_email' => $data['email'],
                'question_created_at' => date('Y-m-d H:i:s'),
                'status' => 1,
                'topic_id' => $topic[0]->id
                ]);

        return redirect()->route('index')->with('status', 'Ваш вопрос добавлен!');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
