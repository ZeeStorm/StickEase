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
<body id="stage" class="<?= ( isLoggedIn() ? "signed_in" : "signed_out" ) ?>">
<section id="header_wrapper">
	<header>
		<?= $nav ?>
	</header>
</section>
<section id="subheader_wrapper">
	<header>
		<?= $header ?>
	</header>
</section>
<section id="content_wrapper">
	<div id="content">
	
	<?= $yield ?>

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

<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</body>
</html>