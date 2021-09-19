<?php
//conectar no DB para exibir a lista
include_once('../../action/db_connect.php');
//importa parte inicial do codigo html basico do arquivo
include_once('../../includes/header.php');
//mensagem de sucesso/erro ao salvar
include_once('../../includes/mensagem.php');

?>

<div class="px-4 py-1 my-5 text-center">
    <h1 class="display-5 fw-bold">Pedidos</h1>
</div>
<div class="container px-2">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" style="margin:0 0 50px 0;">
        <a href="/PHP/Projeto_PHP/pages/pedidos/adicionar.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none btn btn-dark">
            Adicionar Pedido
        </a>
        <form>
            <input class="form-control" type="text" name="search_text" id="search_text" placeholder="Search" aria-label="Search">
        </form>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Data do Pedido</th>
                <th scope="col">Status do Pedido</th>
                <th scope="col">Codigo de Barras</th>
                <th scope="col">Nome do Cliente</th>
                <th scope="col" style="text-align:right;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT ped.id_pedido, DATE_FORMAT(STR_TO_DATE(ped.data,'%Y-%m-%d'),'%d/%m/%Y') as data, ped.status, ped.codigo_barras, 
            cli.nome, ped.id_cliente, cli.cpf, cli.email
            FROM pedidos ped
            INNER JOIN clientes cli
            ON ped.id_cliente = cli.id_cliente";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) :
                while ($data = mysqli_fetch_array($result)) :
            ?>
                    <tr>
                        <th scope="row"><?php echo $data['id_pedido'] ?></th>
                        <td><?php echo $data['data'] ?></td>
                        <td><?php echo $data['status'] ?></td>
                        <td><?php echo $data['codigo_barras'] ?></td>
                        <td><?php echo $data['nome'] ?></td>
                        <td style="text-align:right;">
                            <a class="btn btn-success text-white" href="#modalDetalhe<?php echo $data['id_cliente']; ?>" data-bs-toggle="modal" data-bs-target="#modalDetalhe<?php echo $data['id_cliente']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                                Detalhe
                            </a>
                            <a class="btn btn-warning text-white" href="./editar.php?id_pedido=<?php echo $data['id_pedido']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                </svg>
                                Editar
                            </a>
                            <a class="btn btn-danger text-white" href="#modal<?php echo $data['id_pedido']; ?>" data-bs-toggle="modal" data-bs-target="#modal<?php echo $data['id_pedido']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                </svg>
                                Apagar
                            </a>
                        </td>


                        <!-- Modal de confirmação para apagar -->
                        <div class="modal fade" id="modal<?php echo $data['id_pedido']; ?>" tabindex="-1" aria-labelledby="#modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Você deseja apagar o registro?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row fw-bold">
                                            <div class="col">
                                                ID:
                                            </div>
                                            <div class="col">
                                                Status:
                                            </div>
                                            <div class="col">
                                                Data:
                                            </div>
                                            <div class="col-4">
                                                Codigo de Barras:
                                            </div>
                                            <div class="col">
                                                Cliente:
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="row">
                                            <div class="col">
                                                <?php echo $data['id_pedido'] ?>
                                            </div>
                                            <div class="col">
                                                <?php echo $data['status'] ?>
                                            </div>
                                            <div class="col">
                                                <?php echo $data['data'] ?>
                                            </div>
                                            <div class="col-4">
                                                <?php echo $data['codigo_barras'] ?>
                                            </div>
                                            <div class="col">
                                                <?php echo $data['nome'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="../../action/delete.php" method="POST">
                                            <input type="hidden" class="form-control" id="id_pedido" name="id_pedido" value="<?php echo $data['id_pedido'] ?>">
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger" name="btn-apagar-pedido">Apagar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Modal de detalhe do cliente -->
                        <div class="modal fade" id="modalDetalhe<?php echo $data['id_cliente']; ?>" tabindex="-1" aria-labelledby="#modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Detalhe do Cliente</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row fw-bold">
                                            <div class="col-1">
                                                ID:
                                            </div>
                                            <div class="col-2">
                                                Nome:
                                            </div>
                                            <div class="col-3">
                                                CPF:
                                            </div>
                                            <div class="col-4">
                                                E-mail:
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="row">
                                            <div class="col-1">
                                                <?php echo $data['id_cliente'] ?>
                                            </div>
                                            <div class="col-2">
                                                <?php echo $data['nome'] ?>
                                            </div>
                                            <div class="col-3">
                                                <?php echo $data['cpf'] ?>
                                            </div>
                                            <div class="col-4">
                                                <?php echo $data['email'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="../../action/delete.php" method="POST">
                                            <input type="hidden" class="form-control" id="id_pedido" name="id_pedido" value="<?php echo $data['id_pedido'] ?>">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </tr>
            <?php
                endwhile;
            else :
                echo "<tr><td colspan='5'>Nenhum pedido cadastrado.</td></tr>";
            endif;
            ?>
        </tbody>
    </table>
</div>


<?php
//importa parte final do codigo html basico do arquivo
include_once('../../includes/footer.php');
?>