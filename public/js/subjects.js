var Subjects = (function ($) {
    var addSubject = function(){
        $('body').on('click','.add-subject', function(event){
            event.preventDefault();
            var subjectSection = $('#subject-section');
            $(this).closest(".subject-section").append(subjectSection.html());
        });
    };

    var removeSubject = function(){
        $('body').on('click','.remove-subject', function(event){
            event.preventDefault();
            $(this).closest(".remove-subject-div").remove();
        });
    };


    var init = function(){
        addSubject();
        removeSubject();
    };

    return {
        init: init
    }
})(jQuery);