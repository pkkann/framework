<?php
class App {

    public function run() {
        require '../app/config.php';
        require '../system/Autoloader.php';
        Autoloader::load();
        if($GLOBALS['debug']) {
            Router::instance()->route();
        } else {
            try {
                Router::instance()->route();
            } catch ( JellyException $e ) {
                require '../system/errorpages/404_pagenotfound.php';
                die(1);
            }
        }
        
    }

}