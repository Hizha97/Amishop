<div class="container">
    <div class="alert alert-dismissible alert-danger text-center mt-5">
        <h2>¡Oh no!</h2>
        <i class="fas fa-frown fa-8x p-3"></i><br>
        El registro no ha sido efectuado satisfactoriamente.<br>
        <?php echo $msg ?> <br>
        Volviendo a la página anterior...
    </div>
</div>

<script>
    window.setTimeout(function() {
        window.location.href = '<?php echo site_url('usuarios/registrarse') ?>';
    }, 3000);
</script>
