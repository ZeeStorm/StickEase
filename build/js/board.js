$(function() {
	// since everything is very dynamic, instead of relying on hardcoded values, pre-emp all of this
	// we store as many references as we can to speed up the resize() function
	var isMobile = false,
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
		initBoard = function() {
			updateBoard();
			
			// prep our not started and assigned to (sticky lists)
			$('#notstarted .sticky_list, #assignedto .sticky_list', $stickyBoard).sticky_sort(true);
			
			// prep our completed board, it doesn't change like the others can
			$('#completed', $stickyBoard).droppable({
				accept: '.sticky',
				hoverClass: 'drop',
				drop: function( event, ui ) {
					//var $item = $( this );
					//var $list = $( $item.find( "a" ).attr( "href" ) ).find( ".connectedSortable" );
					var $this = $(this),
						$stickyList = $('ul.sticky_list', $this),
						top = parseInt($stickyList.css('padding-top').replace('px','')),
						left = parseInt($stickyList.css('padding-left').replace('px','')),
						position = $stickyList.position(),
						$clone = ui.draggable.clone(true).prependTo($stickyList),
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
			
			$('#sticky_board').disableSelection();
			
			// prep our user list items
			$('.user_list > li.user', $stickyBoard).user_droppable();
			
			// get every single sticky thats on the board prepped
			$stickyBoard.sticky();
			
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
		}
	
	$.fn.sticky = function() {
		$(this).each(function() {
			$('ul.priority li', $(this)).tooltip({
				'effect': 'fade',
				'offset': [-3,0]
			});
		});
	};
	
	// jquery function since users can be added
	$.fn.sticky_sort = function(connectWith) {
		var opts = {
				'cancel': ':input,button,ul.priority',
				'containment': '#sticky_board',
				'opacity': 0.4,
				'placeholder': 'placeholder',
				'revert': 200,
				'start': function(event, ui) {
					ui.item.removeClass('hover');
				}
			};
		
		if (connectWith === true) {
			$.extend(opts, {'connectWith': '.sticky_list'});
		}
		
		$(this).each(function() {
			$(this).sortable(opts);
		});
	};
	
	$.fn.user_droppable = function() {
		$(this).each(function() {
			$(this).droppable({
				accept: 'li:not(#completed) .sticky',
				hoverClass: 'drop',
				drop: function( event, ui ) {
					//var $item = $( this );
					//var $list = $( $item.find( "a" ).attr( "href" ) ).find( ".connectedSortable" );
	
					ui.draggable.hide( 'slow', function() {
						//$( this ).appendTo( $list ).show( "slow" );
					});
				}
			});
		});
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