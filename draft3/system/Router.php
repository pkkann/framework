<?php
class Router extends Singleton {

    public function route() {
        if( isset($_GET['module']) && isset($_GET['action']) ) {
            
            // Get parameters
            $params = $_GET;
            array_shift($params);
            array_shift($params);

            // Check module exists
            $moduleUrl = "../app/modules/".$_GET['module'];
            if( !file_exists($moduleUrl) ) {
                throw new RouterException("Module '".$_GET['module']."' not found");
            }

            // Check routes file exists
            $routesUrl = $moduleUrl."/routes.json";
            if( !file_exists($routesUrl) ) {
                throw new RouterException("Routes file is missing in module '".$_GET['module']."'");
            }

            // Load routes file
            $routes = json_decode(file_get_contents($routesUrl));

            // Check action
            if( !isset($routes->{$_GET['action']}) ) {
                throw new RouterException("Action not found '".$_GET['action']."' in module '".$_GET['module']."'");
            }
            $action = $routes->{$_GET['action']};
            $this->validateAction($action);

            // Check views folder exists
            $viewsUrl = $moduleUrl."/views";
            if( !file_exists($viewsUrl) ) {
                throw new RouterException("Views folder is missing in module '".$_GET['module']."'");
            }

            // Instantiate plates engine
            $plates = new League\Plates\Engine();
            $plates->addFolder('layouts', '../app/layouts');
            $plates->addFolder('views', $viewsUrl);

            // Check controller exists
            $controllerUrl = $moduleUrl."/".$action->controller.".php";
            if( !file_exists($controllerUrl) ) {
                throw new RouterException("Controller file '".$action->controller."' is missing in module '".$_GET['module']."'");
            }
            require $controllerUrl;
            if( !class_exists($action->controller) ) {
                throw new RouterException("Controller '".$action->controller."' seems to be wrongly named in controller file in module '".$_GET['module']."'");
            }
            $controller = new $action->controller($plates);

            // Check method exists
            if( !method_exists($controller, $action->method) ) {
                throw new RouterException("Method '".$action->method."' was not found in controller '".$action->controller."' in module '".$_GET['module']."'");
            }

            // Call action
            if( call_user_func_array( array($controller, $action->method), $params ) === FALSE ) {
                throw new RouterException("Method '".$action->method."' could not be called in controller '".$action->controller."' in module '".$_GET['module']."'");
            }

        } else {
            // Go to default route
            header("location: ".$GLOBALS['base_url']."?module=".$GLOBALS['defaultRoute'][0]."&action=".$GLOBALS['defaultRoute'][1]);
            die();
        }
    }

    private function validateAction($action) {
        if( !isset($action->controller) || empty(trim($action->controller)) ) {
            throw new RouterException("Controller attribute is missing or empty for action '".$_GET['action']."' in module '".$_GET['module']."'");
        } else if( !isset($action->method) || empty(trim($action->method)) ) {
            throw new RouterException("Method attribute is missing or empty for action '".$_GET['action']."' in module '".$_GET['module']."'");
        }
    }

}