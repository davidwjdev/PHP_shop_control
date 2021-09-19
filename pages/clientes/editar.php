<?php
//conectar no DB para exibir a lista
include_once('../../action/db_connect.php');
//importa parte inicial do codigo html basico do arquivo
include_once('../../includes/header.php');
//selecionar o usuario
if(isset($_GET['id_cliente'])):
    $id_cliente = mysqli_escape_string($conn, $_GET['id_cliente']);
    $sql = "SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($result);
endif;
?>

<div class="px-4 py-1 my-5 text-center">
    <h1 class="display-5 fw-bold">Editar Cliente</h1>
</div>

<div class="container px-2">
    <form action="../../action/update.php" method="POST">
        <input type="hidden" class="form-control" id="id_cliente" name="id_cliente"  value="<?php echo $data['id_cliente']?>">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $data['nome']?>" required>
            <label for="nome">Nome</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="<?php echo $data['cpf']?>" required>
            <label for="cpf">CPF(Somente numeros):</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $data['email']?>" required>
            <label for="email">E-mail:</label>
        </div>
        <div class="col-auto">
            <button type="submit" name="btn-editar-cliente" class="align-items-center text-white text-decoration-none btn btn-success col-sm-1">
                Salvar
            </button>
            <a href="/PHP/Projeto_PHP/pages/clientes/lista.php" class="align-items-center  text-white text-decoration-none btn btn-danger col-sm-1">
                Cancelar
            </a>
        </div>
    </form>


</div>


<?php
//importa parte final do codigo html basico do arquivo
include_once('../../includes/footer.php');
?>