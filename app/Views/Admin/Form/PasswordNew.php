<?php echo $this->extend('Plantilla/tema'); ?>
<?php echo $this->section("contenedor"); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div class="">
	<div class="row mb-3">
		<div class="col-12">
			<a href="<?= base_url() ?>ad/home" class="btn btn-info"><i class="fa fa-arrow-left"></i> Regresar</a>
		</div>
	</div>
	<form role="form" action="<?= base_url() ?>ad/doctor/changePass" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-info text-white">Nueva Contraseña</div>
					<div class="card-body">
						<div class="form-group">
							<label for="password">Nueva Contraseña:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-lock"></i></span>
								</div>
								<input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password') ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('password'); ?></small>
						</div>
						<div class="form-group">
							<label for="password2">Repetir Contraseña:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-lock"></i></span>
								</div>
								<input type="password" class="form-control" id="password2" name="password2" value="<?php echo set_value('password2') ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('password2'); ?></small>
						</div>
					</div>
				</div>
				<div class="text-center mt-3">
					<button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Cambiar Contraseña</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- /.row -->

<?php echo $this->endSection(); ?>


<?php echo $this->section("scripts"); ?>


</body>

</html>

<?php echo $this->endSection(); ?>