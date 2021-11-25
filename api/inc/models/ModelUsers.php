<?php

class ModelUsers extends ModelRoot {

    //-------------------------------------------------------------------
    //   CADASTROS 
    //-------------------------------------------------------------------

    public function createUser(string $user, string $md5pass) {
        
        // criptografia secundaria
        $md5nova = md5(base64_encode(md5($md5pass)));
        
        // insere em table login
        try {

            $stmt = $this->pdo->prepare("INSERT INTO `login`(`user`, `senha`) VALUES (:user, :senha)");
            $stmt = $this->db->bindArray($stmt, [
                'user' => $user,
                'senha' => $md5nova
            ]);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                return true;

            }

        } catch (PDOException $erro) {
            $this->view->erro('Erro ao criar login de usuário', 'db_model', true);
        }

        return false;

    }

    public function getUser(int $id) {
            
        try {

            $stmt = $this->pdo->prepare("SELECT id FROM `login` WHERE `id` = :id");
            $stmt = $this->db->bindArray($stmt, [
                'id' => $id
            ]);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                return $stmt->fetch(PDO::FETCH_OBJ);

            }

            return false;

        } catch (PDOException $erro) {
            $this->view->erro('Erro ao buscar login de usuário', 'db_model', true);
        }

        return false;

    }
    
}