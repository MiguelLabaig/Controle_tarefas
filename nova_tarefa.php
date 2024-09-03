<html>

<body>
    <?php include ("menu.php"); ?>
    <form action="tarefa_controller.php?controller=TarefaController&method=salvar" method="POST">
        <!-- <input type="hidden" name="method" value="salvar"/> -->
        <p>Título</p>
        <input type="text" name="titulo"/>
        <br><br>
        <p>Descrição</p>
        <input type="text" name="descricao"/>
        <br><br>
        <input type="submit" value="CADASTRAR"/>
    </form>
</body>

</html>