<div class="container">
    <div class="alert alert-dismissible alert-success text-center mt-5">
        <h2>¡Oh sí!</h2>
        <i class="fas fa-smile fa-8x p-3"></i><br>
        El registro se ha efectuado con éxito, te redirigiremos a tu cuenta.
    </div>
</div>

<script>
    window.setTimeout(function() {
        window.location.href = '<?php echo site_url('perfil') ?>';
    }, 3000);
</script>
