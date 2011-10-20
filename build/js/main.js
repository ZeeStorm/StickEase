$(function() {
	$('input:text, input:checkbox, select, textarea').uniform();
	
	$('input:text').focus(function() {
		$(this).addClass('active');
	}).blur(function() {
		$(this).removeClass('active');
	});
	
	if ($('#board').length) {
		var borderWidth = 4,
			$content = $('#content'),
			footerHeight = $('#footer_wrapper'),
			$winHeightUpd = $('#sticky_board, #sticky_board > li'),
			$divHeightUpd = $('#sticky_board > li > div'),
			$liWidthUpd = $('#sticky_board > li'),
			updateBoard = function() {
				var headerHeight = $('#header_wrapper').outerHeight(),
					winHeight = (($(window).height() - headerHeight) - footerHeight),
					divHeight = ((winHeight - $('#sticky_board h2:first').outerHeight(true)) - 16),
					liWidth = Math.floor(($(window).width() - borderWidth) / 3);
				
				$content.height(winHeight);
				$content.css('top', headerHeight + 'px');
				$winHeightUpd.height(winHeight);
				$divHeightUpd.height(divHeight).children('ul').css('min-height', divHeight + 'px');
				$liWidthUpd.width(liWidth).last().width(($(window).width() - borderWidth) - (liWidth * 2));
			};
		
		$(window).resize(updateBoard);
		updateBoard();
		
		$('#board').delegate('.sticky ul.priority li', 'click', function() {
			var $this = $(this),
				$sticky = $this.closest('.sticky');
			
			if (!$sticky.hasClass($this.attr('class'))) {
				$sticky.removeClass('high med low').addClass($this.attr('class'));
			}
		});
		
		$('#board').delegate('.sticky div.front button.flip', 'click', function() {
			$(this).closest('.qf').quickFlipper();
		}).delegate('.sticky div.back button.done', 'click', function() {
			$(this).closest('.qf').quickFlipper();
		}).delegate('.sticky', 'mouseenter', function() {
			$(this).addClass('hover');
		}).delegate('.sticky', 'mouseleave', function() {
			$(this).removeClass('hover');
		});
	}
});