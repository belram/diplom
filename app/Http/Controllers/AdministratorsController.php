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












		if (view()->exists('site.administrators')) {

    		$data = User::all()->toArray();

    		return view('site.administrators', ['data' => $data]);

		} else {

			abort(404);

		}



	}



}
