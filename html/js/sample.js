/*global $, ajax*/
(function ($) {
    'use strict';
    $.ajax({
        url: 'https://www.googleapis.com/books/v1/volumes?q=isbn:9784774146430',
        success: function (json) {

			var htmlcontent = "",
                i = 0;
			for (i = 0; i < json.items.length; i += 1) {
                htmlcontent += "<li>Title: " + json.items[i].volumeInfo.title + "&nbsp Author: " + json.items[i].volumeInfo.authors[0] + "<br>";
            }
			document.getElementById("books").innerHTML = "<ul>" + htmlcontent + "</ul><br>";
  
		
       
		}
  
    });
}());

