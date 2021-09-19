<?php
//conectar no DB para exibir a lista
include_once('../../action/db_connect.php');
//importa parte inicial do codigo html basico do arquivo
include_once('../../includes/header.php');
?>


<div class="px-4 py-1 my-5 text-center">
    <h1 class="display-5 fw-bold">Adicionar Pedido</h1>
</div>

<div class="container px-2">
    <form action="../../action/create.php" method="POST" >
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="data" name="data" placeholder="Data do Pedido" required>
            <label for="data">Data do Pedido:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" maxlength="44" class="form-control" id="codigo_barras" name="codigo_barras" placeholder="Codigo de Barras" required>
            <label for="codigo_barras">Codigo de Barras:</label>
        </div>
        <div class="form-floating mb-3">
            <?php
                $sqlCliente = "SELECT * FROM clientes";
                $resultCliente = mysqli_query($conn, $sqlCliente);
            ?>
            <select class='form-control' name="id_cliente" id="id_cliente" required>
                <?php
                    if (mysqli_num_rows($resultCliente) == 0) :
                        echo "<option disabled>Nenhum cliente cadastrado.</option>";

                    else :
                        while ($dataCliente = mysqli_fetch_array($resultCliente)):
                            echo "<option value='$dataCliente[id_cliente]'>$dataCliente[id_cliente] - $dataCliente[nome]</option>";
                        endwhile;    
                    
                        
                    endif;
                ?>
            </select>
            <label for="nome_cliente">Nome Cliente</label>
        </div>
        <div class="col-auto">
        <button type="submit" name="btn-cadastrar-pedido" class="align-items-center text-white text-decoration-none btn btn-success col-sm-1">
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