<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use Validator;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $titles = Question::where([['question','!=', NULL], ['answer','!=', NULL], ['status', 2]])->distinct()->get(['alias'])->toArray();

        $pages = [];

        foreach ($titles as $value) {
            $pages[] = $value['alias'];
        }

        $data = [];

        foreach ($pages as $value) {
            $data[$value] = Question::where([['alias', "$value"], ['status', 2]])
                ->get(['topic' ,'alias', 'question', 'answer'])->toArray();
        }

        return view('site.index', compact('pages', 'data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $result = Question::distinct()->get(['topic'])->toArray();
        $topics = [];

        foreach ($result as $value) {
            $topics[] = $value['topic'];
        }

        return view('site.add_question', compact('topics'));
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
            $messages = [
                'required'=>'Поле :attribute обязательно к заполнению',
                'email'=>'Поле :attribute должно соответствовать email адресу',
                'maX'=>'Значение поля :attribute должно быть меннее 255 символов'
            ];

            $data = $request->except('_token', 'save');
            $validator = Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'topic' => 'required',
                'question' => 'required'
            ], $messages);

            if ($validator->fails()) {
                return redirect()->route('add_question')->withErrors($validator)->withInput();
            }

            if ($empty_place = Question::where([['topic', $data['topic']], ['question', NULL]])->first()) {
                $empty_place->question = $data['question'];
                $empty_place->author_question = $data['name'];
                $empty_place->author_email = $data['email'];
                $empty_place->status = 1;
                $empty_place->question_created_at = date('Y-m-d H:i:s');

                if ($empty_place->save()) {
                    return redirect()->route('index')->with('status', 'Ваш вопрос добавлен!');
                }

            } else {

                Question::create([
                        'topic' => $data['topic'],
                        'alias' => mb_strtolower($data['topic']),
                        'question' => $data['question'],
                        'author_question' => $data['name'],
                        'author_email' => $data['email'],
                        'question_created_at' => date('Y-m-d H:i:s'),
                        'status' => 1
                        ]);

                return redirect()->route('index')->with('status', 'Ваш вопрос добавлен!');
            }
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
