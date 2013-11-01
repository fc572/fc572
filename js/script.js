/*	function externalFunc(){
		var modifyThis = "This text has been modified from a function inside the myScript.js file";
		document.getElementById('insertJsHere').innerHTML = modifyThis;
	}*/


$(document).ready(function(){

  $('#buttonJsToPress').click(function(){
    var modifyThis = "This text has been modified from a function inside the myScript.js file";
    $('#insertJsHere').text(modifyThis);
  });

});//document ready
