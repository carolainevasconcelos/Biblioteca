<?php
require_once 'Conexao.php';  

class ClassAutorDAO {

    public function cadastrar(ClassAutor $autor) {
        try {
            $conexao = Conexao::getInstance();

            $sql = "INSERT INTO autores (nome) VALUES (?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("s", $autor->getNome());

            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erro ao cadastrar autor: " . $e->getMessage();
            return false;
        }
    }

    public function listarAutores() {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM autores ORDER BY nome ASC"; 
            $result = $conexao->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $exc) {
            echo "Erro ao listar autores: " . $exc->getMessage();
            return [];
        }
    }

    public function buscarPorId($id) {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM autores WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id);  
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_assoc();
        } catch (Exception $exc) {
            echo "Erro ao buscar autor: " . $exc->getMessage();
            return null;
        }
    }

    public function atualizar(ClassAutor $autor) {
        try {
            $conexao = Conexao::getInstance();

            $sql = "UPDATE autores SET nome = ? WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("si", $autor->getNome(), $autor->getId());

            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erro ao atualizar autor: " . $e->getMessage();
            return false;
        }
    }

    public function excluir($id) {
        try {
            $conexao = Conexao::getInstance();

            $sql = "DELETE FROM autores WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id);  

            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erro ao excluir autor: " . $e->getMessage();
            return false;
        }
    }
}
?>
