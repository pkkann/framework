<?php
class LayoutController extends BaseController {

    public function init() {
        $this->loadHelper("url");

        $this->plates->registerFunction("action", function($module, $action) {
            return $this->url->action($module, $action);
        });

        $this->plates->registerFunction("menuActive", function($module, $action) {
            if($this->url->currentModule() == $module && $this->url->currentAction() == $action) {
                return "active";
            }
        });
    }

}