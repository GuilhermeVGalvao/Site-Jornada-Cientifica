<?php

class View {

    private $body;

    // Gera um erro 
	public function erro($describe, $code, $send=false){

		// configura erro
		$this->body = ["error" => $describe, "code" => $code];
        
        if ($send) {
            $this->show();
        }

        return $this;

	}

	// Retorna sucesso
	public function sucesso($send=false) {

        $this->body = ["status" => "OK", "code" => 200];

        if ($send) {
            $this->show();
        }

        return $this;
        
    }
    
    // Retorna lista de dados
	public function send(Array $array, $send=false) {
		
        $this->body = $array;
        
        if ($send) {
            $this->show();
        }

        return $this;
        
    }

	// Apresenta view
	public function show() {
		
		echo json_encode($this->body);

		// para a execução
        exit();
        
    }

    // Verifica se é um erro
	public function is_erro() {
		
        if (isset($this->body["error"])) {
            return true;
        }
        
        return false;
        
    }
    
    // Verifica se é sucesso
	public function is_sucesso() {
		
        if (isset($this->body["code"]) && isset($this->body["status"])) {
            if ($this->body["code"] == 200) {
                return true;
            }
        }
        
        return false;
        
    }

    // Verifica se são dados
	public function is_send() {
		
        if (!$this->is_erro() && !$this->is_sucesso()) {
            return true;
        }
        
        return false;
        
    }

    // REtorna dados guardados
	public function get() {
		
        return $this->body;
        
    }
    
}