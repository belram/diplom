<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreNewAdminRequest;
use App\Http\Requests\UpdateAdminPasswordRequest;
use App\User;
use Auth;

class AdminController extends Controller
{
    /**
     * Отоброжение страницы управления администраторами
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth_admin = Auth::user()->id;
        $data = User::exceptAuthenticated($auth_admin)->get();
        return view('site.administrators', compact('data'));
    }

    /**
     * Форма добавления нового администратора.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('site.admin_add');
    }

    /**
     * Сохрание нового администратора.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewAdminRequest $request)
    {
        User::create([
              'name' => $request->name,
              'login' => $request->login,
              'email' => $request->email,
              'password' => Hash::make($request->password)
        ]);
        return redirect()->route('administrators.index')->with('status', 'Администратор добавлен!');
    }

    /**
     * Форма изменения пароля определенного администратора
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
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
     * Сохранение нового пороля для определенного администратора.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminPasswordRequest $request, $id)
    {
        User::find($id)->update(['password' => Hash::make($request->password)]);
        return redirect()->route('administrators.index')->with('status', 'Пароль изменен!');
    }

    /**
     * Удаление администратора.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('administrators.index')->with('status', "Администратор удален!");
    }
}
