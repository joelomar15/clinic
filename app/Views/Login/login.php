<?php echo $this->extend('Plantilla/temaLog'); ?>
<?php echo $this->section("contenedor"); ?>
<p class="login-box-msg">Sistema Gestión QuiroPracticos </p><br>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <i class="fa fa-exclamation-triangle"></i> <span><?= session()->getFlashdata('error'); ?></span>
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