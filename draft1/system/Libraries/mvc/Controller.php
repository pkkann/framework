<?php
abstract class Controller {
    
    protected function loadView($path, $data = null, $raw = false) {
        require '../app/views/'.$path.".php";
        
        $path = explode("/", $path);
        $name = end($path);
        $view = new $name($data);
        if($raw) {
            return $view->output();
        } else {
            $this->output($view->output());
        }
    }

    protected function loadModel($path) {
        require '../app/models/'.$path.".php";
        
        $path = explode("/", $path);
        $name = end($path);
        $this->{$name} = new $name();
    }

    protected function output($content) {
        $data = ['content' => $content, 'head' => $this->loadView("layout/HeadView", null, true)];

        echo $this->loadView("layout/MainView", $data, true);
    }

}