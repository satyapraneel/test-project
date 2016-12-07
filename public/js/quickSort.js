var QuickSort = (function ($) {

    var getStudentResult = function(){
        $( "#quickSortForm" ).submit(function(event) {
            event.preventDefault();
            var request = {};
            var form = $(this);
            request.url = form.prop('action');
            request.data = form.serialize();
            request.type = form.prop('method');
            request.beforeSend = function () {

            };
            request.success = function (data) {
                $('#outputAreaForSortedStudent').html(data);
            };
            request.error = function () {

            };
            $.ajax(request);
        });
    };
    var addSubject = function(){
        $('body').on('click','.add-subject', function(event){
            event.preventDefault();
            var subjectMarksSection = $('#subject-mark-section');
            var id = $(this).closest(".subject-mark-section").find('.subject').data('id');
            var subjectId = 'subject['+id+'][]';
            var marksId = 'marks['+id+'][]';
            subjectMarksSection.find('.subject').attr('name', subjectId).attr('data-id',id);
            subjectMarksSection.find('.marks').attr('name', marksId).attr('data-id',id);
            $(this).closest(".subject-mark-section").append(subjectMarksSection.html());
        });
    };

    var removeSubject = function(){
         $('body').on('click','.remove-subject', function(event){
             event.preventDefault();
             $(this).closest(".remove-subject-div").remove();
         });
     };

    var addStudent = function(){
        $('body').on('click','.add-student', function(event){
            var id = $('.quickSortFormContent .studentName').last().data('id') + 1;
            var studentName = 'name['+id+']';
            var studentMarks = 'marks['+id+'][]';
            var studentSubject = 'subject['+id+'][]';

            var studentSection = $('#student-section');
            studentSection.find('.studentName').attr('name', studentName).attr('data-id',id);
            studentSection.find('.marks').attr('name', studentMarks).attr('data-id',id);
            studentSection.find('.subject').attr('name', studentSubject).attr('data-id',id);
            event.preventDefault();
            $(".quickSortFormContent").append(studentSection.html());
        });
    };

    var removeStudent = function(){
        $('body').on('click','.remove-student', function(event){
            event.preventDefault();
            $(this).closest(".remove-student-div").remove();
        });
    };
    var init = function(){
        addSubject();
        removeSubject();
        addStudent();
        removeStudent();
        getStudentResult();
    };

    return {
        init: init
    }
})(jQuery);