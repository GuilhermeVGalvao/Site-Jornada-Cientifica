<?php

class App {

    private $post;
    private $files;
    private $get;
    private $server;

    function __construct() {
        
        if(!$this->post = json_decode(file_get_contents('php://input'), true)) {
            $this->post = [];
        }

        $this->files = $_FILES;
        $this->get = $_GET;
        $this->server = $_SERVER;

    }

    public function __get($value) {
        return $this->$value;
    }

}