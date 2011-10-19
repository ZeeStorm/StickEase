<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link href="/images/favicon.ico" rel="shortcut icon" type="image/x-icon">

	<!-- CSS -->
	<link rel="stylesheet" media="all" type="text/css" href="/static/css/reset.css">
	<link rel="stylesheet" media="all" type="text/css" href="/static/css/default.css">
	<link rel="stylesheet" media="all" type="text/css" href="/static/css/uniform.aristo.css">
</head>
<body id="stage" class="signed_in">
<section id="header_wrapper">
	<header>
		<nav>
			<ul>
				<li><input type="email" placeholder="email" class="selector"></li>
				<li><input type="password" placeholder="password" class="selector"></li>
				<li><button type="submit">sign in</button></li>
			</ul>
		</nav>
		<div class="logo"><a href="/">Stickease - The only simple sticky system</a></div>
	</header>
</section>
<section id="content_wrapper">
	<div id="content">
		<!-- Content -->
		<div class="col side">
			<h2>Filters</h2>
			<div id="filters">
				<form action="#" method="post" id="filter_form">
					<div class="filter_mine">
						<input type="checkbox" name="filter_mine" id="filter_mine"> <label for="filter_mine">Show only my actions</label>
					</div>

					<div class="filter_app">
						<label>Show updates from:</label>
						<select id="filter_new_app" name="filter_new_app">
							<option value="">--</option>
							<option value="skype">Skype</option>
							<option value="digg">Digg</option>
							<option value="geeklist">Geeklist</option>
							<option value="mixx">Mixx</option>
							<option value="twitter">Twitter</option>
							<option value="keep">Keep</option>
							<option value="facebook">Facebook</option>
							<option value="mobvia">Mobvia</option>
							<option value="skinnyr">Skinnyr</option>
						</select>

						<ul class="filtered_apps">
							<li><span>x</span> Skype</li>
							<li><span>x</span> Digg</li>
							<li><span>x</span> Mobvia</li>
						</ul>
					</div>
				</form>
			</div>
		</div>
		<div class="col main">
			<h1>The Stage</h1>
			<div id="stage_stream">
				<p id="notice">There are <strong>24,734</strong> new actions. <span>Show them</span>?</p>
				<ul>
					<li>
						<div class="icon"><a href="/apps/geeklist"><img alt="Geeklist" src="/static/images/social/geeklist_32.png"></a></div>
						<div class="meta">
							<p class="action"><a href="/users/xenocom">Xenocom</a> added a <a href="http://geekli.st/xenocom/card-23523">card</a> to his resume.</p>
							<p class="timestamp"><a href="/something">12 seconds ago</a></p>
						</div>
					</li>
					<li>
						<div class="icon"><a href="/apps/geeklist"><img alt="Geeklist" src="/static/images/social/geeklist_32.png"></a></div>
						<div class="meta">
							<p class="action"><a href="/users/xenocom">Xenocom</a> added a <a href="http://geekli.st/xenocom/card-23523">card</a> to his resume.</p>
							<p class="timestamp"><a href="/something">12 seconds ago</a></p>
						</div>
					</li>
					<li>
						<div class="icon"><a href="/apps/geeklist"><img alt="Geeklist" src="/static/images/social/geeklist_32.png"></a></div>
						<div class="meta">
							<p class="action"><a href="/users/xenocom">Xenocom</a> added a <a href="http://geekli.st/xenocom/card-23523">card</a> to his resume.</p>
							<p class="timestamp"><a href="/something">12 seconds ago</a></p>
						</div>
					</li>
					<li>
						<div class="icon"><a href="/apps/geeklist"><img alt="Geeklist" src="/static/images/social/geeklist_32.png"></a></div>
						<div class="meta">
							<p class="action"><a href="/users/xenocom">Xenocom</a> added a <a href="http://geekli.st/xenocom/card-23523">card</a> to his resume.</p>
							<p class="timestamp"><a href="/something">12 seconds ago</a></p>
						</div>
					</li>
					<li>
						<div class="icon"><a href="/apps/geeklist"><img alt="Geeklist" src="/static/images/social/geeklist_32.png"></a></div>
						<div class="meta">
							<p class="action"><a href="/users/xenocom">Xenocom</a> added a <a href="http://geekli.st/xenocom/card-23523">card</a> to his resume.</p>
							<p class="timestamp"><a href="/something">12 seconds ago</a></p>
						</div>
					</li>
					<li>
						<div class="icon"><a href="/apps/geeklist"><img alt="Geeklist" src="/static/images/social/geeklist_32.png"></a></div>
						<div class="meta">
							<p class="action"><a href="/users/xenocom">Xenocom</a> added a <a href="http://geekli.st/xenocom/card-23523">card</a> to his resume.</p>
							<p class="timestamp"><a href="/something">12 seconds ago</a></p>
						</div>
					</li>
					<li>
						<div class="icon"><a href="/apps/geeklist"><img alt="Geeklist" src="/static/images/social/geeklist_32.png"></a></div>
						<div class="meta">
							<p class="action"><a href="/users/xenocom">Xenocom</a> added a <a href="http://geekli.st/xenocom/card-23523">card</a> to his resume.</p>
							<p class="timestamp"><a href="/something">12 seconds ago</a></p>
						</div>
					</li>
					<li>
						<div class="icon"><a href="/apps/geeklist"><img alt="Geeklist" src="/static/images/social/geeklist_32.png"></a></div>
						<div class="meta">
							<p class="action"><a href="/users/xenocom">Xenocom</a> added a <a href="http://geekli.st/xenocom/card-23523">card</a> to his resume.</p>
							<p class="timestamp"><a href="/something">12 seconds ago</a></p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section id="footer_wrapper">
	<footer>
		<div class="logo"><a href="/">Stage.io - Social Actions API</a></div>
		<p>&copy;2011 Stage.io&nbsp;&nbsp;-&nbsp;&nbsp;<a href="/about">About Us</a>&nbsp;&nbsp;-&nbsp;&nbsp;<a href="/legal/terms-of-use">Terms Of Use</a></p>
	</footer>
</section>


<!-- JS -->
<script type="text/javascript" src="/static/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/static/js/main.js"></script>
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</body>
</html>