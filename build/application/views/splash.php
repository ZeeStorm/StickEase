<!DOCTYPE html>
<html>
<head>
	<title>Stage.io - The web's first actions API.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link href="/static/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" media="all" type="text/css" href="/static/css/reset.css">
	<link rel="stylesheet" media="all" type="text/css" href="/static/css/splash.css">
</head>
<body>

<section>
	<img alt="Stage.io" src="/static/images/splash/logo.png">

	<div id="stage" class="loading">
	</div>

	<p id="intro">Introducing the web&rsquo;s first actions API. Now in private beta.</p>
	<div id="twitter"><a href="http://twitter.com/stageio"><img src="/static/images/splash/twitter.png"></a></div>
</section>
<script id="stage_templ" type="text/x-handlebars-template">
	<div class="icon"><a href="http://{{app_domain}}/"><img alt="{{app_name}}" src="{{app_logo}}"></a></div>
	<div class="meta">
		<p class="action">{{{action}}}</p>
		<p class="timestamp">{{timestamp}}</p>
	</div>
</script>
<script type="text/javascript" src="/static/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="/static/js/handlebars.1.0.0.beta.3.js"></script>
<script type="text/javascript" src="/static/js/splash.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21154194-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>