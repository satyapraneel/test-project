<div id="student-section-template" class="hidden">
    <div class="row remove-student-div">
        <hr/>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Student Name:</label>
                <input type="text" class="form-control student"   required>
            </div>
        </div>
        <div class="col-sm-6">
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
                        <input type="text" class="form-control subjects {{$subject}}" value="{{$subject}}"  readonly/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="number" min="0" max="100" class="form-control marks {{$subject}}"  data-subject={{$subject}}  required/>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-sm-offset-1 col-sm-2">
            <button class="remove-student btn btn-primary">
                <span class="glyphicon glyphicon-minus"></span> 
            </button>
        </div>
    </div>
</div>