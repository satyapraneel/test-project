var Students = (function ($) {
    var getStudentResult = function(){
        $( "#studentResultForm" ).submit(function(event) {
            event.preventDefault();
            var request = {};
            var form = $(this);
            request.url = form.prop('action');
            request.data = form.serialize();
            request.type = form.prop('method');
            request.beforeSend = function () {

            };
            request.success = function (data) {
                $('#outputAreaForStudent').html(data);
            };
            request.error = function () {

            };
            $.ajax(request);
        });
    };

    var addStudent = function(){
        $('body').on('click','.add-student', function(event){
            event.preventDefault();
            //Section where all the students are added
            var id = $('.student-section .student').last().data('id') + 1;
            //create the name array by giving last id to it
            var studentName = 'name['+id+']';
            //student-section contains the template
            var studentSection = $('#student-section-template');
            //Loop all the subject and give the proper name for newly created student
            $(".student-marks-section .subjects").each(function() {
                var subjectName = $(this).data('subject');
                var studentMarks = 'marks['+id+']['+subjectName+']';
                studentSection.find('.'+subjectName).attr('name', studentMarks).attr('data-id',id);
            });
            studentSection.find('.student').attr('name', studentName).attr('data-id',id);
            //append student-section-template to .student-section
            $(this).closest(".student-section").append(studentSection.html());
        });
    };

    var removeStudent = function(){
        $('body').on('click','.remove-student', function(event){
            event.preventDefault();
            $(this).closest(".remove-student-div").remove();
        });
    };


    var init = function(){
        addStudent();
        removeStudent();
        getStudentResult();
    };

    return {
        init: init
    };
})(jQuery);