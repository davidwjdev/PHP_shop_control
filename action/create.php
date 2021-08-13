<?php
//iniciar sessão
session_start();
//Conexão com o banco
require_once("./db_connect.php");

if(isset($_POST["btn-cadastrar-cliente"])):
    $nome = mysqli_escape_string($conn, $_POST["nome"]);
    $cpf = mysqli_escape_string($conn, $_POST["cpf"]);
    $email = mysqli_escape_string($conn, $_POST["email"]);

    $sql = "INSERT INTO clientes (nome, cpf, email) VALUES ('$nome','$cpf','$email')";

    if(mysqli_query($conn,$sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../pages/clientes/lista.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ./pages/clientes/lista.php?erro');
    endif;
endif;
?>