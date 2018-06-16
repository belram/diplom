<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreNewQuestionRequest;
use App\Question;
use App\Topic;

class IndexController extends Controller
{

    /**
     * Отоброжение заглавной страницы сайта
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics_id = Question::with('topic')->published()->distinct()->get(['topic_id']);
        $topics = [];
        foreach ($topics_id as $key => $value) {
            $topics[] = $value->topic;
        }
        $questions = [];
        $temp = Question::published()->get();
        foreach ($topics as $topic) {
            foreach ($temp as $question) {
                if ($topic->id == $question->topic_id) {
                    $questions[$topic->alias][] = $question;
                }    
            }   
        }
        return view('site.index', compact('topics', 'questions'));
    }

    /**
     * Форма для добавления вопроса
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::get();
        return view('site.add_question', compact('topics'));
    }

    /**
     *Сохранение нового вопроса
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewQuestionRequest $request)
    {
        Question::create([
                'question' => $request->question,
                'author_question' => $request->name,
                'author_email' => $request->email,
                'topic_id' => $request->topic_id
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