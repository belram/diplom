<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreNewTopicRequest;
use App\Http\Requests\UpdateTopicNameRequest;
use App\Question;
use App\Topic;

class TopicsController extends Controller
{
    /**
     * Гдавная страница управления темами. Изменение названия тем, добавление новой темы,
     * удаление темы и всех вопросов в ней
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::withCount([
            'questions', 
            'questions as wait_questions_count' => function ($query) {
                $query->where('status_id', 1);
            },
            'questions as published_questions_count' => function ($query) {
                $query->where('status_id', 2);
            },
            'questions as hidden_questions_count' => function ($query) {
                $query->where('status_id', 3);
            }
        ])->get();
        $data = [];
        foreach ($topics as $key => $topic) {
            $data[$topic->topic]['wait'] = $topic->wait_questions_count;
            $data[$topic->topic]['published'] = $topic->published_questions_count;
            $data[$topic->topic]['hidden'] = $topic->hidden_questions_count;
            $data[$topic->topic]['total'] = $topic->questions_count;
            $data[$topic->topic]['id'] = $topic->id;
        }
        return view('site.topics', compact('data'));
    }

    /**
     * Отображение формы добавления новой темы
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.topics_add');
    }

    /**
     * Сохранение новой темы
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewTopicRequest $request)
    {
        Topic::create(['topic' => $request->topic, 'alias' => mb_strtolower($request->topic)]);
        return redirect()->route('changes.index')->with('status', "Новая тема $request->topic добавлена!");
    }

    /**
     * Форма изенения названия темы.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $topic = Topic::find($id);
        return view('site.topics_change_name', compact('topic'));
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
     * Сохранение нового названия для ранее существовавшей темы.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicNameRequest $request, $id)
    {
        Topic::find($id)->update(['topic' => $request->topic, 'alias' => mb_strtolower($request->topic)]);
        return redirect()->route('changes.index')->with('status', 'Название темы обновлено!');
    }

    /**
     * Удаление темы и всех вопросов в ней.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::sameTopicId($id)->delete();
        Topic::find($id)->delete();
        return redirect()->route('changes.index')->with('status', "Тема c id = $id удалена!");
    }
}
