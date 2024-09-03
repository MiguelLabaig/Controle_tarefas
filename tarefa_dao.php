<?php

require "conexao.php";
require "tarefa.php";


class TarefaDAO{



    public function salvar($tarefa){
        try{
        //CONXAO
        $conexao = new Conexao();
        
        //CONECTA
        $connection = $conexao->getConnection();

        //CRIA O SQL
        $SQL = "INSERT INTO tarefa(titulo, descricao) values(:titulo, :descricao)";


        $stmt = $connection->prepare($SQL);
        $stmt->bindParam(':titulo', $tarefa->getTitulo());
        $stmt->bindParam(':descricao', $tarefa->getDescricao());
        $stmt->execute();
        return "tarefa cadastrada com sucesso";
        }
    catch(PDOException $error){
        return $error->getMessage();
    }
}

    public function getTodas(){

        try{
            $conexao = new conexao();
            $connection = $conexao->getConnection();
            $SQL = "SELECT * from tarefas.tarefa";
            $stmt = $connection->prepare($SQL);
            $stmt->execute();

            $result = $stmt->fetchAll();
            return $result;
        }
            
        catch(PDOException $error){
                return $error->getMessage();
            }
        }

    

    public function getPorId($id){
        try{
            //conexao
            $conexao = new conexao();

            //conecta
            $connection = $conexao->getConnection();
            
            //criando a consulta
            $SQL = "select * from tarefa where tarefa.id = :id";

            $stmt = $connection->prepare($SQL);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;      
        }catch(PDOException $error){
            return $error->getMessage();
        }
    }

    public function editar($tarefa){
        try{
        //conexao
        $conexao = new conexao();
    
        //conecta
        $connection = $conexao->getConnection();

        $SQL = "update tarefa set titulo = :titulo, descricao = :descricao where tarefa.id = :id";

        //prepara a consulta
        $stmt = $connection->prepare($SQL);
        $stmt->bindParam(':id', $tarefa->getId());
        $stmt->bindParam(':titulo', $tarefa->getTitulo());
        $stmt->bindParam(':descricao', $tarefa->getDescricao());
        $stmt->execute();
        return "editado com sucesso";

        //cria o sql
        }catch(PDOException $error){
            return $error->getMessage();
        }

    }

    public function excluir($id){

        try{
            $conexao = new conexao();

            $connection = $conexao->getConnection();

            $SQL = "delete from tarefa where id = :id";

            $stmt = $connection->prepare($SQL);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return "tarefa de id:".$id ."excluida com sucesso.";
        }catch(PDOException $error){
            return $error->getMessage();
        }


    }

}

?>