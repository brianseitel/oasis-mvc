<?

class layout_controller extends Controller {
	
	public function html() {
		$this->controller = fetch($this->parameters, 'controller');
		$this->view 	  = fetch($this->parameters, 'view');

		View::add_include('css/global.css', 'css');
	}
}