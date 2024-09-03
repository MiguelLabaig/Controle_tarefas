<?php
require "tarefa_dao.php";

//var_dump($_SERVER['REQUEST_METHOD']);
//echo $_POST['method'];
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['method'])){

    $method = $_GET['method'];
    if(method_exists('TarefaController', $method)){
        $tarefaController = new TarefaController();
        $tarefaController->$method($_GET);
    }else{

    echo 'Método não existe';
}
}else if($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_GET['method'])){

    //$method = $_POST['method'];
    $method = $_GET['method'];
    if(method_exists('TarefaController', $method)){
        $tarefaController = new TarefaController();
        $tarefaController->$method($_POST);

       
    }else{

    echo 'Método não existe';
}
}
class TarefaController{
    public function index(){
        header('Location: index.php');
    }
    public function novaTarefa(){
        header('location: nova_tarefa.php');
    }
    public function listarTarefa(){
        header('location: listar_tarefa.php');
    }
    public function salvar(){
      try{
        //recupera os dados da requisição
        $titulo = filter_input(INPUT_POST, 'titulo');
        $descricao = filter_input(INPUT_POST, 'descricao');
       
        // cria o objeto
        $t = new Tarefa();
        $t->setTitulo($titulo);
        $t->setDescricao($descricao);
        //cria o dao 
        $tarefaDAO = new TarefaDAO();
        //salva
        $tarefaDAO->salvar($t);
        //devolve pra view
       header('location: listar_tarefa.php');
      }catch(Exception $exception){
        echo $exception->getMessage();  
    }

    



}

    public function getTodas(){
        $tarefaDAO = new TarefaDAO();
        return $tarefaDAO->getTodas();
    }

    public function excluir(){
        $id = filter_input(INPUT_GET, 'id');
        $tarefa = new Tarefa();
        $tarefa->setId($id);

        $tarefaDAO = new TarefaDAO();
        $msg = $tarefaDAO->excluir($id);
        $_SESSION['msg'] = $msg;
        header('location: listar_tarefa.php');
    }
    public function iniciar_editar(){
        
        $_SESSION['editar_id'] = $_GET['id'];
        var_dump($_SESSION['editar_id']);
        header('location: editar_tarefa.php');
        
    }
    public function getPorId($id){
        //var_dump($_SESSION['editar_id']);
       // $editar_id = $_SESSION['editar_id'];
        $tarefaDAO = new TarefaDAO();
        return $tarefaDAO->getPorId($id);
    }
    public function editar(){
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];

        $tarefa = new Tarefa();
        $tarefa->setId($id);
        $tarefa->setTitulo($titulo);
        $tarefa->setDescricao($descricao);

        $tarefaDAO = new TarefaDAO();   
        $msg = $tarefaDAO->editar($tarefa);
        $_SESSION['msg'] = $msg;
        header('location: listar_tarefa.php');
    }
    
}


?>