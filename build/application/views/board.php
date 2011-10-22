<!DOCTYPE html>
<html>
<head>
	<title>Stickease - Simply Stickys</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
				<li><select>
					<option selected="selected">scrum view</option>
					<option>james wagoner (me)</option>
					<option>jimmy thomas</option>
					<option>bryan conzone</option>
				</select></li>
				<li><select>
					<option selected="selected">Project Stickease</option>
					<option>DealerNinja.com - Homepage</option>
					<option>CarNinja.com</option>
				</select></li>
				<li><a href="#">james wagoner ..</a></li>
			</ul>
		</div>
	</header>
</section>
<section id="content_wrapper">
	<div id="content">
		<ul id="sticky_board" class="clearfix">
			<li id="notstarted" class="sticky_column">
				<h2>not&nbsp;started</h2>
				<div>
					<ul class="sticky_list active clearfix">
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
				</div>
			</li>
			<li id="assignedto" class="sticky_column">
				<h2>assigned&nbsp;to</h2>
				<div>
					<ul class="user_list active clearfix">
						<li class="user"><p><img src="/images/icon_mw.png" title="james wagoner"></p><span>james wagoner</span></li>
						<li class="user"><p><img src="/images/icon_mw.png" title="jimmy thomas"></p><span>jimmy thomas</span></li>
						<li class="user"><p><img src="/images/icon_mw.png" title="john doe"></p><span>john doe</span></li>
						<li class="user"><p><img src="/images/icon_mw.png" title="jane doe"></p><span>jane doe</span></li>
					</ul>
				</div>
			</li>
			<li id="completed" class="sticky_column">
					<h2>completed</h2>
				<div>
					<ul class="sticky_list active clearfix">
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
<script type="text/javascript" src="/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/js/jquery.quickflip.min.js"></script>
<script type="text/javascript" src="/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/board.js"></script>
</body>
</html>