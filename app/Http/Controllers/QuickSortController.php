<?php

namespace App\Http\Controllers;

use App\Services\QuickSort\IQuickSort;
use Illuminate\Http\Request;

class QuickSortController extends Controller
{
    public function index(){
        return view('quicksort.index');
    }

    public function showSortedMarks(Request $request,IQuickSort $quickSort){
        $sortedResult = $quickSort->getSortedResult($request->all());
        return view('quicksort.sortedresult')->with('sortedResults',$sortedResult);
    }
}
