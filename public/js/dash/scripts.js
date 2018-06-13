$(document).ready(function() {
    
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
  
});


/* $(function () {
 $('#datetimepicker4').datetimepicker();
 });*/


 	$('#datetimepicker4').on('mouseenter', function(e) {
		$('#datetimepicker4').datetimepicker();
	});