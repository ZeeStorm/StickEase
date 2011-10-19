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
				<li><a href="/">Home</a></li>
				<li><a href="/users/{{USERNAME}}">My Profile</a></li>
				<li><a href="/services/sites">My Sites</a></li>
				<li><a href="/services/signout">Sign Out</a></li>
			</ul>
		</nav>
		<div class="logo"><a href="/">Stage.io - Social Actions API</a></div>
	</header>
</section>
<section id="subheader_wrapper">
	<header>
		<aside id="user_box">
			<img alt="xeno" src="http://1.gravatar.com/avatar/053d058fa5828ad9e19748a5a7893ef5?size=50">
			<div id="user_meta">
				<h2>ZeeStorm</h2>
				<ul>
					<li><a href="/services/settings">Settings</a></li>
					<li><a href="/services/signout">Sign Out</a></li>
				</ul>
			</div>
		</aside>
		<div id="user_apps">
			<h2>My Applications</h2>
			<ul>
				<li><a href="/apps/geeklist"><img alt="Geeklist" src="/static/images/social/geeklist_32.png"></a></li>
				<li><a href="/apps/dribbble"><img alt="Dribbble" src="/static/images/social/dribbble_32.png"></a></li>
				<li><a href="/apps/digg"><img alt="Digg" src="/static/images/social/digg_32.png"></a></li>
				<li><a href="/apps/grooveshark"><img alt="Grooveshark" src="/static/images/social/grooveshark_32.png"></a></li>
				<li><a href="/apps/gowalla"><img alt="Gowalla" src="/static/images/social/gowalla_32.png"></a></li>
				<li><a href="/apps/rdio"><img alt="Rdio" src="/static/images/social/rdio_32.png"></a></li>
				<li><a href="/apps/steam"><img alt="Steam" src="/static/images/social/steam_32.png"></a></li>
				<li><a href="/apps/tumblr"><img alt="Tumblr" src="/static/images/social/tumblr_32.png"></a></li>
				<li><a href="/apps/lastfm"><img alt="LastFM" src="/static/images/social/lastfm_32.png"></a></li>
				<li><a href="/apps/vimeo"><img alt="Vimeo" src="/static/images/social/vimeo_32.png"></a></li>
			</ul>
		</div>
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
<script type="text/javascript" src="/static/js/omni.js"></script>

<!--
<script type="text/javascript" src="/static/js/core/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="/static/js/core/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="/static/js/core/jquery.validate.min.js"></script>
<script type="text/javascript" src="/static/js/core/handlebars.1.0.0.beta.3.js"></script>
<script type="text/javascript" src="/static/js/core/history.adapter.jquery.js"></script>
<script type="text/javascript" src="/static/js/core/history.js"></script>
<script type="text/javascript" src="/static/js/core/jquery.scrollto.min.js"></script>
<script type="text/javascript" src="/static/js/core/2.3.0-crypto-sha1.js"></script>
<script type="text/javascript" src="/static/js/core/jquery.cookie.js"></script>
<script type="text/javascript" src="/static/js/core/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/static/js/core/spin.min.js"></script>
<script type="text/javascript" src="/static/js/core/keepab.js"></script>
<script type="text/javascript" src="/static/js/helpers.js"></script>
<script type="text/javascript" src="/static/js/default.js"></script>
<script type="text/javascript" src="/static/js/config.js"></script>
-->
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</body>
</html>