<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use Auth;
use Validator;
use DB;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $auth_admin = Auth::user()->id;

        $data = User::where('id', '!=',  $auth_admin)->get()->toArray();

        //dd($data);

        return view('site.administrators', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('site.admin_add');
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
        $data = $request->except('_token');

        $messages = [
            'required'=>'Поле :attribute обязательно к заполнению',
            'email'=>'Поле :attribute должно соответствовать email адресу',
            'max'=>'Значение поля :attribute должно быть меннее 255 символов',
            'min'=>'Значение поля :attribute должно быть более 5 символов'
        ];

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'login' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:5'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('formAddAdmin')->withErrors($validator);
        }

        User::create([
        'name' => $data['name'],
        'login' => $data['login'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
        ]);

        return redirect()->route('admins')->with('status', 'Администратор добавлен!');
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
        $result = User::find($id);
        $data = [];
        $data['id'] = $id;
        $data['login'] = $result->login;

        return view('site.admin_change_password', compact('data'));
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
        $data = $request->except('_token');

        $messages = [
            'required'=>'Поле :attribute обязательно к заполнению',
            'min'=>'Значение поля :attribute должно быть более 5 символов'
        ];

        $validator = Validator::make($data, [
            'password' => 'required|min:5'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('formChangePassword', ['id' => $id])->withErrors($validator);
        }

        $admin = User::find($id);

        $admin->password = Hash::make($data['password']);

        if ($admin->save()) {
            return redirect()->route('admins')->with('status', 'Пароль изменен!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = User::find($id)->delete();

        if ($result) {
            return redirect()->route('admins')->with('status', "Администратор удален!");
        }
    }
}
