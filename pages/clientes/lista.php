<?php
//conectar no DB para exibir a lista
include_once('../../action/db_connect.php');
//importa parte inicial do codigo html basico do arquivo
include_once('../../includes/header.php');
//mensagem de sucesso/erro ao salvar
include_once('../../includes/mensagem.php');

?>

<div class="px-4 py-1 my-5 text-center">
    <h1 class="display-5 fw-bold">Clientes</h1>
</div>
<div class="container px-2">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" style="margin:0 0 50px 0;">
        <a href="/PHP/Projeto_PHP/pages/clientes/adicionar.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none btn btn-dark">
            Adicionar Cliente
        </a>
        <form>
            <input class="form-control" type="text" name="search_text" id="search_text" placeholder="Search" aria-label="Search">
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
        <tbody id="result" >
			<?php
		   include_once('./search.php');
		?>
        </tbody>
    </table>
</div>


</div>

<script>
$(document).ready(function(){
	//load_data();
	function load_data(query)
	{
		$.ajax({
			url:"search.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});


</script>

<?php
//importa parte final do codigo html basico do arquivo
include_once('../../includes/footer.php');
?>