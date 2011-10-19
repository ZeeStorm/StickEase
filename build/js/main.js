$(function() {
	$('input:text, input:checkbox').uniform();
	
	$('input:text').focus(function() {
		$(this).addClass('active');
	}).blur(function() {
		$(this).removeClass('active');
	});
	
	if ($('#board').length) {
		$(window).resize(function() {
			$('#content');			
		});
	}
});