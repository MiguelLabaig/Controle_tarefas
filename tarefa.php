<?php

class Tarefa{

    private $titulo;
    private $descricao;

    private $id;

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function getTitulo(){
        return $this->titulo;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function getDescricao(){
        return $this->descricao;
    }
}




?>