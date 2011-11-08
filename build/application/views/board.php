<!DOCTYPE html>
<html>
<head>
	<title>Stickease - Simply Stickys</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=640">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!--[if lt IE 9]>
	<script src="/js/html5.js"></script>
	<![endif]-->
	<link href="/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" media="all" type="text/css" href="/css/reset.css">
	<link rel="stylesheet" media="all" type="text/css" href="/css/jquery-ui-1.8.16.custom.css">
	<link rel="stylesheet" media="all" type="text/css" href="/css/jquery.jscrollpane.css">
	<link rel="stylesheet" media="all" type="text/css" href="/css/uniform.default.css">
	<link rel="stylesheet" media="all" type="text/css" href="/css/default.css">
</head>
<body id="board" class="signed_in">
<section id="header_wrapper">
	<header>
		<div class="logo"><a href="/">Stickease - The only simple sticky system</a></div>
		<div class="info">
			<ul class="clearfix">
				<li class="has_button"><select id="view">
					<option selected="selected" value="0">scrum view</option>
					<option value="1">james wagoner (me)</option>
					<option value="2">jimmy thomas</option>
					<option value="3">john doe</option>
					<option value="4">jane doe</option>
				</select></li>
				<li class="info_button"><button class="has_tooltip" title="add user" data-overlay="add-user">+</button></li>
				<li class="has_button"><select>
					<option selected="selected">Project Stickease</option>
					<option>DealerNinja.com - Homepage</option>
					<option>CarNinja.com</option>
				</select></li>
				<li class="info_button"><button class="has_tooltip" title="new project" data-overlay="new-project">+</button></li>
				<li class="dropdown">
					<button><span>james wagoner</span></button>
					<ul>
						<li class="base"><span>james wagoner</span></li>
						<li><a href="/settings">settings</a></li>
						<!--<li class="divider"></li>-->
						<li><a href="/logout">logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</header>
