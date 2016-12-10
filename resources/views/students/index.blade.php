@extends('layouts.master')
@section('title')
    <title>Add student and marks</title>
@endsection
@section('content')
	<div class="container">
		@if(session('subjects'))
		<?php $subjects = session('subjects');?>
			<form action="{{url('/getResultForStudent')}}" method="POST" id="studentResultForm">
	        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	        <input type="hidden" name="_method" value="POST">
	        <div class="student-section container">
	            <div class="row">
	                <div class="col-sm-3">
		                <div class="form-group">
		                    <label>Student Name:</label>
		                    <input type="text" class="form-control student" data-id=0 value="" name="name[0]" required>
		                </div>
	                </div>
	                <div class="col-sm-6 student-marks-section">
	                	<div class="col-sm-6">
		                	<div class="form-group">
			                    <label>Subject:</label>
			                </div>
	                	</div>
	                	<div class="col-sm-6">
	                		<div class="form-group">
			                    <label>Marks:</label>
			                </div>
	                	</div>
		                @foreach($subjects as $subject)
		                	<div class="col-sm-6">
			                    <div class="form-group">
			                        <input type="text" class="form-control subjects {{$subject}}" value="{{$subject}}"  data-subject="{{$subject}}" readonly/>
			                    </div>
		                    </div>
		                    <div class="col-sm-6">
			                    <div class="form-group">
			                        <input type="number" min="0" max="100" class="form-control marks {{$subject}}" value="" name="marks[0][{{$subject}}]" required/>
			                    </div>
		                    </div>
		                @endforeach
	                </div>
	                <div class="col-sm-offset-1 col-sm-2">
	                    <button class="add-student btn btn-primary">
	                        <span class="glyphicon glyphicon-plus"></span> 
	                    </button>
	                </div>
	            </div>
	        </div>
	    <hr/>
	    <label class="radio-inline">Choose Sort on :</label>
	    @foreach($subjects as $subject)
		  	<label class="radio-inline"><input type="radio" value="{{$subject}}" name="sortField" required>{{$subject}}</label>
	    @endforeach
	  	<label class="radio-inline"><input type="radio" value="total" name="sortField" required>Total</label>
	  	<hr/>
	  	<label class="radio-inline">Choose Algorithm to Sort :</label>
	  	<label class="radio-inline"><input type="radio" value="quickSort" name="algorithmToSort" required>Quick Sort</label>
	  	<label class="radio-inline"><input type="radio" value="mergeSort" name="algorithmToSort" required>Merge Sort</label>
	  	<label class="radio-inline"><input type="radio" value="selectionSort" name="algorithmToSort" required>Selection Sort</label>
	  	<label class="radio-inline"><input type="radio" value="heapSort" name="algorithmToSort" required>Heapsort</label>
	  	<hr/>
	  	<label class="radio-inline"> Select an order to sort  </label>
	  	<label class="radio-inline"><input type="radio" value="ascending" name="sortOrder" required>Ascending</label>
	  	<label class="radio-inline"><input type="radio" value="descending" name="sortOrder" required>Descending</label>
	  	<hr/>
	    <div class="row">
	        <div class="col-sm-offset-5 col-sm-3">
	            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Get Result"/>
	        </div>
	    </div>
	    </form>
		@include('students.student-template')
		@else
			<div class="row">
				<div class="col-md-12">
					<h1>Please add the subject before adding the students</h1>
				</div>
			</div>
	@endif
	<div class="col-sm-12">
		<div id="outputAreaForStudent">

		</div>
	</div>
@endsection