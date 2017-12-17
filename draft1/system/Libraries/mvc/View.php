<?php
abstract class View {

    public function __construct($data = null) {
        if(isset($data)) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }
    
    public abstract function output();

}