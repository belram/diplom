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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::get(['id','topic', 'alias']);
        $data = [];
        $i = 1;

        foreach ($topics as $value) {
            $data[$value->topic]['alias'] = $value->alias;
            $data[$value->topic]['wait'] = Question::sameTopicId($value->id)->waitAnswer()->count();
            $data[$value->topic]['published'] = Question::sameTopicId($value->id)->published()->count();
            $data[$value->topic]['hidden'] = Question::sameTopicId($value->id)->hidden()->count();
            $data[$value->topic]['total'] = Question::sameTopicId($value->id)->totalCount()->count();
            $data[$value->topic]['i'] = $i++;
            $data[$value->topic]['id'] = $value->id;
        }
        return view('site.topics', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('site.topics_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewTopicRequest $request)
    {
        $validated = $request->validated();
        $validated['alias'] = mb_strtolower($validated['topic']);
        Topic::create($validated);
        return redirect()->route('changes.index')->with('status', "Новая тема $request->topic добавлена!");
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicNameRequest $request, $id)
    {
        $validated = $request->validated();
        Topic::find($id)->update(['topic' => $validated['topic'], 'alias' => mb_strtolower($validated['topic'])]);
        return redirect()->route('changes.index')->with('status', 'Название темы обновлено!');
    }

    /**
     * Remove the specified resource from storage.
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
