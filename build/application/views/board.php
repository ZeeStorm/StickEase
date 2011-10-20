<!DOCTYPE html>
<html>
<head>
	<title>Stickease - Simply Stickys</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href="/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" media="all" type="text/css" href="/css/reset.css">
	<link rel="stylesheet" media="all" type="text/css" href="/css/uniform.default.css">
	<link rel="stylesheet" media="all" type="text/css" href="/css/default.css">
</head>
<body id="board" class="signed_in">
<section id="header_wrapper">
	<header>
		<div class="logo"><a href="/">Stickease - The only simple sticky system</a></div>
		<form action="/login" method="post">
			<ul>
				<li><div class="text"><input type="text" placeholder="email" name="email" id="email"></div></li>
				<li><input type="password" placeholder="password" name="password" id="password"></li>
				<li><input type="checkbox" name="remember" id="remember"><label for="remember">remember me</label></li>
				<li><button type="submit">sign in</button></li>
				<li><a href="/forgot">forgot?</a></li>
			</ul>
		</form>
	</header>
</section>
<section id="content_wrapper">
	<div id="content">
		<ul id="sticky_board" class="clearfix">
			<li id="notstarted">
				<h2>not started</h2>
				<div>
					<ul class="sticky_list">
						<li><p class="note">this is a pending sticky! rawr rawr rawr rrrwqrwe wer ewr wer wer wer wer seruwer wer wek werkjhwerkwe  werkjhwer kwe</p><p class="separator"></p><p class="assigned"><a href="#">james wagoner</a></p></li>
						<li class="orange"><p class="note">this is a pending sticky! rawr rawr rawr rrrwqrwe wer ewr wer wer wer wer seruwer wer wek werkjhwerkwe  werkjhwer kwe</p><p class="separator"></p><p class="assigned"><a href="#">james wagoner</a></p></li>
						<li class="blue"><p class="note">this is a pending sticky! rawr rawr rawr rrrwqrwe wer ewr wer wer wer wer seruwer wer wek werkjhwerkwe  werkjhwer kwe</p><p class="separator"></p><p class="assigned"><a href="#">james wagoner</a></p></li>
						<li class="green"><p class="note">this is a pending sticky! rawr rawr rawr rrrwqrwe wer ewr wer wer wer wer seruwer wer wek werkjhwerkwe  werkjhwer kwe</p><p class="separator"></p><p class="assigned"><a href="#">james wagoner</a></p></li>
						<li class="grey"><p class="note">this is a pending sticky! rawr rawr rawr rrrwqrwe wer ewr wer wer wer wer seruwer wer wek werkjhwerkwe  werkjhwer kwe</p><p class="separator"></p><p class="assigned"><a href="#">james wagoner</a></p></li>
						<li class="pink"><p class="note">this is a pending sticky! rawr rawr rawr rrrwqrwe wer ewr wer wer wer wer seruwer wer wek werkjhwerkwe  werkjhwer kwe</p><p class="separator"></p><p class="assigned"><a href="#">james wagoner</a></p></li>
					</ul>
				</div>
			</li>
			<li id="inprogress">
				<h2>in progress</h2>
				<div>
					<ul class="sticky_list">
					</ul>
				</div>
			</li>
			<li id="completed">
					<h2>completed</h2>
				<div>
					<ul class="sticky_list">
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
<script type="text/javascript" src="/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
</body>
</html>