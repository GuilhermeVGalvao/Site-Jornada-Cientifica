<?php

class Database {
    
    //url do server
    private $servername;
    //usuario mysql
    private $username;
    //senha do usuario mysql
    private $password;
    //banco de dados a ser usado
    private $db;
    
    // Cria conexão com a db
    private $conn;

    private $view;

    function __construct() {

        $this->view = new View();
        
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->db = "jornadaABGG";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->db};charset=utf8", $this->username, $this->password);
        } catch (PDOException $erro) {
            $this->view->erro("Erro ao conectar com o banco de dados", "db_error", true);
        }

    }

    public function __get($value) {

        if ($value == 'conn') {
            return $this->conn;
        } else {
            $this->view->erro("Sem permissão para acessar variável", "db_forbbiden", true);
        }

    }

    public function safe($value) {

		if (is_null($value)) {
			return false;
		} elseif (empty($value)) {
			return false;
		}

        return htmlspecialchars(trim($value));
        
    }
    
    public function bindArray(PDOStatement $stmt, Array $array) : PDOStatement {
    
        //PDO::PARAM_STR
        
        foreach ($array as $key => $value) {
            $stmt->bindValue(":$key", $this->safe($value));
        }

        return $stmt;

    }

}