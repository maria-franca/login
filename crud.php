<?php
    include("conecta.php");

    $matricula  = $_POST["matricula"];
    $nome       = $_POST["nome"];
    $idade      = $_POST["idade"];

    if(isset($_POST["inserir"])) {
        $comando = $pdo->prepare("INSERT INTO alunos VALUES($matricula, '$nome', $idade)");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }

    if(isset($_POS["excluir"])) {
        $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }

    if(isset($_POST["alterar"])) {
        $comando = $pdo->prepare("UPDATE alunos SET nome='$nome', idade=$idade, WHERE matricula=$matricula");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }

    if(isset($_POST["listar"])) {
        $comando = pdo->prepare("SELECT * FROM alunos");
        $resultado = $comando->execute();

        while($linhas = $comando->fetch() ) {
            $m = $linhas["matricula"];
            $n = $linhas["nome"];
            $i = $linhas["idade"];
            echo("Matricula: $M nome: $n Idade: $i <br>");
        }
    }
?>