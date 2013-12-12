<? View::set_title('An Oasis Project'); ?>
<!DOCTYPE html>
<html>
	<head>
		{var{stylesheets}}
		<title>{var{title}}</title>
	</head>
	<body>
		<?= render($controller, $view, $params); ?>
		{var{javascript}}
	</body>
</html>