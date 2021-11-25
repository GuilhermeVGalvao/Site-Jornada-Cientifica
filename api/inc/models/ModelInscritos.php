<?php

class ModelInscritos extends ModelRoot {

    //-------------------------------------------------------------------
    //   CADASTROS 
    //-------------------------------------------------------------------

    public function createInscrito(string $nome, string $email, string $sexo) {

        try {

            $stmt = $this->pdo->prepare("INSERT INTO inscritos (nome, email, sexo) VALUES (:nome, :email, :sexo)");
            $stmt = $this->db->bindArray($stmt, [
                'nome' => $nome,
                'email' => $email,
                'sexo' => $sexo
            ]);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }

            return false;

        } catch (PDOException $erro) {
            $this->view->erro('Erro ao adicionar inscrito', 'db_model', true);
        }

    }

    public function readInscritos() {

        try {

            $stmt = $this->pdo->prepare("SELECT * FROM inscritos");
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }

            return [];

        } catch (PDOException $erro) {
            $this->view->erro('Erro ao ler inscritos', 'db_model', true);
        }

    }

    public function updateInscrito(int $id, string $nome, string $email, string $sexo) {

        try {

            $stmt = $this->pdo->prepare("UPDATE inscritos SET nome = :nome, email = :email, sexo = :sexo WHERE id = :id");
            $stmt = $this->db->bindArray($stmt, [
                'id' => $id,
                'nome' => $nome,
                'email' => $email,
                'sexo' => $sexo
            ]);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }

            return false;

        } catch (PDOException $erro) {
            $this->view->erro('Erro ao atualizar inscrito', 'db_model', true);
        }

    }

    public function deleteInscrito(int $id) {

        try {

            $stmt = $this->pdo->prepare("DELETE FROM inscritos WHERE id = :id");
            $stmt = $this->db->bindArray($stmt, [
                'id' => $id
            ]);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }

            return false;

        } catch (PDOException $erro) {
            $this->view->erro('Erro ao deletar inscrito', 'db_model', true);
        }

    }
  
    
}