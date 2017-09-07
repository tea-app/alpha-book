/*global $, jQuery*/
(function ($) {
    'use strict';
    $("#search").click(function () {
        
        function requestStart(isbn) {
            var promise =  $.ajax({
                type: 'GET',
                url: 'https://www.googleapis.com/books/v1/volumes?q=isbn:' + isbn,
                dataType: 'json'
            });
//                hoge = $("#isbn").val();
//            window.console.log(hoge);
            promise.done(function (data) {
                $("#title").val(data.items[0].volumeInfo.title);
                $("#author").val(data.items[0].volumeInfo.authors);
                $("#thumbnail").val(data.items[0].volumeInfo.imageLinks.thumbnail);
//                window.console.log(promise);
            });
        }
        var isbn = $("#isbn").val();
        requestStart(isbn);
    });
}(jQuery));