<?php
//iniciar sessão
session_start();
//Conexão com o banco
require_once("./db_connect.php");

if(isset($_POST["btn-editar-cliente"])):
    $id_cliente = mysqli_escape_string($conn, $_POST["id_cliente"]);
    $nome = mysqli_escape_string($conn, $_POST["nome"]);
    $cpf = mysqli_escape_string($conn, $_POST["cpf"]);
    $email = mysqli_escape_string($conn, $_POST["email"]);

    $sql = "UPDATE  clientes SET nome ='$nome', cpf = '$cpf', email = '$email' WHERE  id_cliente = '$id_cliente'";

    if(mysqli_query($conn,$sql)):
        $_SESSION['mensagem'] = "Salvo com sucesso!";
        header('Location: ../pages/clientes/lista.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao Salvar!";
        header('Location: ./pages/clientes/lista.php?erro');
    endif;
endif;
?>