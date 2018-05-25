<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use DB;

class AdministratorsController extends Controller
{
    //

	public function execute()
	{

		$data = User::all()->toArray();

		return view('site.administrators', compact('data'));

	}



}
