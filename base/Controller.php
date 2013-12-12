<?

class Controller {
    public $_view;
    protected $params;
 
    public function render($controller_name, $view_name, $params = array()) {
        $controller_file = CONTROLLER_DIR.'/controller.'.$controller_name.'.php';
        $controller_class= $controller_name.'_controller';

        $view_file = VIEW_DIR.'/'.strtolower($controller_name).'.'.$view_name.'.php';
        if (!file_exists($view_file))
            $view_file = VIEW_DIR.'/'.strtolower($controller_name).'/'.$view_name.'.php';
        
        if (file_exists($controller_file)) {
            require_once($controller_file);
            $controller = new $controller_class;
     
            $controller->_view = $view_name;
     
            ob_start();
     
            $view = $controller->dispatch($params);
     
            extract((array)$view);
        }

        if (is_file($view_file))
            include($view_file);

        $html = ob_get_clean();
        return $html;
    }

     public function dispatch($params) {
        $this->parameters = $params;
 
        if (method_exists($this, $this->_view))
              call_user_func(array($this, $this->_view));
 
        $defined_vars = get_defined_vars();
        $these_vars = array();
        foreach ($defined_vars['this'] as $key => $value)
             $these_vars[$key] = $value;
 
        return $these_vars;
    }
}

function render($controller_name, $view_name, $params = array()) {
    return call_user_func_array(array('Controller', 'render'), array($controller_name, $view_name, $params));
}