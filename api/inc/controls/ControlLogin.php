<?php

class ControlLogin extends ControlRoot{
    
    //=============================================
    //  Token / Login
    //=============================================

    // faz login e retorna usuario
    public function access() {

        $values = (object) Validation::filter($this->app->post, [
            'user' => 'string',
            'senha' => 'string',
        ]);

        if($user = $this->model->login->login($values->user, $values->senha)) {

            $json = ["token" => $this->getToken($user)];
            $this->view->send($json, true);

        } 

       $this->view->erro("Email ou senha incorretos", "login_error", true);

    }

    // Retorna token
    public function getToken(int $user) {
        
        $token = JWT::encode(['user' => $user], SYSTEMKEY);

        return $token;
        
    }

    // verifica token
    public function checkToken(string $token) {

        if ($payload = JWT::decode($token, SYSTEMKEY)) {

            if ($user = $this->model->users->getUser($payload->user)) {
                return $user;
            }

        }
        
        $this->view->erro("Acesso negado", "invalid_token", true);
    }
    
}