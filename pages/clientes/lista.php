<?php
//conectar no DB para exibir a lista
include_once('../../action/db_connect.php');
//importa parte inicial do codigo html basico do arquivo
include_once('../../includes/header.php');
//mensagem de sucesso/erro ao salvar
include_once('../../includes/mensagem.php');


$per_page_record = 4;  // Number of entries to show in a page.   
// Look for a GET variable page if not found default is 1.        
if (isset($_GET["page"])) {    
    $page  = $_GET["page"];    
}    
else {    
  $page=1;    
}    

$start_from = ($page-1) * $per_page_record;     
    
$query = "SELECT * FROM student LIMIT $start_from, $per_page_record";     
$rs_result = mysqli_query ($conn, $query); 


?>

<div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">Clientes</h1>
</div>
<div class="container px-2">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" style="margin:0 0 50px 0;">
        <a href="/PHP/Projeto_PHP/pages/clientes/adicionar.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none btn btn-dark">
            Adicionar Cliente
        </a>
        <form>
            <!-- <input class="form-control" type="text" placeholder="Search" aria-label="Search"> -->
        </form>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">E-mail</th>
                <th scope="col" style="text-align:right;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM clientes";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) :
                while ($data = mysqli_fetch_array($result)) :
            ?>
                    <tr>
                        <th scope="row"><?php echo $data['id_cliente'] ?></th>
                        <td><?php echo $data['nome'] ?></td>
                        <td><?php echo $data['cpf'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                        <td style="text-align:right;">
                            <a class="btn btn-warning text-white" href="./editar.php?id_cliente=<?php echo $data['id_cliente']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                </svg>
                                Editar
                            </a>
                            <a class="btn btn-danger text-white" href="#modal<?php echo $data['id_cliente']; ?>" data-bs-toggle="modal" data-bs-target="#modal<?php echo $data['id_cliente']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                </svg>
                                Apagar
                            </a>
                        </td>


                        <!-- Modal de confirmação para apagar -->
                        <div class="modal fade" id="modal<?php echo $data['id_cliente']; ?>" tabindex="-1" aria-labelledby="#modalLabel" aria-hidden="true">
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
                                            <input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="<?php echo $data['id_cliente'] ?>">
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger" name="btn-apagar-cliente">Apagar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
            <?php
                endwhile;
            else :
                echo "Nenhum cliente cadastrado.";
            endif;
            ?>
        </tbody>
    </table>

    <nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active" aria-current="page">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>


</div>


<?php
//importa parte final do codigo html basico do arquivo
include_once('../../includes/footer.php');
?>