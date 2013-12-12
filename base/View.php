<?

class View {
	public static $includes = array();
	public static $title = '';

	public static function add_include($path, $type) {
		self::$includes[$type][] = $path;
	}

	public static function render($html) {
		$html = preg_replace('/\{var\{stylesheets\}\}/', self::render_css(), $html);
		$html = preg_replace('/\{var\{javascript\}\}/',	self::render_js(), $html);
		$html = preg_replace('/\{var\{title\}\}/', self::render_title(), $html);
		echo $html;
	}

	public static function render_js() {
		if (!array_key_exists('js', self::$includes)) return '';

		$includes = array();
		foreach (self::$includes['js'] as $path) {
			$includes[] = '<script src="'.$path.'"></script>';
		}
		return implode("\n", $includes);
	}

	public static function render_css() {
		if (!array_key_exists('css', self::$includes)) return '';

		$includes = array();
		foreach (self::$includes['css'] as $path) {
			$includes[] = '<link rel="stylesheet" href="'.$path.'"/>';
		}
		return implode("\n", $includes);
	}

	public static function render_title() {
		return self::$title;
	}

	public static function set_title($title) {
		self::$title = $title;
	}
}