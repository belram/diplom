<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreNewTopicForQuestionRequest;
use App\Question;
use App\Topic;
use App\Status;

class TopicCategoryController extends Controller
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
     * Сохранение изменения темы для вопроса
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewTopicForQuestionRequest $request)
    {
        Question::find($request->question_id)->update(['topic_id' => $request->topic]);
        return redirect()->route('category.show', ['id' => $request->lastTopic])->with('status', 'Тема вопроса изменена!');
    }

    /**
     * Отоброжение страницы управления информацией по определенной теме.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = Question::with('topic', 'status')->sameTopicId($id)->get();
        $topic;
        $statuses = [];
        if (count($questions) > 0) {
            $topic = $questions[0]->topic->topic;
            foreach ($questions as $question) {
                $statuses[] = $question->status->status;
            }
        }
        return view('site.category', compact('questions', 'topic', 'statuses'));
    }

    /**
     * Форма для изменения темы для вопроса
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topics = Topic::get(['id','topic']);
        $question = Question::find($id);
        return view('site.change_topic', compact('topics', 'question'));
    }

    /**
     *Действие по изменению статуса - публикуем или скрываем вопрос.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        $question->update(['status_id' => ($request->action == 'Hide') ? 3 : 2]);
        return redirect()->route('category.show', ['topic' => $request->topic])->with('status', "Статус вопроса с id = $id изменен!");
    }

    /**
     * Удаление вопроса.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        Question::find($id)->delete();
        return redirect()->route('category.show', ['id'=>$request->topic])->with('status', "Вопрос удален!");
    }
}
