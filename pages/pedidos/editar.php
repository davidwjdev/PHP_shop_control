<?php
//conectar no DB para exibir a lista
include_once('../../action/db_connect.php');
//importa parte inicial do codigo html basico do arquivo
include_once('../../includes/header.php');
//selecionar o usuario
if (isset($_GET['id_pedido'])) :
    $id_pedido = mysqli_escape_string($conn, $_GET['id_pedido']);
    $sql = "SELECT ped.id_pedido, ped.status, ped.data, ped.codigo_barras, cli.nome  FROM pedidos ped
    INNER JOIN clientes cli
    ON ped.id_cliente = cli.id_cliente
     WHERE ped.id_pedido = '$id_pedido'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
endif;
?>

<div class="px-4 py-1 my-5 text-center">
    <h1 class="display-5 fw-bold">Editar Status do Pedido</h1>
</div>

<div class="container px-2">
    <form action="../../action/update.php" method="POST">
        <input type="hidden" class="form-control" id="id_pedido" name="id_pedido" value="<?php echo $data['id_pedido'] ?>">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" placeholder="Nome Cliente" value="<?php echo $data['nome']?>" disabled>
            <label for="cpf">Nome Cliente:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="data" name="data" placeholder="Data do Pedido" value="<?php echo $data['data']?>" disabled>
            <label for="data">Data do Pedido:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="codigo_barras" name="codigo_barras" placeholder="Codigo de Barras" value="<?php echo $data['codigo_barras']?>" disabled>
            <label for="codigo_barras">Codigo de Barras:</label>
        </div>
        <div class="form-floating mb-3">
            <select name="status" id="status"  class="form-control">
                <option value="Em Aberto">Em Aberto</option>
                <option value="Pago">Pago </option>
                <option value="Cancelado">Cancelado</option>
            </select>
            <label for="status">Status</label>
        </div>
        <div class="col-auto">
            <button type="submit" name="btn-editar-pedido" class="align-items-center text-white text-decoration-none btn btn-success col-sm-1">
                Salvar
            </button>
            <a href="/PHP/Projeto_PHP/pages/pedidos/lista.php" class="align-items-center  text-white text-decoration-none btn btn-danger col-sm-1">
                Cancelar
            </a>
        </div>
    </form>


</div>


<?php
//importa parte final do codigo html basico do arquivo
include_once('../../includes/footer.php');
?>