<?php

class ControlInscritos extends ControlRoot{
    
    //=============================================
    //  inscrito
    //=============================================
    
    // cria um novo inscrito na db
    public function new() {

        $values = (object) Validation::filter($this->app->post, [
            'nome' => 'string',
            'email' => 'string',
            'sexo' => 'string'
        ]);

        if ($this->model->inscritos->createInscrito($values->nome, $values->email, $values->sexo)) {
            $this->view->sucesso(true);
        }

        $this->view->erro("Erro ao criar inscrito", "server_error", true);
        
    }

    // atualiza um inscrito na db
    public function update() {

        $values = (object) Validation::filter($this->app->post, [
            'id' => 'int',
            'nome' => 'string',
            'email' => 'string',
            'sexo' => 'string',
            'token' => 'string'
        ]);

        $this->control->login->checkToken($values->token);

        if ($this->model->inscritos->updateInscrito($values->id, $values->nome, $values->email, $values->sexo)) {
            $this->view->sucesso(true);
        }

        $this->view->erro("Erro ao atualizar inscrito", "server_error", true);
        
    }

    // deleta um inscrito na db
    public function delete() {

        $values = (object) Validation::filter($this->app->post, [
            'id' => 'int',
            'token' => 'string'
        ]);

        $this->control->login->checkToken($values->token);

        if ($this->model->inscritos->deleteInscrito($values->id)) {
            $this->view->sucesso(true);
        }

        $this->view->erro("Erro ao deletar inscrito", "server_error", true);
        
    }

    // listar todos os inscritos
    public function list() {

        $token = Validation::filter($this->app->post, ['token' => 'string'])["token"];
        $this->control->login->checkToken($token);

        $this->view->send($this->model->inscritos->readInscritos(), true);


    }

    // listar um inscrito
    public function get() {

        $values = (object) Validation::filter($this->app->post, [
            'id' => 'int',
            'token' => 'string'
        ]);

        $this->control->login->checkToken($values->token);

        $this->view->send($this->model->inscritos->readInscrito($values->id), true);

    }
    
}