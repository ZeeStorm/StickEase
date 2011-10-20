$(function() {
	$('input:text, input:checkbox').uniform();
	
	$('input:text').focus(function() {
		$(this).addClass('active');
	}).blur(function() {
		$(this).removeClass('active');
	});
	
	if ($('#board').length) {
		var $winHeightUpd = $('#content, #sticky_board, #sticky_board > li'),
			$divHeightUpd = $('#sticky_board > li > div'),
			$liWidthUpd = $('#sticky_board > li'),
			updateBoard = function() {
				var winHeight = ($(window).height() - 93),
					divHeight = ((winHeight - $('#sticky_board h2:first').outerHeight(true)) - 16),
					liWidth = Math.floor(($(window).width() - 2) / 3);
				
				$winHeightUpd.height(winHeight);
				$divHeightUpd.height(divHeight).children('ul').css('min-height', divHeight + 'px');
				$liWidthUpd.width(liWidth).last().width(($(window).width() - 2) - (liWidth * 2));
			};
		
		$(window).resize(updateBoard);
		updateBoard();
	}
});