<?php
class App {

    public function run() {
        require '../app/config.php';
        require '../system/Libraries/Autoload.php';
        Autoload::register();
        Router::instance()->route();
    }

}