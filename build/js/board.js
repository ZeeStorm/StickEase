$(function() {
	// since everything is very dynamic, instead of relying on hardcoded values, pre-emp all of this
	// we store as many references as we can to speed up the resize() function
	var isMobile = true,
		borderWidth = 4,
		jspUpdateTimer,
		$content = $('#content'),
		$stickyBoard = $('#sticky_board'),
		h2height = $('h2:first', $stickyBoard).outerHeight(true),
		footerHeight = $('#footer_wrapper').outerHeight(true),
		$headerWrapper = $('#header_wrapper'),
		$stickyBoardItems = $stickyBoard.children('li'),
		$stickyBoardLastItem = $stickyBoardItems.last(),
		//$divHeightUpd = $('#sticky_board > li > div'),
		$stickyBoardItemsJsp = $stickyBoardItems.children('div'),
		initBoard = function() { // this duplicates some of the functionality 
			updateBoard();
			
			if (isMobile) {
				$stickyBoardItemsJsp.jScrollPane({'showArrows':true});
			}
		},
		updateBoard = function() {
			var $window = $(window),
				headerHeight = $headerWrapper.outerHeight(),
				winHeight = (($window.height() - headerHeight) - footerHeight),
				liWidth = Math.floor(($window.width() - borderWidth) / 3);
			
			$content.height(winHeight).css('top', headerHeight + 'px');
			$stickyBoard.height(winHeight);
			$stickyBoardItems.height(winHeight).width(liWidth);
			$stickyBoardLastItem.width(($window.width() - borderWidth) - (liWidth * 2));
			$stickyBoardItemsJsp.width(liWidth).height(winHeight - h2height);
		};
	
	initBoard();
	$(window).resize(updateBoard);
	
	if (isMobile) {
		$(window).resize(function() {
			jspUpdateTimer = setTimeout(function() {
				$stickyBoardItemsJsp.each(function() {
					$(this).data('jsp').reinitialise();
				});
				
				jspUpdateTimer = null;
			}, 100);
		});
	}
	
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
	}).delegate('.sticky, .user', 'mouseenter', function() {
		$(this).addClass('hover');
	}).delegate('.sticky, .user', 'mouseleave', function() {
		$(this).removeClass('hover');
	});
});