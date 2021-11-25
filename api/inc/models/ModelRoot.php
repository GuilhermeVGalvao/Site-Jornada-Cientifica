<?php

class ModelRoot {

    public function __construct(Database $db=null) {

        $this->view = new View();
        $this->model = new Model();

        if (is_null($db)) {
            $this->db = new Database();
        } else {
            $this->db = $db;
        }

        $this->pdo = $this->db->conn;

    }

}