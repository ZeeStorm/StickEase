$(function() {
	if ($.support.touch) {
		$('body').addClass('touch');
	} else {
		$('body').addClass('desktop');
	}
	
	// since everything is very dynamic, instead of relying on hardcoded values, pre-emp all of this
	// we store as many references as we can to speed up the resize() function
	var borderWidth = 4,
		jspUpdateTimer,
		$content = $('#content'),
		$stickyBoard = $('#sticky_board'),
		h2height = $('h2:first', $stickyBoard).outerHeight(true),
		footerHeight = $('#footer_wrapper').outerHeight(true),
		$headerWrapper = $('#header_wrapper'),
		$stickyBoardItems = $stickyBoard.children('li'),
		$stickyBoardLastItem = $stickyBoardItems.last(),
		$stickyBoardItemsDiv = $stickyBoardItems.children('div'),
		initBoard = function() {
			if (!$.support.touch) {
				updateBoard();
			}
			
			// prep our not started and assigned to (sticky lists)
			$('#notstarted .sticky_list, #assignedto .sticky_list', $stickyBoard).sticky_sort();
			
			// prep our completed board, it doesn't change like the others can
			$('#completed', $stickyBoard).board_droppable();
			
			$('#sticky_board').disableSelection();
			
			// prep our user list items
			$('.user_list > li.user', $stickyBoard).user_droppable();
			
			// get every single sticky thats on the board prepped
			$stickyBoard.sticky();
			/*
			if ($) {
				$stickyBoardItemsJsp.jScrollPane({'showArrows':true});
			}
			*/
		},
		updateBoard = function() {
			var $window = $(window),
				headerHeight = $headerWrapper.outerHeight(),
				winHeight = ($window.height() - headerHeight - footerHeight),
				liWidth = Math.floor(($window.width() - borderWidth) / 3),
				colHeight = [];
			
			if (!$.support.touch) {
				$content.height(winHeight).css('top', headerHeight + 'px');
				$stickyBoard.height(winHeight);
				$stickyBoardItems.height(winHeight);
				$stickyBoardItemsDiv.height(winHeight - h2height);
			} else {
				$content.css('min-height', winHeight + 'px');
				$stickyBoard.css('min-height', winHeight + 'px');
				$stickyBoardItems.css('min-height', winHeight +'px');
				$stickyBoardItemsDiv.css('min-height', (winHeight - h2height) + 'px');
				
				$('ul.sticky_list.active, ul.user_list.active', $stickyBoardItems).each(function() {
					colHeight.push($(this).height());
				}).height(Math.max.apply(this, colHeight));
			}
			
			$stickyBoardItems.width(liWidth);
			$stickyBoardLastItem.width(($window.width() - borderWidth) - (liWidth * 2));
			$stickyBoardItemsDiv.width(liWidth);
		};
	
	$.fn.sticky = function() {
		return $(this).each(function() {
			$('ul.priority li', $(this)).tooltip({
				'effect': 'fade',
				'offset': [-3,0]
			});
		});
	};
	
	// jquery function since users can be added
	$.fn.sticky_sort = function() {
		return $(this).sortable({
			'connectWith': '.sticky_list',
			'cancel': ':input,button,ul.priority',
			'containment': '#sticky_board',
			'opacity': 0.4,
			'placeholder': 'placeholder',
			'revert': 200,
			'tolerance': 'pointer'
		});
	};
	
	$.fn.user_droppable = function() {
		return $(this).droppable({
			'accept': 'li:not(#completed) .sticky',
			'hoverClass': 'drop',
			'tolerance': 'pointer',
			'drop': function( event, ui ) {
				var $this = $(this),
					pos = $this.position(),
					$clone = ui.draggable.clone(true).removeClass('hover').appendTo($this.closest('li.sticky_column'));
				
				ui.draggable.hide();
				
				$clone.animate({
					opacity: 0,
					top: (pos.top + Math.floor($this.height() / 2)) + 'px',
					left: (pos.left + Math.floor($this.width() / 2)) + 'px',
					height: 1,
					width: 1
				}, 400, function() {
					$clone.stop().remove();
					
					ui.draggable.remove();
					
					return false;
				});
				
				return false;
			}
		});
	};
	
	$.fn.board_droppable = function() {
		return $(this).droppable({
			'accept': '.sticky',
			'hoverClass': 'drop',
			'tolerance': 'pointer',
			'drop': function( event, ui ) {
				var $this = $(this),
					$stickyList = $('ul.sticky_list', $this),
					top = parseInt($stickyList.css('padding-top').replace('px','')),
					left = parseInt($stickyList.css('padding-left').replace('px','')),
					position = $stickyList.position(),
					$clone = ui.draggable.clone(true).removeClass('hover').prependTo($stickyList),
					$dropped = $('<li class="dropped_sticky"></li>').prependTo($stickyList).animate({
						width: ui.draggable.width()
					}, 500);
				
				ui.draggable.hide();
				
				$clone.animate({
					top: (position.top + top) + 'px',
					left: (position.left + left) + 'px',
					opacity: 1
				}, 500, 'easeOutBounce', function() {
					$dropped.stop().remove();
					
					$clone.css({
						position: 'static',
						top: 'auto',
						left: 'auto',
						opacity: 1
					}).removeClass('hover');
					
					ui.draggable.remove();
					
					return false;
				});
				
				return false;
			}
		});
	};
	
	initBoard();
	$(window).resize(updateBoard);
	
	/*if (isMobile) {
		$(window).resize(function() {
			jspUpdateTimer = setTimeout(function() {
				$stickyBoardItemsJsp.each(function() {
					$(this).data('jsp').reinitialise();
				});
				
				jspUpdateTimer = null;
			}, 100);
		});
	}*/
	
	$('#board').delegate('li.sticky_column:not(#completed) .sticky ul.priority li', 'click', function() {
		var $this = $(this),
			$sticky = $this.closest('.sticky');
		
		if (!$sticky.hasClass($this.attr('class'))) {
			$sticky.removeClass('high med low').addClass($this.attr('class'));
		}
	});
	
	$('#board').delegate('.sticky div.front button.flip', 'click', function() {
		$(this).closest('.qf').quickFlipper({'noResize':true});
	}).delegate('.sticky div.back button.done', 'click', function() {
		$(this).closest('.qf').quickFlipper({'noResize':true});
	}).delegate('.sticky, .user', 'mouseenter', function() {
		$(this).addClass('hover');
	}).delegate('.sticky, .user', 'mouseleave', function() {
		$(this).removeClass('hover');
	});
});