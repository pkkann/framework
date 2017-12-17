<?php
class UsersController extends Controller {

    public function overview() {
        $this->loadView("users", "OverviewView");
    }

}