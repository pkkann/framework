<?php
class UserCtrl extends Controller {

    public function __construct() {
        
    }
     
    public function overview() {
        $data = ["lol" => "tis"];
        $this->loadView("user/OverviewView", $data);
    }

    public function users() {
        header('Content-Type: application/json');
        echo json_encode(array(
            "data" => [
                ['id' => 1, 'firstname' => "Patrick", 'lastname' => "Kann", 'age' => "28"]
            ]
        ));
    }

}