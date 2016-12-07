<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuickSortController extends Controller
{
    public function index(){
        return view('quicksort.index');
    }

    public function showSortedMarks(Request $request){

    }
}
