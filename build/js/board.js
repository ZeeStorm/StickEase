// prep for all new stickys
// only adds tooltips to priority right now
$.fn.sticky = function() {
	return $(this).each(function() {
		$('ul.priority li', $(this)).tooltip({
			'effect': 'fade',
			'offset': [-3,0]
		});
	});
};

// sticky sortable set up
// needs to be fired on all new users as well
$.fn.sticky_sort = function() {
	return $(this).sortable({
		'connectWith': '.sticky_list',
		'cancel': ':input,button,ul.priority,li.temp_sticky',
		'containment': '#sticky_board',
		'opacity': 0.4,
		'placeholder': 'placeholder',
		'revert': 200,
		'tolerance': 'pointer'
	});
};

// new .user's on user_list
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

window.board_object = function() {
	// since everything is very dynamic, instead of relying on hardcoded values, pre-emp all of this
	// we store as many references as we can to speed up the resize() function
	var $window = $(window),
		borderWidth = 4,
		resizeTimer,
		$content = $('#content'),
		$stickyBoard = $('#sticky_board'),
		h2height = $('h2:first', $stickyBoard).outerHeight(true),
		footerHeight = $('#footer_wrapper').outerHeight(true),
		$headerWrapper = $('#header_wrapper'),
		$stickyBoardItems = $stickyBoard.children('li'),
		$stickyBoardLastItem = $stickyBoardItems.last(),
		$stickyBoardItemsDiv = $stickyBoardItems.children('div'),
		$stickyBoardLists = $stickyBoardItemsDiv.children('ul'),
		listVerticalPadding = (parseInt($stickyBoardLists.first().css('padding-top').replace('px', '')) + parseInt($stickyBoardLists.first().css('padding-bottom').replace('px', '')));
	
	this.initBoard = function() {
		var that = this;
		
		that.updateBoard();
		
		if ($.support.touch) {
			$window.resize(updateBoard);
		} else {
			$window.resize(function() {
				if (resizeTimer) {
					clearTimeout(resizeTimer);
				}
				
				resizeTimer = setTimeout(that.updateBoard, 200);
			});
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
		
		// add misc stuff
		$('#assignedto h2 span.icon_back', $stickyBoard).tooltip({
			'effect': 'fade',
			'offset': [-3,0]
		});
	};
	
	this.updateBoard = function() {
		var headerHeight = $headerWrapper.outerHeight(),
			winHeight = ($window.height() - headerHeight - footerHeight),
			liWidth = Math.floor(($window.width() - borderWidth) / 3),
			colHeight = [];
		
		$('body.has-overlay').trigger('mousedown');
		
		if (!$.support.touch) {
			$content.height(winHeight).css('top', headerHeight + 'px');
			$stickyBoard.height(winHeight).width($window.width());
			$stickyBoardItems.height(winHeight);
			$stickyBoardItemsDiv.height(winHeight - h2height);
			$stickyBoardLists.css('min-height', (winHeight - h2height - listVerticalPadding) + 'px');
		} else {
			$content.css('min-height', winHeight + 'px');
			$stickyBoard.css('min-height', winHeight + 'px');
			$stickyBoardItems.css('min-height', winHeight +'px');
			$stickyBoardItemsDiv.css('min-height', (winHeight - h2height) + 'px');
			$stickyBoardLists.css('min-height', (winHeight - h2height - listVerticalPadding) + 'px');
			
			$('ul.sticky_list:not(.disabled), ul.user_list:not(.disabled)', $stickyBoardItems).each(function() {
				colHeight.push($(this).height());
			}).height(Math.max.apply(this, colHeight));
		}
		
		$stickyBoardItems.width(liWidth);
		$stickyBoardLastItem.width(($window.width() - borderWidth) - (liWidth * 2));
		$stickyBoardItemsDiv.width(liWidth);
	};
	
	this.changeUser = function(user_id, user_display) {
		var $assignedto = $('#assignedto'),
			$user_list = $assignedto.find('ul#user_' + user_id).removeClass('disabled');
		
		if (!user_id || !$user_list.length) {
			$('ul:not(.user_list)', $assignedto).addClass('disabled');
			$('ul.user_list', $assignedto).removeClass('disabled');
			$assignedto.removeClass('user_view');
		} else {
			$assignedto.find('ul:not(#user_' + user_id + ')').addClass('disabled');
			$assignedto.find('h2 span.user_display').remove();
			$assignedto.find('h2 span.icon_back').before($('<span class="user_display"></span>').text(': ' + $user_list.data('user_display')).attr('title', $user_list.data('user_display')).tooltip({
				'effect': 'fade',
				'offset': [-3,0],
				'predelay': 500
			}));
			$assignedto.addClass('user_view');
		}
	};
	
	this.initBoard();
};

$(function() {
	if ($.support.touch) {
		$('body').addClass('touch');
	} else {
		$('body').addClass('desktop');
	}
	
	window.board = new board_object();
	
	// event handling
	$('#board').delegate('li.sticky_column:not(#completed) .sticky ul.priority li', 'click', function() { // priority clicks
		var $this = $(this),
			$sticky = $this.closest('.sticky');
		
		if (!$sticky.hasClass($this.attr('class'))) {
			$sticky.removeClass('high med low').addClass($this.attr('class'));
		}
	}).delegate('.sticky div.front button.flip', 'click', function() { // flip button to flip to the back
		$(this).closest('.qf').quickFlipper({'noResize':true});
	}).delegate('.sticky div.back button.done', 'click', function() { // done button to flip to the front
		$(this).closest('.qf').quickFlipper({'noResize':true});
	}).delegate('.sticky, .user', 'mouseenter', function() { // hover class on stickys and users
		$(this).addClass('hover');
	}).delegate('.sticky, .user', 'mouseleave', function() { // remove hover class on stickys and users
		$(this).removeClass('hover');
	}).delegate('ul.user_list li.user', 'click', function() { // user click
		var $this = $(this),
			offset,
			$adduser,
			top;
		
		if ($this.hasClass('add')) {
			$adduser = $('#add-user');
			offset = $this.offset();
			top = (offset.top - Math.floor(($adduser.height() - $this.height()) / 2));
			
			if (top + $adduser.outerHeight(true) > $(window).height()) {
				top = ($(window).height() - $adduser.outerHeight(true) - 10);
			}
			
			$('body').addClass('has-overlay');
			$adduser.addClass('overlay').css({
				left: (offset.left - Math.floor(($adduser.width() - $this.width()) / 2)) + 'px',
				top: top + 'px'
			}).show().find('input').val('').focus();
		} else {
			$('#view').val($this.data('user_id')).change();
		}
	}).delegate('#view', 'change', function() {
		var $this = $(this);
		
		board.changeUser($this.val());
	}).delegate('#assignedto.user_view > h2 span.icon_back', 'click', function() {
		$('#view').val(0).change();
	}).delegate('.overlay', 'mousedown', function(e) {
		e.stopPropagation();
	}).delegate('#header_wrapper div.info ul li.dropdown', 'mouseenter', function() {
		$(this).addClass('hover');
	}).delegate('#header_wrapper div.info ul li.dropdown', 'mouseleave', function() {
		$(this).removeClass('hover');
	})/*.delegate('#header_wrapper .menu_overlay', 'click', function() {
		var $overlay = $('#' + $(this).data('overlay')),
			$dropdown = $(this).closest('li.dropdown'),
			offset = $dropdown.offset();
		
		$('body').addClass('has-overlay');
		$overlay.addClass('overlay').css({
			left: (offset.left - ($overlay.width() - $dropdown.width()) - 5) + 'px',
			top: (offset.top + $dropdown.outerHeight(true) - 10) + 'px'
		}).show().find('input').val('').focus();
		
		$dropdown.removeClass('hover');
		
		return false;
	})*/.delegate('#header_wrapper li.info_button > button', 'click', function() {
		var $this = $(this),
			$adduser = $('#' + $this.data('overlay')),
			offset = $this.offset();
		
		$('body').addClass('has-overlay');
		$adduser.addClass('overlay').css({
			left: (offset.left - ($adduser.width() - $this.width()) - 2) + 'px',
			top: (offset.top + $this.outerHeight(true)) + 'px'
		}).show().find('input').val('').focus();
		
		return false;
	}).delegate('#new_sticky_btn', 'click', function() {
		$('#notstarted').css('position', 'relative').append('<p id="new_sticky_overlay"></p>')
		.find('ul.sticky_list').append('<li class="temp_sticky"><p>new sticky</p></li>')
		.find('li.temp_sticky').scrollTo( 200 );
		
		$('#new-sticky').show();
	});
	
	$('body.has-overlay').live('mousedown', function() {
		$('div.overlay').hide().removeClass('overlay');
		$(this).removeClass('has-overlay');
	});
	
	$('.info_button button').tooltip({
		'effect': 'fade',
		'offset': [3,0],
		'position': 'bottom center'
	});
	
	$('#notstarted h2 button').tooltip({
		'effect': 'fade',
		'offset': [-3,0]
	});
	
	var $new_sticky = $('#new-sticky'),
		$sticky_note = $('#sticky_note', $new_sticky),
		$sticky_note_view = $('#sticky_note_view', $new_sticky);
	
	$sticky_note.bind( 'keydown keypress keyup', function() {
		$sticky_note_view.text($sticky_note.val() + ' wrap');
		$sticky_note.height($sticky_note_view.height());
	});
});