</section>
<section id="content_wrapper">
	<div id="content">
		<ul id="sticky_board" class="clearfix">
			<li id="notstarted" class="sticky_column">
				<h2>not&nbsp;started<button id="new_sticky_btn" class="has_tooltip" title="new sticky">+</button></h2>
				<div>
					<ul class="sticky_list clearfix">
						<li class="sticky med">
							<div class="qf">
								<div class="front">
									<div>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc gravida ligula in erat ultricies in euismod libero sodales. Quisque purus sed.</p>
										<button class="flip">&nbsp;</button>
									</div>
								</div>
								<div class="back">
									<div>
										<p><strong>Unassigned</strong></p>
										<ul class="priority">
											<li class="high" title="high">&nbsp;</li>
											<li class="med" title="medium">&nbsp;</li>
											<li class="low" title="low">&nbsp;</li>
										</ul>
										<ul class="info">
											<li class="created">Created: <span class="date">10/17/11 @ 12:14pm</span></li>
										</ul>
										<button class="delete">Delete</button>
										<button class="done">Done</button>
									</div>
								</div>
							</div>
						</li>
						<li class="sticky low">
							<div class="qf">
								<div class="front">
									<div>
										<p>this is a pending sticky! rawr rawr rawr rrrwqrwe wer ewr wer wer wer wer seruwer wer wek werkjhwerkwe werkjhwer kwe</p>
										<button class="flip">&nbsp;</button>
									</div>
								</div>
								<div class="back">
									<div>
										<p><strong>Unassigned</strong></p>
										<ul class="priority">
											<li class="high" title="high">&nbsp;</li>
											<li class="med" title="medium">&nbsp;</li>
											<li class="low" title="low">&nbsp;</li>
										</ul>
										<ul class="info">
											<li class="created">Created: <span class="date">10/17/11 @ 12:14pm</span></li>
										</ul>
										<button class="delete">Delete</button>
										<button class="done">Done</button>
									</div>
								</div>
							</div>
						</li>
						<li class="sticky high">
							<div class="qf">
								<div class="front">
									<div>
										<p>this is a pending sticky! rawr rawr rawr rrrwqrwe wer ewr wer wer wer wer seruwer wer wek werkjhwerkwe werkjhwer kwe</p>
										<button class="flip">&nbsp;</button>
									</div>
								</div>
								<div class="back">
									<div>
										<p><strong>Unassigned</strong></p>
										<ul class="priority">
											<li class="high" title="high">&nbsp;</li>
											<li class="med" title="medium">&nbsp;</li>
											<li class="low" title="low">&nbsp;</li>
										</ul>
										<ul class="info">
											<li class="created">Created: <span class="date">10/17/11 @ 12:14pm</span></li>
										</ul>
										<button class="delete">Delete</button>
										<button class="done">Done</button>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<div id="new-sticky" class="sticky low">
						<div class="front">
							<div>
								<textarea id="sticky_note"></textarea>
								<p id="sticky_note_view"></p>
								<select id="user_id_assigned">
									<option selected="selected" value="0">unassigned</option>
									<option value="1">james wagoner (me)</option>
									<option value="2">jimmy thomas</option>
									<option value="3">john doe</option>
									<option value="4">jane doe</option>
								</select>
								<ul class="priority clearfix">
									<li class="high" title="high">&nbsp;</li>
									<li class="med" title="medium">&nbsp;</li>
									<li class="low" title="low">&nbsp;</li>
								</ul>
								<button class="cancel">Cancel</button>
								<button class="done">Done</button>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li id="assignedto" class="sticky_column">
				<h2>assigned&nbsp;to<span class="icon_back" title="back to scrum view"></span></h2>
				<div>
					<ul class="user_list clearfix">
						<li class="user" data-user_id="1"><p><img src="/images/icon_mw.png" title="james wagoner"></p><span>james wagoner</span></li>
						<li class="user" data-user_id="2"><p><img src="/images/icon_mw.png" title="jimmy thomas"></p><span>jimmy thomas</span></li>
						<li class="user" data-user_id="3"><p><img src="/images/icon_mw.png" title="john doe"></p><span>john doe</span></li>
						<li class="user" data-user_id="4"><p><img src="/images/icon_mw.png" title="jane doe"></p><span>jane doe</span></li>
						<li class="user add"><p><img src="/images/icon_plus.png"></p><span>add user</span></li>
					</ul>
					<ul id="user_1" class="sticky_list disabled clearfix" data-user_display="james wagoner">
						<li class="sticky med">
							<div class="qf">
								<div class="front">
									<div>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc gravida ligula in erat ultricies in euismod libero sodales. Quisque purus sed.</p>
										<button class="flip">&nbsp;</button>
									</div>
								</div>
								<div class="back">
									<div>
										<p><strong>Unassigned</strong></p>
										<ul class="priority">
											<li class="high" title="high">&nbsp;</li>
											<li class="med" title="medium">&nbsp;</li>
											<li class="low" title="low">&nbsp;</li>
										</ul>
										<ul class="info">
											<li class="created">Created: <span class="date">10/17/11 @ 12:14pm</span></li>
										</ul>
										<button class="delete">Delete</button>
										<button class="done">Done</button>
									</div>
								</div>
							</div>
						</li>
						<li class="sticky low">
							<div class="qf">
								<div class="front">
									<div>
										<p>this is a pending sticky! rawr rawr rawr rrrwqrwe wer ewr wer wer wer wer seruwer wer wek werkjhwerkwe werkjhwer kwe</p>
										<button class="flip">&nbsp;</button>
									</div>
								</div>
								<div class="back">
									<div>
										<p><strong>Unassigned</strong></p>
										<ul class="priority">
											<li class="high" title="high">&nbsp;</li>
											<li class="med" title="medium">&nbsp;</li>
											<li class="low" title="low">&nbsp;</li>
										</ul>
										<ul class="info">
											<li class="created">Created: <span class="date">10/17/11 @ 12:14pm</span></li>
										</ul>
										<button class="delete">Delete</button>
										<button class="done">Done</button>
									</div>
								</div>
							</div>
						</li>
						<li class="sticky high">
							<div class="qf">
								<div class="front">
									<div>
										<p>this is a pending sticky! rawr rawr rawr rrrwqrwe wer ewr wer wer wer wer seruwer wer wek werkjhwerkwe werkjhwer kwe</p>
										<button class="flip">&nbsp;</button>
									</div>
								</div>
								<div class="back">
									<div>
										<p><strong>Unassigned</strong></p>
										<ul class="priority">
											<li class="high" title="high">&nbsp;</li>
											<li class="med" title="medium">&nbsp;</li>
											<li class="low" title="low">&nbsp;</li>
										</ul>
										<ul class="info">
											<li class="created">Created: <span class="date">10/17/11 @ 12:14pm</span></li>
										</ul>
										<button class="delete">Delete</button>
										<button class="done">Done</button>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<ul id="user_2" class="sticky_list disabled clearfix" data-user_display="jimmy thomas">
						<li class="sticky high">
							<div class="qf">
								<div class="front">
									<div>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc gravida ligula in erat ultricies in euismod libero sodales. Quisque purus sed.</p>
										<button class="flip">&nbsp;</button>
									</div>
								</div>
								<div class="back">
									<div>
										<p><strong>Unassigned</strong></p>
										<ul class="priority">
											<li class="high" title="high">&nbsp;</li>
											<li class="med" title="medium">&nbsp;</li>
											<li class="low" title="low">&nbsp;</li>
										</ul>
										<ul class="info">
											<li class="created">Created: <span class="date">10/17/11 @ 12:14pm</span></li>
										</ul>
										<button class="delete">Delete</button>
										<button class="done">Done</button>
									</div>
								</div>
							</div>
						</li>
						<li class="sticky high">
							<div class="qf">
								<div class="front">
									<div>
										<p>this is an assigned sticky! rawr rawr rawr rrrwqrwe wer ewr wer wer wer wer seruwer wer wek werkjhwerkwe werkjhwer kwe</p>
										<button class="flip">&nbsp;</button>
									</div>
								</div>
								<div class="back">
									<div>
										<p><strong>Unassigned</strong></p>
										<ul class="priority">
											<li class="high" title="high">&nbsp;</li>
											<li class="med" title="medium">&nbsp;</li>
											<li class="low" title="low">&nbsp;</li>
										</ul>
										<ul class="info">
											<li class="created">Created: <span class="date">10/17/11 @ 12:14pm</span></li>
										</ul>
										<button class="delete">Delete</button>
										<button class="done">Done</button>
									</div>
								</div>
							</div>
						</li>
						<li class="sticky high">
							<div class="qf">
								<div class="front">
									<div>
										<p>this is an assigned sticky! rawr rawr rawr rrrwqrwe wer ewr wer wer wer wer seruwer wer wek werkjhwerkwe werkjhwer kwe</p>
										<button class="flip">&nbsp;</button>
									</div>
								</div>
								<div class="back">
									<div>
										<p><strong>Unassigned</strong></p>
										<ul class="priority">
											<li class="high" title="high">&nbsp;</li>
											<li class="med" title="medium">&nbsp;</li>
											<li class="low" title="low">&nbsp;</li>
										</ul>
										<ul class="info">
											<li class="created">Created: <span class="date">10/17/11 @ 12:14pm</span></li>
										</ul>
										<button class="delete">Delete</button>
										<button class="done">Done</button>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<ul id="user_3" class="sticky_list disabled clearfix" data-user_display="john doe">
						<li class="none">no stickys assigned to this user</li>
					</ul>
					<ul id="user_4" class="sticky_list disabled clearfix" data-user_display="jane doe">
						<li class="none">no stickys assigned to this user</li>
					</ul>
				</div>
			</li>
			<li id="completed" class="sticky_column">
					<h2>completed</h2>
				<div>
					<ul class="sticky_list clearfix">
					</ul>
				</div>
			</li>
		</ul>
	</div>
</section>
<section id="footer_wrapper">
	<footer>
		<p>&copy;2011 Stickease&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/about">About</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/legal/terms-of-use">Terms Of Use</a></p>
	</footer>
</section>
<div id="add-user" title="Add User">
	<form>
		<label for="email">email:</label>
		<input type="text" id="email">
		<button type="submit">add user</button>
	</form>
</div>
<div id="new-project">
	<form>
		<label for="project">project name:</label>
		<input type="text" id="project">
		<button type="submit">new project</button>
	</form>
</div>
<script type="text/x-handlebars-template">
</script>
<script type="text/javascript" src="/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.ui.mouse.touch.js"></script>
<script type="text/javascript" src="/js/jquery.scrollTo-1.4.2-min.js"></script>
<script type="text/javascript" src="/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/js/jquery.quickflip.min.js"></script>
<script type="text/javascript" src="/js/handlebars.vm.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/board.js"></script>
</body>
</html>