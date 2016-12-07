@extends('layouts.master')
@section('title')
    <title>Quick sort</title>
@endsection
@section('content')
    <div class="container">
        <h1 class="text-center">Quick Sort </h1>
        <?php $i = 0;?>
        <form action="{{url('/getSortedResult')}}" method="POST" id="quickSortForm">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="POST">
            <div class="quickSortFormContent" >
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Enter a Name:</label>
                            <input type="text" class="form-control studentName" data-id="<?php echo $i;?>"  name="name[<?php echo $i;?>]"  required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="subject-mark-section">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Select a Subject:</label>
                                        <select class="form-control subject" data-id="<?php echo $i;?>" name="subject[<?php echo $i;?>][]" required>
                                            <option value="english">English</option>
                                            <option value="maths">Maths</option>
                                            <option value="physics">Physics</option>
                                            <option value="chemistry">Chemistry</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="fibonacciInput">Enter marks:</label>
                                        <input type="number" min="0" max="100" class="form-control marks" data-id="<?php echo $i;?>" name="marks[<?php echo $i;?>][]" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <br/>
                                    <button class="add-subject btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> Add Subject
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button class="add-student btn-primary btn">
                        <span class="glyphicon glyphicon-plus "></span> Add Student
                        </button>
                    </div>
                </div>
            </div>
            <hr/>
            <input type="submit" class="btn btn-primary" value="Get Result"/>
        </form>
        <hr/>
        <div class="row">
            <div class="col-md-12" id="outputAreaForSortedStudent">

            </div>
        </div>
    </div>

    <div id="subject-mark-section"  class="hidden">
        <div class="row remove-subject-div">
            <div class="col-sm-4">
                <div class="form-group">
                    <select class="form-control subject add-subject-index"  required>
                        <option value="english">English</option>
                        <option value="maths">Maths</option>
                        <option value="physics">Physics</option>
                        <option value="chemistry">Chemistry</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="number" class="form-control marks add-marks-index"  min="0" max="100" required>
                </div>
            </div>
            <div class="col-sm-4">
                <button class="remove-subject btn btn-primary">
                    <span class="glyphicon glyphicon-minus "></span> Remove subject
                </button>
            </div>
        </div>
    </div>

    <div id="student-section" class="hidden">
        <div class="row remove-student-div">
        <hr/>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Enter a Name:</label>
                    <input type="text" class="form-control studentName">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="subject-mark-section">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Enter a Subject:</label>
                                <select class="form-control subject"  required>
                                    <option value="english">English</option>
                                    <option value="maths">Maths</option>
                                    <option value="physics">Physics</option>
                                    <option value="chemistry">Chemistry</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="fibonacciInput">Enter marks:</label>
                                <input type="number" class="form-control marks" min="0" max="100" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <br/>
                            <button class=" add-subject btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span> Add Subject
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <button class="remove-student btn btn-primary">
                <span class="glyphicon glyphicon-minus "></span> Remove Student
                </button>
            </div>
        </div>
    </div>
@endsection