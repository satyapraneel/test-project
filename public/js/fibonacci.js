var Fibonacci = (function ($) {

    var getDiamond = function(){
        $( "#fibonacciForm" ).submit(function(event) {
            event.preventDefault();
            var request = {};
            var form = $(this);
            request.url = form.prop('action');
            request.data = form.serialize();
            request.type = form.prop('method');
            request.beforeSend = function () {

            };
            request.success = function (data) {
                $('#outputAreaForFibonacci').html(data);
            };
            request.error = function () {

            };
            $.ajax(request);
        });
    };
    var init = function(){
        getDiamond();
    };

    return {
        init: init
    }
})(jQuery);