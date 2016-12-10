<?php

namespace App\Http\Controllers;

use App\Services\SortService\ISortService;
use Illuminate\Http\Request;

class SortController extends Controller
{
    //
    public function index(){
        return view('sort.index');
    }

    public function getResultForStudent(Request $request,ISortService $sortService){
		return $sortService->getSortedResult($request->all());
    }
}
