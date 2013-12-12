<?

class portfolio_controller extends Controller {
	
	public function index() {
		foreach (glob(VIEW_DIR.'/portfolio/*.php') as $file)
			$this->files[] = str_replace('.php', '', basename($file));
	}
}