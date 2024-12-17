<?php echo $this->extend('Plantilla/temaLog'); ?>
<?php echo $this->section("contenedor"); ?>
<p class="login-box-msg">Sistema Gestión QuiroPracticos </p><br>
<?php if (isset($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
<?php endif; ?>
<form action="<?= base_url() ?>logueado" method="post">
    <form>
        <fieldset>
            <div class="field">
                <label class="label_field">Usuario:</label>
                <input type="text" name="usuario" placeholder="CI / Email" />
            </div>
            <div class="field">
                <label class="label_field">Password:</label>
                <input type="password" name="password" placeholder="Password" />
            </div>
            <div class="field margin_0">
                <label class="label_field hidden">hidden label</label>
                <button class="main_bt">Sing In</button>
            </div>
        </fieldset>
    </form>
</form>

<br>
<?php echo $this->endSection(); ?>
