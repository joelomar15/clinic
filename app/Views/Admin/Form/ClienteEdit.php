<?php echo $this->extend('Plantilla/tema'); ?>
<?php echo $this->section("contenedor"); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div class="">
	<div class="row mb-3">
		<div class="col-12">
			<a href="<?= base_url() ?>ad/cliente" class="btn btn-info"><i class="fa fa-arrow-left"></i> Regresar</a>
		</div>
	</div>
	<form role="form" action="<?= base_url('ad/cliente/' . $cliente['id']) ?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PUT">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-info text-white">Datos Personales</div>
					<div class="card-body">
						<div class="form-group">
							<label for="nombre">Nombre:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-user"></i></span>
								</div>
								<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre', $cliente['nombre']) ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('nombre'); ?></small>
						</div>
						<div class="form-group">
							<label for="cedula">Cédula:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-id-card"></i></span>
								</div>
								<input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo set_value('cedula', $cliente['cedula']) ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('cedula'); ?></small>
						</div>
						<div class="form-group">
							<label for="telefono">Teléfono:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-phone"></i></span>
								</div>
								<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo set_value('telefono', $cliente['telefono']) ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('telefono'); ?></small>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-envelope"></i></span>
								</div>
								<input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email', $cliente['correo']) ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('email'); ?></small>
						</div>
					</div>
				</div>
				<div class="text-center mt-3">
					<button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Actualizar Registro</button>
				</div>
			</div>
	</form>
	<a href="">asdada</a>
</div>

<script>
	// Actualizar texto del label cuando se selecciona un archivo
	document.querySelector('.custom-file-input').addEventListener('change', function(e) {
		const fileName = e.target.files[0] ? e.target.files[0].name : "Seleccione archivo";
		e.target.nextElementSibling.textContent = fileName;
	});
</script>
<!-- /.row -->

<?php echo $this->endSection(); ?>


<?php echo $this->section("scripts"); ?>


</body>

</html>

<?php echo $this->endSection(); ?>