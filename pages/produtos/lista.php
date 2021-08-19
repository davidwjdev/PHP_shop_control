<?php
//conectar no DB para exibir a lista
include_once('../../action/db_connect.php');
//importa parte inicial do codigo html basico do arquivo
include_once('../../includes/header.php');
//mensagem de sucesso/erro ao salvar
include_once('../../includes/mensagem.php');


?>

<div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">Produtos</h1>
</div>
<div class="container px-2">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" style="margin:0 0 50px 0;">
        <a href="/PHP/Projeto_PHP/pages/produtos/adicionar.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none btn btn-dark">
            Adicionar Produto
        </a>
        <form>
            <!-- <input class="form-control" type="text" placeholder="Search" aria-label="Search"> -->
        </form>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome do Produto</th>
                <th scope="col">Valor Unitário</th>
                <th scope="col">Quantidade</th>
                <th scope="col" style="text-align:right;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM produtos";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) :
                while ($data = mysqli_fetch_array($result)) :
            ?>
                    <tr>
                        <th scope="row"><?php echo $data['id_produto'] ?></th>
                        <td><?php echo $data['nome'] ?></td>
                        <td><?php echo $data['valor_unitario'] ?></td>
                        <td><?php echo $data['quantidade'] ?></td>
                        <td style="text-align:right;">
                            <a class="btn btn-warning text-white" href="./editar.php?id_produto=<?php echo $data['id_produto']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                </svg>
                                Editar
                            </a>
                            <a class="btn btn-danger text-white" href="#modal<?php echo $data['id_produto']; ?>" data-bs-toggle="modal" data-bs-target="#modal<?php echo $data['id_produto']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                </svg>
                                Apagar
                            </a>
                        </td>


                        <!-- Modal de confirmação para apagar -->
                        <div class="modal fade" id="modal<?php echo $data['id_produto']; ?>" tabindex="-1" aria-labelledby="#modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Você deseja apagar o registro?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row fw-bold">
                                            <div class="col-1">
                                                ID:
                                            </div>
                                            <div class="col-2">
                                                Produto:
                                            </div>
                                            <div class="col-3">
                                                Valor Unit:
                                            </div>
                                            <div class="col-4">
                                                Quantidade:
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="row">
                                            <div class="col-1">
                                                <?php echo $data['id_produto'] ?>
                                            </div>
                                            <div class="col-2">
                                                <?php echo $data['nome'] ?>
                                            </div>
                                            <div class="col-3">
                                                <?php echo $data['valor_unitario'] ?>
                                            </div>
                                            <div class="col-4">
                                                <?php echo $data['quantidade'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="../../action/delete.php" method="POST">
                                            <input type="hidden" class="form-control" id="id_produto" name="id_produto" value="<?php echo $data['id_produto'] ?>">
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger" name="btn-apagar-produto">Apagar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
            <?php
                endwhile;
            else :
                echo "<tr><td colspan='5'>Nenhum produto cadastrado.</td></tr>";
            endif;
            ?>
        </tbody>
    </table>
</div>


<?php
//importa parte final do codigo html basico do arquivo
include_once('../../includes/footer.php');
?>