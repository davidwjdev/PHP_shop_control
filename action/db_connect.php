<?php
//Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "shop_control";

//conecta no DB
$conn = mysqli_connect($servername, $username, $password, $db_name);

//ajuste para caracteres de acento
mysqli_set_charset($conn,"utf8");

if(mysqli_connect_error()):
    echo "Erro na conexão com o banco de dados: ".mysqli_connect_error();
endif;
?>