<html>
<head>
	<title>Stage.io: API Test</title>
	<script type="text/javascript" src="/static/js/jquery-1.6.4.min.js"></script>
	<script type="text/javascript" src="/static/js/test.js"></script>
	<link href="/static/css/reset.css" rel="stylesheet" type="text/css">
	<link href="/static/css/test.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="test" class="clearfix">
		<ul>
			<?
			foreach ( $forms as $key => $form )
			{
				?><li><a href="#" data-api_id="<?= str_replace('/', '_', $key ) ?>"><?= $key ?><?= ( isset( $form['protected'] ) && $form['protected'] === true ) ? ' <small>(protected)</small>' : ''?></a></li><?
			}
			?>
		</ul>
		<div class="container">
			<div class="api">
				<?
				foreach ( $forms as $key => $form )
				{
					?><form action="/<?= $controller ?>/<?= $pw ?>/<?= $key ?>" method="post" id="<?= str_replace('/', '_', $key ) ?>">
						<h2><?= $key ?></h2>
						<dl class="clearfix">
							<?
							foreach ( $form['fields'] as $name => $field )
							{
								if ( !isset( $field['id'] ) )
								{
									$field['id'] = $name;
								}
								
								?>
								<dd<?= ( isset( $field['optional'] ) && $field['optional'] === true ) ? ' class="optional"' : '' ?>><label for="<?= $field['id'] ?>"><?= $name ?></label></dd>
								<dt><input type="text" name="<?= $name ?>" id="<?= $field['id'] ?>" size="41"<?= ( isset( $field['value'] ) && !empty( $field['value'] ) ) ? ' value="' . htmlspecialchars($field['value']) . '"' : '' ?>></dt>
								<?
							}
							?>
						</dl>
						<p><button type="submit">submit</button></p>
					</form>
					<?
				}
				?>
			</div>
			<div class="response">
				<h2>response from api:</h2>
				<pre></pre>
			</div>
		</div>
	</div>
</body>
</html>