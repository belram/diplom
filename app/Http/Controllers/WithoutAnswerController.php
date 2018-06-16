<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateQuestionAutorWithoutAnswerRequest;
use App\Question;
use App\Topic;

class WithoutAnswerController extends Controller
{
    /**
     * Блок просмотра всех вопросов без ответа.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Question::with('topic')->waitAnswer()->orderBy('created_at')->get();
        $topics = [];
        foreach ($data as $key => $question) {
            $topics[] = $question->topic->topic;
        }
        return view('site.without_answer', compact('data', 'topics'));
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
     * Форма для изменения вопроса и имени автора вопроса.
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
     * Сохранение новой редакции вопроса и(или) имени автора вопроса.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionAutorWithoutAnswerRequest $request, $id)
    {
        Question::find($id)->update([
            'question' => $request->question,
            'author_question' => $request->author_question
        ]);        
        return redirect()->route('withoutAnswer.index')->with('status', "Вопрос с id = $id изменен!");
    }

    /**
     * Удаление вопроса.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Question::find($id)->delete();
        return redirect()->route('withoutAnswer.index')->with('status', "Вопрос с id = $id удален!");
    }
}
