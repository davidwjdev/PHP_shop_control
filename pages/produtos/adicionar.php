<?php
//importa parte inicial do codigo html basico do arquivo
include_once('../../includes/header.php');
?>

<div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">Adicionar Produto</h1>
</div>

<div class="container px-2">
    <form action="../../action/create.php" method="POST" >
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
            <label for="nome">Nome</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="valor_unitario" name="valor_unitario" placeholder="Valor Unitário" maxlength="6" required>
            <label for="valor_unitario">Valor Unitário:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" required>
            <label for="quantidade">Quantidade:</label>
        </div>
        <div class="col-auto">
        <button type="submit" name="btn-cadastrar-produto" class="align-items-center text-white text-decoration-none btn btn-success col-sm-1">
            Salvar
        </button>
        <a href="/PHP/Projeto_PHP/pages/produtos/lista.php" class="align-items-center  text-white text-decoration-none btn btn-danger col-sm-1">
            Cancelar
        </a>
    </div>
    </form>


</div>

<script>

$(function() {
  var maxLength = '000000.00'.length;
  
  $("#valor_unitario").maskMoney({
    allowNegative: true,
    thousands: '',
    decimal: '.',
    affixesStay: false
  }).attr('maxlength', maxLength).trigger('mask.maskMoney');
});

</script>

<?php
//importa parte final do codigo html basico do arquivo
include_once('../../includes/footer.php');
?>