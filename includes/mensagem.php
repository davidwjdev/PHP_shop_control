<?php
//iniciar sessão
session_start();
if (isset($_SESSION['mensagem'])) :
?>

  <div class="toast position-absolute text-white bg-primary top-20 start-50 translate-middle-x" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        <?php echo $_SESSION['mensagem']; ?>
      </div>
    </div>
  </div>

  <script>
    window.onload = function() {
      $(".toast").show();
      setTimeout(function() {
        $(".toast").hide();
      }, 3000);

      timeout
    };
  </script>

<?php
endif;
//limpar sessão
session_unset();
?>