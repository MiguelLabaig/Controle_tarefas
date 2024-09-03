<?php
require "tarefa_controller.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.min.css" rel="stylesheet" />
    <script src="bootstrap.bundle.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


</head>

<body>
    
    <?php include('menu.php');
    session_start();
    ?>
    

    <?php
    $controller = new TarefaController();
    $result = $controller->getPorId($_SESSION['editar_id']);

    
   
    if ($result) {
    ?>
        <div class="container">
            <form action="tarefa_controller.php?controller=TarefaController&method=editar" method="POST">
                <input type="hidden" name="method" value="editar" class="form-control" />
                <input type="hidden" name="id" value="<?= $result['id'] ?>" class="form-control" />
                <div class="form-group" style="margin-bottom: 1rem;">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" value="<?= $result['titulo'] ?>" class="form-control" />
                </div>
                <div class="form-group " style="margin-bottom: 1rem;">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" value="<?= $result['descricao'] ?>" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="submit" value="Editar Tarefa" class="btn btn-primary form-control">
                </div>
            </form>
        </div>
    <?php } ?>
</body>

</html>