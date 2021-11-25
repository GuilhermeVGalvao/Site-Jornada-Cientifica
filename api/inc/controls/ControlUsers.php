<?php

class ControlUsers extends ControlRoot{
    
    //=============================================
    //  Usuario
    //=============================================
    
    // cria um novo usuario na db
    public function new() {

        $values = (object) Validation::filter($this->app->post, [
            'user' => 'string',
            'password' => 'string'
        ]);

        // verifica senha é md5, pelo tamanho da string
        if (strlen($values->password) < 20) {
            $this->view->erro("Senha não criptografada encontrada", "md5_error", true);
        }

        if ($this->model->users->createUser($values->user, $values->password)) {
            $this->view->sucesso(true);
        }

        $this->view->erro("Erro ao criar usuário", "server_error", true);
        
    }
    
}