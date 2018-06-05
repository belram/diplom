<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;
use App\Topic;
use DB;
use Validator;

class WithoutAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('topics')->leftJoin('questions', 'topics.id', '=', 'questions.topic_id')
            ->where([['answer', NULL], ['question', '!=', NULL]])
            ->orderBy('question_created_at')
            ->get(['questions.id','topic', 'question', 'question_created_at']);

        return view('site.without_answer', compact('data'));
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
        $question = Question::find($id);
        return view('site.correct_question', compact('question'));
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
        $temp = $request->except('_method', '_token', 'save');
        $messages = [
            'required'=>'Поле :attribute обязательно к заполнению',
            'maX'=>'Значение поля :attribute должно быть меннее 150 символов'
        ];
        $validator = Validator::make($temp, [
            'question' => 'required',
            'author_question' => 'required|max:150'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->route('withoutAnswer.show', ['id' => $id])->withErrors($validator);
        }
        $new_question = Question::find($id)->update($temp);        
        return redirect()->route('withoutAnswer.index')->with('status', "Вопрос с id = $id изменен!");
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
        $result = Question::find($id)->delete();
        return redirect()->route('withoutAnswer.index')->with('status', "Вопрос с id = $id удален!");
    }
}
