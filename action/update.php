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

if(isset($_POST["btn-editar-produto"])):
    $id_produto = mysqli_escape_string($conn, $_POST["id_produto"]);
    $nome = mysqli_escape_string($conn, $_POST["nome"]);
    $valor_unitario = mysqli_escape_string($conn, $_POST["valor_unitario"]);
    $quantidade = mysqli_escape_string($conn, $_POST["quantidade"]);

    $sql = "UPDATE produtos SET nome ='$nome', valor_unitario = '$valor_unitario', quantidade = '$quantidade' WHERE  id_produto = '$id_produto'";

    if(mysqli_query($conn,$sql)):
        $_SESSION['mensagem'] = "Salvo com sucesso!";
        header('Location: ../pages/produtos/lista.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao Salvar!";
        header('Location: ./pages/produtos/lista.php?erro');
    endif;
endif;
?>