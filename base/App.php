<?

class App {
	
	public static function startup() {
		spl_autoload_register(array('App','autoload'));

		define('BASE_DIR', ROOT_DIR.'base');
		define('CLASS_DIR', ROOT_DIR.'classes');
		define('CONTROLLER_DIR', ROOT_DIR.'controllers');
		define('VIEW_DIR', ROOT_DIR.'views');

		new Controller();

		View::render(Router::route());
	}

	public static function autoload($class_name) {
		if (file_exists($path = BASE_DIR.'/'.$class_name.'.php'))
			require_once($path);
		elseif (file_exists($path = CLASS_DIR.'/'.$class_name.'.php'))
			require_once($path);
		elseif (file_exists($path = CONTROLLER_DIR.'/controller.'.$class_name.'.php'))
			require_once($path);
		else
			return false;
	}
}

function pp($a) { echo "<pre>".print_r($a, 1).'</pre>'; }
function pd($a) { pp($a); die(); }
function fetch($arr, $key, $default = null) { return array_key_exists($key, $arr) ? $arr[$key] : null; }