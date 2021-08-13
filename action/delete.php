<?php
//iniciar sessão
session_start();
//Conexão com o banco
require_once("./db_connect.php");

if(isset($_POST["btn-apagar-cliente"])):
    $id_cliente = mysqli_escape_string($conn, $_POST["id_cliente"]);

    $sql = "DELETE FROM  clientes WHERE id_cliente = '$id_cliente'";

    if(mysqli_query($conn,$sql)):
        $_SESSION['mensagem'] = "Apagado com sucesso!";
        header('Location: ../pages/clientes/lista.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao Apagar!";
        header('Location: ./pages/clientes/lista.php?erro');
    endif;
endif;
?>