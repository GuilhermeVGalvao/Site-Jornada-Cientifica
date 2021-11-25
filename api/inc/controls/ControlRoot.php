<?php

class ControlRoot {

    public $model;
    public $view;
    public $base;
    public $control;
    public $app;
    public $args;

    public function __construct($args) {
        
        $this->model = new Model();
        $this->view = new View();
        $this->app = new App();
        $this->args = $args;
        $this->control = new Control($args);

    }

}