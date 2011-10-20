$(function() {
	$('input:text, input:checkbox, select, textarea').uniform();
	
	$('input:text').focus(function() {
		$(this).addClass('active');
	}).blur(function() {
		$(this).removeClass('active');
	});
});