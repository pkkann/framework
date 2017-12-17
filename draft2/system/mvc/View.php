<?php
abstract class View {

    protected $data;

    public function __construct($data = null) {
        $this->data = $data;
    }

    public abstract function output();

}