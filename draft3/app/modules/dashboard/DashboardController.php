<?php
class DashboardController extends BaseController {
    
    public function index() {
        echo $this->plates->render('views::test');
    }

}