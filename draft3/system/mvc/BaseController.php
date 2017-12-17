<?php
class BaseController {
    
    protected $plates;

    public function __construct(League\Plates\Engine $plates) {
        $this->plates = $plates;
    }
}