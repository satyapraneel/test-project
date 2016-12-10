<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        return view('subjects.index');
    }

	public function store(Request $request){
		if(!empty($request->get('subjects'))){
			$subjects = session(['subjects' => $request->get('subjects')]);
			return redirect()->back();
		}
	}
}
