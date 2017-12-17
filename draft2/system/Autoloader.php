<?php
class Autoloader {

    public static function register() {
        spl_autoload_register(function($class) {
            $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("../system/", RecursiveDirectoryIterator::SKIP_DOTS));
            foreach($objects as $name => $object){
                $info = pathinfo($name);
                if( strtolower($info['filename']) == strtolower($class) ) {
                    $filename = $info['dirname']."/".$info['filename'].".".$info['extension'];
                    if( file_exists( $filename ) ) {
                        require $filename;
                    }
                }
            }
        });
    }

}