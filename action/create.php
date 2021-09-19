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

if(isset($_POST["btn-cadastrar-produto"])):
    $nome = mysqli_escape_string($conn, $_POST["nome"]);
    $valor_unitario = mysqli_escape_string($conn, $_POST["valor_unitario"]);
    $quantidade = mysqli_escape_string($conn, $_POST["quantidade"]);

    $sql = "INSERT INTO produtos (nome, valor_unitario, quantidade) VALUES ('$nome','$valor_unitario','$quantidade')";

    if(mysqli_query($conn,$sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../pages/produtos/lista.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ./pages/produtos/lista.php?erro');
    endif;
endif;

if(isset($_POST["btn-cadastrar-pedido"])):
    $data = mysqli_escape_string($conn, $_POST["data"]);
    $codigo_barras = mysqli_escape_string($conn, $_POST["codigo_barras"]);
    $id_cliente = mysqli_escape_string($conn, $_POST["id_cliente"]);

    $sql = "INSERT INTO pedidos (status, data, codigo_barras, id_cliente) VALUES ('Em Aberto', '$data','$codigo_barras','$id_cliente')";

    if(mysqli_query($conn,$sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../pages/pedidos/lista.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ./pages/pedidos/lista.php?erro');
    endif;
endif;
?>