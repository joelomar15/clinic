<?php echo $this->extend('Plantilla/temaLog'); ?>
<?php echo $this->section("contenedor"); ?>
<p class="login-box-msg">Sistema de Registro</p>


<form action="<?= base_url() ?>guardar" method="post">
<div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nombre de Usuario" name="usuario" value="<?php echo set_value('usuario')?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php echo validation_show_error('usuario');?>
    </div>
  <div class="form-group has-feedback">
    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email')?>">
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    <?php echo validation_show_error('email');?>
  </div>
  <div class="form-group has-feedback">
    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password')?>">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    <?php echo validation_show_error('password2');?>
  </div>
  <div class="form-group has-feedback">
    <input type="password" class="form-control" placeholder="Retype password" name="password2" value="<?php echo set_value('password2')?>">
    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
    <?php echo validation_show_error('password2');?>
  </div>
  <div class="row">

    <!-- /.col -->
    <div class="col-xs-12">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
    </div>
    <!-- /.col -->
  </div>
</form>

<br>
<a href="<?= base_url() ?>login" class="text-center">Ya tengo una cuenta</a>

<?php echo $this->endSection(); ?>


<?php echo $this->section("scripts"); ?>

<script>

</script>

<?php echo $this->endSection(); ?>