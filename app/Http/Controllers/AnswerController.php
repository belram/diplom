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
        $temp = $request->except('_token', 'id');
        $messages = [
            'required'=>'Поле :attribute обязательно к заполнению'
        ];
        $validator = Validator::make($temp, [
            'answer' => 'required'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->route('answer.edit', ['topic' =>  $request->id])->withErrors($validator)->withInput();
        }
        $temp['status_id'] = ($temp['status'] == 'Save and hide') ? 3 : 2;
        $temp['answer_created_at'] = date('Y-m-d H:i:s');
        $new_answer = Question::find($request->id);
        $new_answer->update($temp);
        return redirect()->route('category.show', ['topic' => $new_answer->topic_id])->with('status', 'Ваш ответ добавлен!');
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
        $question = Question::find($id);
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
