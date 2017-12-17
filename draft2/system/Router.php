<?php
class Router extends Singleton {

    public function module() {
        return ( isset($_GET['module']) ? $_GET['module'] : null );
    }

    public function action() {
        return ( isset($_GET['action']) ? $_GET['action'] : null );
    }

    public function params() {
        if(count($_GET) > 2) {
            $params = $_GET;
            array_shift($params);
            array_shift($params);
            return $params;
        } else {
            return array();
        }
    }

    public function route() {
        if( isset($_GET['module']) && isset($_GET['action']) ) {
            $module = $this->module();
            $action = $this->action();
            $params = $this->params();
            
            $module_dir = "../app/modules/".$module."/";

            if(!file_exists($module_dir)) {
                throw new RouterException("Module '".$module."' not found");
            }

            $routes = json_decode( file_get_contents($module_dir."routes.json"), true );
            if( isset($routes[$action]) ) {
                $route = $routes[$action];
                $ctrl_path = $module_dir.$route['controller'].".php";
                if(file_exists($ctrl_path)) {
                    require $ctrl_path;
                    $ctrl = new $route['controller']();
                    if(method_exists($ctrl, $route['method'])) {
                        call_user_func_array( array($ctrl, $route['method']), $params );
                    } else {
                        throw new RouterException("Method '".$route['method']."' not found");
                    }
                } else {
                    throw new RouterException("Controller '".$route['controller']."' not found");
                }
            } else {
                throw new RouterException("Action '".$action."' not found");
            }
        } else {
            header("Location: ".$GLOBALS['base_url']."?module=".$GLOBALS['defaultRoute'][0]."&action=".$GLOBALS['defaultRoute'][1]);
            die();
        }
    }

}