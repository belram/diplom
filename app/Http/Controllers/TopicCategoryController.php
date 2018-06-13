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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewTopicForQuestionRequest $request)
    {
        $validated = $request->validated();
        Question::find($validated['question_id'])->update(['topic_id' => $validated['topic']]);
        
        return redirect()->route('category.show', ['id' => $validated['lastTopic']])->with('status', 'Тема вопроса изменена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = Question::with('topic', 'status')->sameTopicId($id)->get();
        $topic = null;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $topics = Topic::get(['id','topic']);
        $question = Question::find($id);
        return view('site.change_topic', compact('topics', 'question'));
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
        $temp = $request->except('_token');
        $question = Question::find($id);
        if ($temp['action'] == 'Hide') {
            $question->update(['status_id' => 3]);
            return redirect()->route('category.show', ['topic'=>$temp['topic']])->with('status', "Вопрос с id = $id скрыт!");
        }
        if ($temp['action'] == 'Public') {
            $question->update(['status_id' => 2]);
            return redirect()->route('category.show', ['topic'=>$temp['topic']])->with('status', "Вопрос с id = $id опубликован!");
        }
    }

    /**
     * Remove the specified resource from storage.
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
