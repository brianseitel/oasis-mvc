<?

class Router {
	
	public static function route() {
		$request_uri = fetch($_SERVER, 'REQUEST_URI');

		$parts = array_values(array_filter(explode("/", $request_uri)));
		$view_file = $view_name = $controller = null;

		if (count($parts) === 0) {
			$controller = 'home';
			$view_name = 'index';
		} elseif (count($parts) === 1) {
			$controller = $parts[0];
			$view_name = 'index';
		} elseif (count($parts) === 2) {
			list($controller, $view_name) = $parts;
		}	

		if (in_array($controller, array('js', 'css'))) {
			if (file_exists($file = "{$controller}/{$view_name}"))
				header('Content-type: text/'.$controller);
				include($file);
			exit;
		} else
			return render('layout', 'html', array('controller' => $controller, 'view' => $view_name));
	}
}