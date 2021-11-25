<?php

class ModelLogin extends ModelRoot {

    //--------------------------------------------------------------------------
    //  TOKEN UTILS
    //--------------------------------------------------------------------------

    // faz login e retorna usuario
    public function login(string $user, string $senha) {

        //criptografia secundaria
        $senha = md5(base64_encode(md5($senha)));

        try {

            $stmt = $this->pdo->prepare(
                "SELECT id FROM `login` WHERE user = :user AND senha = :senha"
            );
            $stmt = $this->db->bindArray($stmt, [
                'user' => $user,
                'senha' => $senha
            ]);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                $res = $stmt->fetch(PDO::FETCH_OBJ);

                return $res->id;

            } 

        } catch (PDOException $erro) {
            $this->view->erro('Erro ao executar query de login', 'db_model', true);
        }

        return false;

    }

}