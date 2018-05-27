<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use Validator;

class QuestionAnswerController extends Controller
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
            'answer' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('formChangeAnswer', ['topic' => $temp['topic']])->withErrors($validator);
        }

        $new_answer = Question::find($temp['topic']);

        $current_topic = $new_answer->topic;

        $new_answer->answer = $temp['answer'];

        if ($new_answer->save()) {
            return redirect()->route('category', ['topic' => $current_topic])->with('status', "Ответ с id = {$temp['topic']} изменен!");
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
        $answer = [];
        $result = Question::find($topic); 
        $answer['answer'] = $result->answer;
        $lastTopic = $result->topic;
        $answer['answer_id'] = $topic;

        return view('site.change_answer',  compact('answer', 'lastTopic'));

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
        $question['author'] = $result->author_question;

        $lastTopic = $result->topic;
        $question['question_id'] = $topic;

        return view('site.change_question', compact('question', 'lastTopic'));
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
        $temp = $request->except('_token', 'save');

        $messages = [
            'required'=>'Поле :attribute обязательно к заполнению',
            'maX'=>'Значение поля :attribute должно быть меннее 255 символов'
        ];

        $validator = Validator::make($temp, [
            'question' => 'required',
            'author_name' => 'required|max:255'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('formChangeQuestion', ['topic' => $topic ])->withErrors($validator);
        }

        $new_question = Question::find($topic);

        $current_topic = $new_question->topic;

        $new_question->question = $temp['question'];
        $new_question->author_question = $temp['author_name'];

        if ($new_question->save()) {
            return redirect()->route('category', ['topic' => $current_topic])->with('status', "Вопрос с id = $topic изменен!");
        } 
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
