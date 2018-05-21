<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;

class IndexController extends Controller
{
    //

    public function execute(Request $request)
    {

    	$titles = Question::where([['question','!=', NULL], ['answer','!=', NULL], ['status', 2]])->distinct()->get(['alias'])->toArray();

    	$pages = [];

    	foreach ($titles as $value) {
    		$pages[] = $value['alias'];
    	}

    	$data = [];

    	foreach ($pages as $value) {
    		$data[$value] = Question::where([['alias', "$value"], ['status', 2]])->get(['topic' ,'alias', 'question', 'answer'])->toArray();
    	}

    	return view('site.index', ['pages'=>$pages, 'data'=>$data]);
    }
}
