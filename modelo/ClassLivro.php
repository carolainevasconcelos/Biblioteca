<?php
class ClassLivro {
    private $id;
    private $titulo;
    private $ibsn;
    private $ano;
    private $genero;
    private $editora;
    private $descricao;
    private $autorId;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getIbsn() {
        return $this->ibsn;
    }

    public function setIbsn($ibsn) {
        $this->ibsn = $ibsn;
    }

    public function getAno() {
        return $this->ano;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function getEditora() {
        return $this->editora;
    }

    public function setEditora($editora) {
        $this->editora = $editora;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getAutorId() {
        return $this->autorId;
    }

    public function setAutorId($autorId) {
        $this->autorId = $autorId;
    }
}
