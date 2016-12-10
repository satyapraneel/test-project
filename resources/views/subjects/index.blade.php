@extends('layouts.master')
@section('title')
    <title>Add subject</title>
@endsection
@section('content')
<div class="container">
    <form action="{{url('/addSubject')}}" method="POST">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="_method" value="POST">
        <?php
        $subjects = [];
        $countOfSubjects = 1;
        if(session('subjects')):
           $subjects = session('subjects');
        endif;?>
        <div class="subject-section">
            <?php if(sizeof($subjects) > 0):
                foreach($subjects as $subject):?>
                    <div class="row <?php if($countOfSubjects != 1) echo 'remove-subject-div';?>">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-2">
                            @if($countOfSubjects == 1)
                                <label for="fibonacciInput">Enter Subjects:</label>
                            @endif
                        </div>
                        <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text"  class="form-control subject" value="{{$subject}}" name="subjects[]" required>
                                </div>
                            </div>
                        <div class="col-sm-5">
                            @if($countOfSubjects == 1)
                                <button class="add-subject btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> 
                                </button>
                            @else
                                <button class="remove-subject btn btn-primary">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            @endif
                        </div>
                    </div>
                    <?php $countOfSubjects++;
                endforeach;
            else:?>
                <div class="row">
                <div class="col-sm-1">
                    </div>
                    <div class="col-sm-2">
                        <label for="fibonacciInput">Enter Subjects:</label>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text"  class="form-control subject" value="" name="subjects[]" required>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <button class="add-subject btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </div>
                </div>
            <?php endif;?>
        </div>
        <hr/>
        <div class="row">
            <div class="col-sm-offset-3 col-sm-9">
                <input type="submit" class="btn btn-primary" value="Add Subjects"/>
            </div>
        </div>
    </form>
    @include('subjects.subject-template')
</div>
@endsection