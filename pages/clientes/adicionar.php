<?php
//importa parte inicial do codigo html basico do arquivo
include_once('../../includes/header.php');
?>

<div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">Adicionar Cliente</h1>
</div>

<div class="container px-2">
    <form action="../../action/create.php" method="POST" >
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
            <label for="nome">Nome</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>
            <label for="cpf">CPF(Somente numeros):</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" required>
            <label for="email">E-mail:</label>
        </div>
        <div class="col-auto">
        <button type="submit" name="btn-cadastrar-cliente" class="align-items-center text-white text-decoration-none btn btn-success col-sm-1">
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