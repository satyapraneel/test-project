@extends('layouts.master')
@section('content')
    <div class="jumbotron text-center">
        <h1>Fibonacci </h1>
        <form action="{{url('/getFibonacci')}}" method="get" id="fibonacciForm">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="form-group">
                        <label for="fibonacciInput">Enter a Number:</label>
                        <input type="text" class="form-control" id="fibonacciInput" name="fibonacciInput">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Get Diamond"/>
                </div>
            </div>
        </form>
        <hr/>
        <div class="row">
            <div class="col-md-12" id="outputAreaForFibonacci">

            </div>
        </div>
    </div>

@endsection