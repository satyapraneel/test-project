<?php

namespace App\Http\Controllers;

use App\Services\Fibonacci\IFibonacci;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class FibonacciController extends BaseController
{
    public function index(){
        return view('fibonacci.index');
    }

    public function showFibonacciSeries(Request $request,IFibonacci $fibonacci){
        return $fibonacci->createFibonacciSeries($request->get('fibonacciInput'));
    }
}
