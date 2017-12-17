<?php
abstract class Controller {

    protected function loadView($module, $view, $data = null, $raw = false) {
        $path = "../app/modules/".$module."/views/".$view.".php";
        if(file_exists($path)) {
            require $path;
            $view = new $view($data);
            $content = $view->output();

            if($raw) {
                return $content;
            } else {
                $this->output($content);
            }
        } else {
            throw new ViewException("View not found");
        }
    }

    private function output($content) {
        $data = array("content" => $content);
        echo $this->loadView("layout", "MainView", $data, true);
    }

}