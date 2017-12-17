<?php
class Router extends Singleton {

    private $routes;

    protected function __construct() {
        $this->routes = array(
            "users" => ['ctrl' => "UserCtrl", 'method' => "overview", 'default' => true],
            "usersjson" => ['ctrl' => "UserCtrl", 'method' => "users"]
        );
    }

    public function route() {
        if(isset($_GET['route'])) {
            $action = $_GET['route'];
            $params = $_GET;
            array_shift($params);

            if(isset($this->routes[$action])) {
                $route = $this->routes[$action];

                require '../app/controllers/'.$route['ctrl'].".php";
                
                $ctrl = new $route['ctrl']();
                call_user_func_array( array($ctrl, $route['method']), $params );
            } else {
                echo "Route not found";
                die(1);
            }
        } else {
            foreach ($this->routes as $key => $route) {
                if(isset($route['default'])) {
                    header("location:".$GLOBALS['base_url']."?route=".$key);
                    die();
                }
            }
            echo "No route set, and no default route found";
            die(1);
        }
    }

}