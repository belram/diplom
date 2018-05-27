<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use Auth;
use Validator;

class AnswerController extends Controller
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
        $temp = $request->except('_token');

        $messages = [
            'required'=>'Поле :attribute обязательно к заполнению'
        ];

        $validator = Validator::make($temp, [
            'answer' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('formAnswer', ['topic' =>  $temp['topic']])->withErrors($validator)->withInput();
        }

        $new_answer = Question::find($temp['topic']);
        $current_topic = $new_answer->topic;            

        $new_answer->answer = $temp['answer'];
        $new_answer->answer_created_at = date('Y-m-d H:i:s');
        $new_answer->author_answer = Auth::user()->name;

        if ($temp['action'] == 'Save and hide') {
            $new_answer->status = 3;
        }else{
            $new_answer->status = 2;
        }

        if ($new_answer->save()) {
            return redirect()->route('category', ['topic' => $current_topic])->with('status', 'Ваш ответ добавлен!');
        }
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
    public function edit($topic)
    {
        //
        $question = [];
        $result = Question::find($topic);
        $question['question'] = $result->question;
        $question['question_id'] = $topic;

        return view('site.answer', compact('question'));
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
