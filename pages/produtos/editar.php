<?php
//conectar no DB para exibir a lista
include_once('../../action/db_connect.php');
//importa parte inicial do codigo html basico do arquivo
include_once('../../includes/header.php');
//selecionar o usuario
if(isset($_GET['id_produto'])):
    $id_produto = mysqli_escape_string($conn, $_GET['id_produto']);
    $sql = "SELECT * FROM produtos WHERE id_produto = '$id_produto'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($result);
endif;
?>

<div class="px-4 py-1 my-5 text-center">
    <h1 class="display-5 fw-bold">Editar Produto</h1>
</div>

<div class="container px-2">
    <form action="../../action/update.php" method="POST">
        <input type="hidden" class="form-control" id="id_produto" name="id_produto"  value="<?php echo $data['id_produto']?>">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $data['nome']?>" required>
            <label for="nome">Nome</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="valor_unitario" name="valor_unitario" placeholder="Valor Unitário" value="<?php echo $data['valor_unitario']?>" required>
            <label for="valor_unitario">Valor Unitário:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" value="<?php echo $data['quantidade']?>" required>
            <label for="quantidade">Quantidade:</label>
        </div>
        <div class="col-auto">
            <button type="submit" name="btn-editar-produto" class="align-items-center text-white text-decoration-none btn btn-success col-sm-1">
                Salvar
            </button>
            <a href="/PHP/Projeto_PHP/pages/produtos/lista.php" class="align-items-center  text-white text-decoration-none btn btn-danger col-sm-1">
                Cancelar
            </a>
        </div>
    </form>


</div>


<?php
//importa parte final do codigo html basico do arquivo
include_once('../../includes/footer.php');
?>