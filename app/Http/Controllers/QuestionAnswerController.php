<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreNewAnswerRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Question;

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
     * Сохранение новой редакции ответа.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewAnswerRequest $request)
    {
        $new_answer = Question::find($request->id);
        $new_answer->update(['answer' => $request->answer]);
        return redirect()->route('category.show', ['id' => $new_answer->topic_id])->with('status', "Ответ с id = $new_answer->id изменен!");
    }

    /**
     * Форма изменения редакции ответа.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $answer = Question::find($id);
        return view('site.change_answer',  compact('answer'));
    }

    /**
     * Форма изменения редакции вопроса и автора вопроса.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('site.change_question', compact('question'));
    }

    /**
     * Сохранение новой редакции вопроса и имени автора вопроса
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, $id)
    {
        $question = Question::find($id);
        $question->update(['question' => $request->question, 'author_question' => $request->author_question]);
        return redirect()->route('category.show', ['id' => $question->topic_id])->with('status', "Вопрос с id = $id изменен!");
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
