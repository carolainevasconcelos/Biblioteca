<?php
require_once 'Conexao.php';  

class ClassLivroDAO {
    
    public function cadastrar(ClassLivro $livro) {
        try {
            $conexao = Conexao::getInstance();

            $sql = "INSERT INTO livros (titulo, ibsn, ano, genero, editora, descricao, autor_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("ssisssi", 
                $livro->getTitulo(), 
                $livro->getIbsn(), 
                $livro->getAno(), 
                $livro->getGenero(), 
                $livro->getEditora(), 
                $livro->getDescricao(), 
                $livro->getAutorId()  
            );

            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erro ao cadastrar livro: " . $e->getMessage();
            return false;
        }
    }

    public function listarLivros() {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT livros.id, livros.titulo, livros.ibsn, livros.ano, livros.genero, 
                           livros.editora, livros.descricao, autores.nome AS autor 
                    FROM livros 
                    LEFT JOIN autores ON livros.autor_id = autores.id
                    ORDER BY livros.titulo DESC"; 
            $result = $conexao->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $exc) {
            echo "Erro ao listar livros: " . $exc->getMessage();
            return [];
        }
    }

    public function buscarPorId($id) {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT livros.id, livros.titulo, livros.ibsn, livros.ano, livros.genero, 
                           livros.editora, livros.descricao, livros.autor_id, autores.nome AS autor 
                    FROM livros 
                    LEFT JOIN autores ON livros.autor_id = autores.id 
                    WHERE livros.id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id);  
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_assoc();
        } catch (Exception $exc) {
            echo "Erro ao buscar livro: " . $exc->getMessage();
            return null;
        }
    }

    public function atualizar(ClassLivro $livro) {
        try {
            $conexao = Conexao::getInstance();

            $sql = "UPDATE livros 
                    SET titulo = ?, ibsn = ?, ano = ?, genero = ?, editora = ?, descricao = ?, autor_id = ?
                    WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("ssisssii", 
                $livro->getTitulo(), 
                $livro->getIbsn(), 
                $livro->getAno(), 
                $livro->getGenero(), 
                $livro->getEditora(), 
                $livro->getDescricao(), 
                $livro->getAutorId(), 
                $livro->getId()  
            );

            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erro ao atualizar livro: " . $e->getMessage();
            return false;
        }
    }

    public function excluir($id) {
        try {
            $conexao = Conexao::getInstance();

            $sql = "DELETE FROM livros WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id);  

            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erro ao excluir livro: " . $e->getMessage();
            return false;
        }
    }
}
?>
